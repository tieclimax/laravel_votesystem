<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'id',
    ];
    public function students()
    {
        return $this->belongsToMany(Student::class, 'point_users_subjects');
    }
}
