<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class ExamModel extends Model
{
    use HasFactory;

    protected $table = "exam";

    static public function getSingle($id){
        return self::find($id);
    }

    static public function getRecord() {
        $return = self::select('exam.*', 'users.name as created_by_name')
        ->join('users', 'users.id', '=', 'exam.created_by');
            if (!empty(Request::get('name'))) {
            $return = $return->where('exam.name', 'like', '%' . Request::get('name') . '%');
        }
        $return = $return
        ->where('exam.is_delete','=',0)
        ->orderBy('exam.id', 'desc')
        ->paginate(10);

        return $return;
    }
}
