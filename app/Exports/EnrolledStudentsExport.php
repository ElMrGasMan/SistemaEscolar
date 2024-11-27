<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EnrolledStudentsExport implements FromCollection , WithHeadings,  WithMapping
{
    /**
     * Obtiene los estudiantes con su información básica.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Obtener todos los estudiantes con las relaciones correspondientes
        return Student::join('course_student', 'students.id', '=', 'course_student.student_id')
            ->join('courses', 'course_student.course_id', '=', 'courses.id')
            ->join('commissions', 'course_student.commission_id', '=', 'commissions.id')
            ->select('students.name as student_name', 'courses.id as course_id', 'courses.name as course_name', 'commissions.id as commission_id', 'commissions.aula as commission_aula')
            ->orderBy('students.id', 'asc')
            ->get();
    }

    /**
     * Definir los encabezados del archivo Excel
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Student Name',
            'Course ID - Name',
            'Commission ID - Aula',
        ];
    }

    /**
     * Mapea los datos para exportarlos.
     *
     * @param mixed $row
     * @return array
     */
    public function map($row): array
    {
        return [
            $row->student_name,  // Nombre del estudiante
            $row->course_id . ' - ' . $row->course_name,  // Curso con formato ID - Nombre
            $row->commission_id . ' - ' . $row->commission_aula,  // Comisión con formato ID - Aula
        ];
    }
}
