<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    
    use HasFactory;

    protected $fillable = ['aula', 'horario', 'course_id'];

    /**
     * Relación con Course: una Commission pertenece a un Course.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    

    /**
     * Relación con Professor: una Commission puede tener muchos Professors.
     */
    public function professors()
    {
        return $this->belongsToMany(Professor::class);
    }
}
