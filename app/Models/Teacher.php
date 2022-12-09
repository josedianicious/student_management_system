<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'teachers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['teacher_name'];

    /**
     * Primary key associated with the table
     *
     */
    protected $primaryKey = "teacher_id";

    /**
     * Get all students for the teacher
     */
    public function students(){
        return $this->hasMany(Student::class,'teacher_id','teacher_id');
    }

    /**
     * Active teachers
     */
    public function scopeActive($query){
        return $query->where('status',1);
    }
}
