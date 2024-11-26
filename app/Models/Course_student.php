<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course_student extends Model
{
    use HasFactory;

    protected $table = 'course_student';

    protected $fillable = ['course_id', 'student_id', 'commission_id'];

    /**
     * Relación con Course.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Relación con Student.
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Relación con Commision.
     */
    public function commission()
    {
        return $this->belongsTo(Commission::class);
    }
}
