<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EnrolledStudentsExport;

class ReportController extends Controller
{

    //reportes
    public function enrolledStudentsReport()
    {
        $students = Student::with(['courses', 'commissions'])->get();
        $isPdf = false;
        $isExcel = false;

        return view('reports.enrolled_students', compact('students', 'isPdf','isExcel'));
    }




    //reportes exportados a pdf
    public function exportEnrolledStudentsPDF()
    {
        // Obtén los estudiantes inscritos con sus cursos y comisiones
        $students = \App\Models\Student::with(['courses', 'commissions'])->get();

        // Pasa una variable que indica si estamos generando un PDF
        $isPdf = true;

        // Renderiza la vista y genera el PDF
        $pdf = Pdf::loadView('reports.enrolled_students', compact('students','isPdf'));

        // Retorna el PDF para descarga
        return $pdf->download('reporte_estudiantes_inscritos.pdf');
    }


    //Reportes exportados a excel
    public function exportEnrolledStudentsExcel()
    {
        return Excel::download(new EnrolledStudentsExport, 'reporte_estudiantes_inscritos.xlsx');

    }

}
