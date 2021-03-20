<?php

namespace App\Models;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory;
    protected $table = 'students';
    protected $hidden = ['password', 'created_at', 'updated_at'];

    protected $fillable = [
        'id', 'firstname', 'lastname', 'vote_status',
    ];
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'point_users_subjects');
    }
    public function user($id)
    {
        return Student::where('id', $id)->first();
    }
}
