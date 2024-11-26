<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();

        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('subjects.edit');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Subject::create($request->all());

        return redirect()->route('subjects.index')->with('success', 'Subject creado exitosamente.');
    }


    public function show(Subject $subject)
    {
        return view('subject.show', compact('subject'));
    }


    public function edit($id)
    {
        $subject = Subject::find($id);
        return view('subject.edit', compact('subject'));
    }


    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $subject->update($request->all());

        return redirect()->route('subjects.index')->with('success', 'Subject actualizado exitosamente.');
    }


    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->route('subjects.index')->with('success', 'Subject eliminado exitosamente.');
    }
}
