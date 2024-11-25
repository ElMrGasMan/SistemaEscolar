<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'course_student')->withPivot('commission_id');
    }
    
    public function commissions()
    {
        return $this->hasMany(Commission::class);
    }


}
