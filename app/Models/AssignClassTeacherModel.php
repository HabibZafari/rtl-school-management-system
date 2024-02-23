<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use WeakMap;

class AssignClassTeacherModel extends Model
{
    use HasFactory;

    protected $table = 'assign_class_teacher';

    static public function getAlreadyFirst($class_id, $teacher_id)
    {
        return self::where('class_id', '=', $class_id)->where('teacher_id', '=', $teacher_id)->first();
    }

    static public function getRecord()
    {
        $return =  self::select('assign_class_teacher.*', 'class.name as class_name', 'teacher.name as teacher_name', 'users.name as created_by_name')
            ->join('users as teacher', 'teacher.id', '=', 'assign_class_teacher.teacher_id')
            ->join('class', 'class.id', '=', 'assign_class_teacher.class_id')
            ->join('users', 'users.id', '=', 'assign_class_teacher.created_by');
        if (!empty(Request::get('class_name'))) {
            $return = $return->where('class.name', 'like', '%' . Request::get('class_name') . '%');
        }
        if (!empty(Request::get('teacher_name'))) {
            $return = $return->where('teacher.name', 'like', '%' . Request::get('teacher_name') . '%');
        }
        $return =  $return->where('assign_class_teacher.is_delete', '=', 0)
            ->orderBy('assign_class_teacher.id', 'desc')
            ->paginate(10);
        return $return;
    }

    static public function getMyClassSubject($teacher_id)
    {
        $return =  self::select(
            'assign_class_teacher.*',
            'class.name as class_name',
            'subject.name as subject_name',
            'subject.type as subject_type',
            'class.id as class_id',
            'subject.id as subject_id'
        )
            ->join('class', 'class.id', '=', 'assign_class_teacher.class_id')
            ->join('class_subject', 'class_subject.class_id', '=', 'class.id')
            ->join('subject', 'subject.id', '=', 'class_subject.subject_id')
            ->where('assign_class_teacher.is_delete', '=', 0)
            ->where('assign_class_teacher.status', '=', 0)
            ->where('subject.is_delete', '=', 0)
            // ->where('subject.status', '=', 0)
            ->where('class_subject.is_delete', '=', 0)
            ->where('class_subject.status', '=', 0)
            ->where('assign_class_teacher.teacher_id', '=', $teacher_id)
            ->get();
        return $return;
    }
    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getAssignTeacherID($class_id)
    {
        return self::where('class_id', '=', $class_id)->where('is_delete', '=', 0)->get();
        // ->pluck('subject_id')->toArray();
    }

    static public function deleteTeacher($class_id)
    {
        return self::where('class_id', '=', $class_id)->delete();
    }

    static public function getMyTimeTable($class_id, $subject_id)
    {
    
        $getWeek = WeekModel::getWeekUsingName(date('l'));
        return ClassSubjectTimetableModel::getRecordClassSubject($class_id, $subject_id, $getWeek->id);
    }

    // static public function getMyTimeTable($class_id, $subject_id)
    // {
    //     $getWeek = WeekModel::getWeekUsingName(date('l'));
    //     if ($getWeek) {
    //         return ClassSubjectTimetableModel::getRecordClassSubject($class_id, $subject_id, $getWeek->id);
    //     } else {
    //         return null; // Return null or any appropriate value indicating that week is not found
    //     }
    // }
}
