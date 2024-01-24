<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSubjectModel extends Model
{
    use HasFactory;

    protected $table = 'class_subject';

    static public function getRecord(){
        return self::get();
        // $return =  ClassSubjectModel::select('class_subject.*', 'users.name as created_by_name')
        // ->join('users', 'users.id', 'class_subject.created_by')
        // ->where('class_subject.is_delete', '=', 0)
        // ->orderBy('class_subject.id', 'desc')
        // ->paginate(10);
        // return $return;
    }
}
