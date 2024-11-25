<?php
use App\Http\Controllers\CalculationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Models\Student;
use App\Models\Course;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/', [StudentController::class, 'index']);//indico cula sera la ruta de inicio

Route::get('/calculate', [CalculationController::class, 'showForm'])->name('calculate.form');
Route::post('/calculate', [CalculationController::class, 'calculate'])->name('calculate.result');
Route::get('/mostrar_formulario', function() {
    return view('calculate', ['result' => "Este es el resultado"]);
   });

Route::get('/saludo', [App\Http\Controllers\mensajesController::class, 'saludo'])->name('saludo.form');



Route::get('/create-student', function() {
     $student = new Student();
     $student->name = 'Mariano Espinoza';
     $student->email = 'mariano.espinoza@example.com';
     $student->course_id = 2; // Asegúrate de que el curso con ID 1 exista
     $student->save();
        return 'Estudiante creado exitosamente';
    });


    Route::get('/create-course', function() {
        $course = new Course();
        $course->name = 'Programación';        
        $course->save();
           return 'Curso creado exitosamente';
       });
    

       Route::get('/student', function () {
        $students = Student::all();
    
        foreach ($students as $student) {
            echo  $student->id.'-'.$student->name.'-'.$student->email .'-'.$student->course_id. '<br>';
        }
       });


      Route::get('/course', function() {
        $courses = Course::all();
    
        foreach ($courses as $course) {
            echo $course->id . ' - ' . $course->name . ' - ' . '<br>';
        }
        });


     Route::get('/add-student-to-course/{student_id}/{course_id}', function ($student_id, $course_id) {
            $student = Student::find($student_id);
            $course = Course::find($course_id);
        
            if ($student && $course) {
                $student->course()->associate($course);
                $student->save();
                return "El estudiante ha sido agregado al curso.";
            } else {
                return "El estudiante o el curso no se encontraron.";
            }
        });



Route::get('/get-course-with-students/{course_id}', function ($course_id) {
    $course = Course::with('students')->find($course_id);
    
    dd($course);
    if ($course) {
        return $course->students;  // Muestra la lista de estudiantes
    } else {
        return "El curso no se encontró.";
    }
});

Route::get('/update-student/{id}', function($id) {
    $student = Student::find($id);
    
    if ($student) {
            $student->name = 'Pedro Navaja';
            $student->email = 'pedro.navaja@example.com';
            $student->save();
    
            return 'Estudiante actualizado exitosamente';
        } else {
           return 'Estudiante no encontrado';
       }
    });
    
    Route::get('/delete-student/{id}', function($id) {
        $student = Student::find($id);
          if ($student) {
              $student->delete();
        return 'Estudiante eliminado exitosamente';
              } else {
              return 'Estudiante no encontrado';
             }
        });
        

        Route::get('/student/{id}', function($id) {
            $student = Student::find($id);

            dd($student) ;
            if ($student) {
               return $student->id . ' - ' . $student->name . ' - ' . $student->email;
                } else {
               return 'Estudiante no encontrado';
             }
            });


            Route::resource('students',StudentController::class);
            Route::resource('courses', CourseController::class);




            Route::get('/blog', function () {
                return view('nueva_vista.blog'); // Muestra la vista del blog
            });
            
            Route::get('/contacto', function () {
                return view('nueva_vista.contacto'); // Muestra la vista de contacto
            });


            Route::get('/Q_Materias', [App\Http\Controllers\consultasController::class, 'listarMaterias']);
            Route::get('/Q_Materias2', [App\Http\Controllers\consultasController::class, 'listarMaterias2']);
            Route::get('/Q_FiltrarAlumnos', [App\Http\Controllers\consultasController::class, 'FiltrarAlumnos']);
            Route::get('/Q_Alumnos', [App\Http\Controllers\consultasController::class, 'Alumnos']);
            Route::get('/Q_Cursos', [App\Http\Controllers\consultasController::class, 'cursos']);
            Route::get('/Q_alumnos_del_curso', [App\Http\Controllers\consultasController::class, 'alumnos_del_curso']);
            Route::get('/Q_curso_materia', [App\Http\Controllers\consultasController::class, 'curso_materia']);
            Route::get('/Q_CursosConMasDeTresEstudiantes', [App\Http\Controllers\consultasController::class, 'CursosConMasDeTresEstudiantes']);
            Route::get('/Q_ProfesoresEspecializacion', [App\Http\Controllers\consultasController::class, 'ProfesoresEspecializacion']);
            Route::get('/Q_EntreFechas', [App\Http\Controllers\consultasController::class, 'EntreFechas']);
            Route::get('/Q_NuevoEstudiante_Pedro', [App\Http\Controllers\consultasController::class, 'NuevoEstudiante_Pedro']);
            Route::get('/Q_FiltroEstudiantes_2', [App\Http\Controllers\consultasController::class, 'FiltroEstudiantes_2']);

           