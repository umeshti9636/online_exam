<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
  
    protected $table = 'exams';
    protected $primarykey = 'id';
    protected $fillable = ["exam_name","subject_id","exam_date","exam_time","attempt"];
    public function subjects(){
        return $this->hasMany(Subject::class,'id','subject_id');
    }

}
