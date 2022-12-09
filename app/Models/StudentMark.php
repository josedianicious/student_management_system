<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMark extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'student_marks';
    /**
     * The primary key of the table
     */
    protected $primaryKey = "mark_id";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['student_id','maths_mark','science_mark','history_mark','term_id','total_mark'];
    /**
     * The attributes that are hidden
     */
    protected $hidden = ['mark_id','student_id'];
    /**
     * Get related student
     */
    public function student(){
        return $this->belongsTo(Student::class,'student_id','student_id');
    }
    /**
     * Get related term
     */
    public function term(){
        return $this->belongsTo(Term::class,'term_id','term_id');
    }
    /**
     * Format created at vallue
     */

    public function getCreatedOnAttribute() {
        return date('M d, Y H:i a',strtotime($this->created_at));
    }

    protected $appends = ['created_on'];
}
