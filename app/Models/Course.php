<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = ['name', 'subject_id'];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'course_student')->withPivot('commission_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function commissions()
    {
        return $this->hasMany(Commission::class);
    }
}
