<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Professor;
use App\Models\SurveyAnswer;

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
// Route::resource('professors', ProfessorController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::post('/checkemail', function (Request $request) {
    $student_email = $request->input('student_email');
    $survey = SurveyAnswer::where('student_email', $student_email)->first();
    if($survey) {
        session()->flash('mensaje', 'Lo sentimos ya existe una votación con este correo');
        return redirect('/');
    }
    if (filter_var($student_email, FILTER_VALIDATE_EMAIL) && strpos($student_email, 'unicartagena.edu.co')) {
        session()->put('student_email', $student_email);
        return redirect('/basic-info');
    } else {
        session()->flash('mensaje', 'No parece un correo institucional');
        return redirect('/');
    }
});

Route::get('/basic-info', function () {
    return view('basic-info');
});

Route::post('/basic-info', function (Request $request) {
    if(session()->has('student_email')) {
        $student_name = $request->input('student_name');
        $student_code = $request->input('student_code');
        $faculty = $request->input('faculty');
        $program = $request->input('program');
        //TODO validar codigo
        session()->put('student_name', trim($student_name));
        session()->put('student_code', trim($student_code));
        session()->put('faculty', trim($faculty));
        session()->put('program', trim($program));
        return redirect('/survey');
    } else {
        session()->flash('mensaje', 'Lo sentimos ya existe una votación con este correo');
        return redirect('/');
    }

});

Route::get('/survey', function (Request $request) {
    if(session()->has('student_email')) {
        return view('survey');
    } else {
        session()->flash('mensaje', 'Lo sentimos ya existe una votación con este correo');
        return redirect('/');
    }
});

Route::post('/survey', function (Request $request) {
    if(session()->has('student_email') && session()->has('student_name') && session()->has('student_code') && session()->has('faculty') && session()->has('program')) {
        $student_email = session('student_email');
        $student_name = session('student_name');
        $student_code = session('student_code');
        $faculty = session('faculty');
        $program = session('program');
        $survey = new SurveyAnswer();
        $survey->student_email = $student_email;
        $survey->student_name = $student_name;
        $survey->student_code = $student_code;
        $survey->faculty = $faculty;
        $survey->program = $program;
        $survey->funniest_professor_id = $request->input('funniest_professor_id');
        $survey->most_demading_professor_id = $request->input('most_demading_professor_id');
        $survey->most_inspiring_professor_id = $request->input('most_inspiring_professor_id');
        $survey->most_supportive_professor_id = $request->input('most_supportive_professor_id');
        $survey->most_innovative_professor_id = $request->input('most_innovative_professor_id');
        $survey->save();
        session()->flush();
        return view('goodbye');
    } else {
        session()->flash('mensaje', 'Parece que no llenaste los datos anteriores');
        return redirect('/');
    }
});

Route::get('/goodbye', function () {
    return view('goodbye');
});

Route::get('/professors', function () {
    if(session()->has('student_email')) {
        $professors = Professor::all();

        return response()->json([
            'professors' => $professors,
        ]);
    } else {
        return response()->json([
            'message' => 'guardando ip',
        ]);
    }
});
