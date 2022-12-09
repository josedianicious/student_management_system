<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    use HasFactory;
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'terms';
    /**
     * The primary key of the table
     */
    protected $primaryKey = "term_id";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['term'];
    /**
     * The attributes that are hidden
     */
    protected $hidden = ['term_id'];

    /**
     * Get related marks
     */
    public function mark(){
        return $this->hasMany(StudentMark::class,'term_id','term_id');
    }


}
