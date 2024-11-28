<?php

namespace App\Exports;

use App\Models\Professor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProfessorsAndCommissionsExport implements FromCollection, WithHeadings, WithMapping
{
   
    /**
     * Obtiene los profesores con sus comisiones asignadas.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Obtener los profesores con las comisiones asignadas y el curso correspondiente
        return Professor::join('commissions', 'professors.id', '=', 'commissions.professor_id')
            ->join('courses', 'commissions.course_id', '=', 'courses.id')
            ->select('professors.name as professor_name', 'commissions.id as commission_id', 'commissions.aula as commission_aula', 'commissions.horario as commission_horario')
            ->get();
    }

    /**
     * Definir los encabezados del archivo Excel.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Professor Name',
            'Commission ID - Aula',
            'Course Name',
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
            $row->professor_name,  // Nombre del profesor
            $row->commission_id . ' - ' . $row->commission_aula,  // ID y Aula de la comisión
            $row->commission_horario,  // Nombre del curso
        ];
    }
}
