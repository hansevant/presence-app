<?php

namespace App\Http\Controllers;

use App\Models\LabClass;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = LabClass::all();
        return view('pages.class.index', ['classes' => $classes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'class' => 'required',
            'major' => 'required',
            'faculty' => 'required',
        ]);

        LabClass::create($data);

        return redirect()->route('class')->with('success', 'Berhasil menambah kelas baru!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class = LabClass::findOrFail($id);

        return view('pages.class.edit', ['data' => $class]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'class' => 'required',
            'major' => 'required',
            'faculty' => 'required',
        ]);

        $class = LabClass::findOrFail($id);

        $class->class = $validatedData['class'];
        $class->major = $validatedData['major'];
        $class->faculty = $validatedData['faculty'];
        $class->save();

        return redirect()->route('class')->with('success', 'kelas berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class = LabClass::findOrFail($id);
        $class->delete();

        return redirect()->route('class')->with('success', 'Kelas berhasil dihapus');
    }
}
