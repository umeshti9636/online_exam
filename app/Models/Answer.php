<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $table = 'ans';
    protected $primarykey = 'id';
    protected $fillable = ["question_id","ans","is_correct"];
    public function question()
    {
        return $this->hasMany(Question::class, 'id', 'question_id');
    }
}
