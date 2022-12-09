<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'students';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['student_name','age','gender','teacher_id'];

    /**
     * The attributes that are hidden
     */
    protected $hidden = ['student_id'];

    /**
     * Primary key associated with the table
     */
    protected $primaryKey = "student_id";
    /**
     * Get related  teacher
     */
    public function teacher(){
        return $this->belongsTo(Teacher::class,'teacher_id','teacher_id');
    }

    /**
     * Get related student marks
     */
    public function mark(){
        return $this->hasMany(StudentMark::class,'student_id','student_id');
    }

    public function getGenderTextAttribute(){ //create new column as gender_formatted
        if($this->gender == 1) {  return "M"; }
        else { return "F"; }
    }

    protected $appends = ['gender_text'];
}
