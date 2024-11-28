<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EnrolledStudentsExport;
use App\Exports\ProfessorsAndCommissionsExport;

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

    public function coursesBySubjectReport()
    {
        $subjects = \App\Models\Subject::with('courses')->get();  // Obtener materias con los cursos asociados
        $isPdf = false;
        $isExcel = false;

        return view('reports.courses_by_subject', compact('subjects', 'isPdf', 'isExcel'));
    }

    public function commissionsAndSchedulesReport()
    {
        $commissions = \App\Models\Commission::with(['course', 'professor'])->get();
        $isPdf = false;
        $isExcel = false;

        return view('reports.commissions_and_schedules', compact('commissions', 'isPdf', 'isExcel'));
    }
    public function professorsAndCommissionsReport()
    {
        $professors = \App\Models\Professor::with('commissions')->get();
        $isPdf = false;
        $isExcel = false;

        return view('reports.professors_and_commissions', compact('professors', 'isPdf', 'isExcel'));
    }

    //-----------------------------------------------------------------------------------------------------
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

    public function exportCoursesBySubjectPDF()
    {
        $subjects = \App\Models\Subject::with('courses')->get();  // Obtener materias con los cursos asociados
        $isPdf = true;


        // Generar PDF con los datos
        $pdf = Pdf::loadView('reports.courses_by_subject', compact('subjects', 'isPdf'));

        return $pdf->download('reporte_cursos_por_materia.pdf');
    }
    public function exportCommissionsAndSchedulesPDF()
    {
        $commissions = \App\Models\Commission::with(['course', 'professor'])->get();
        $isPdf = true;
        $pdf = Pdf::loadView('reports.commissions_and_schedules', compact('commissions', 'isPdf'));

        return $pdf->download('reporte_comisiones_y_horarios.pdf');
    }
    public function exportProfessorsAndCommissionsPDF()
    {
        $professors = \App\Models\Professor::with('commissions')->get();
        $isPdf = true;
        $pdf = Pdf::loadView('reports.professors_and_commissions', compact('professors', 'isPdf'));

        return $pdf->download('reporte_asistencia_profesores.pdf');
    }
    


    //-----------------------------------------------------------------------------------------------------
    //Reportes exportados a excel
    public function exportEnrolledStudentsExcel()
    {
        return Excel::download(new EnrolledStudentsExport, 'reporte_estudiantes_inscritos.xlsx');

    }


    public function exportCoursesBySubjectExcel()
    {
        return Excel::download(new CoursesBySubjectExport, 'reporte_cursos_por_materia.xlsx');
    }



    public function exportProfessorsAndCommissionsExcel()
    {
        return Excel::download(new ProfessorsAndCommissionsExport, 'reporte_profesores_y_comisiones.xlsx');
    }


    public function exportCommissionsAndSchedulesExcel()
    {
        return Excel::download(new CommissionsAndSchedulesExport, 'reporte_comisiones_y_horarios.xlsx');
    }

}
