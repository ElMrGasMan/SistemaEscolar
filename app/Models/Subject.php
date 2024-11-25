<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Relación con Course: un Subject puede tener muchos Courses.
     */
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
