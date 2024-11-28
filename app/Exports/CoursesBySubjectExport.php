<?php

namespace App\Exports;

use App\Models\Subject;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CoursesBySubjectExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Subject::with('courses')->get();
    }

    public function headings(): array
    {
        return ['Materia', 'Cursos'];
    }

    public function map($subject): array
    {
        $courses = $subject->courses->pluck('name')->implode(', ');

        return [
            $subject->name,
            $courses
        ];
    }
}