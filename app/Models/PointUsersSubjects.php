<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class PointUsersSubjects extends Model
{
    use HasFactory;
    protected $fillable = ['point', 'vote_score'];
    protected $guarded = [];
    public function students()
    {

        return $this->belongsToMany(
            Student::class,
            'point_users_subjects',
            'student_id',
            'subject_id'
        );
    }
}
