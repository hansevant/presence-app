<?php

namespace App\Http\Controllers;

use App\Models\Code;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Code::orderBy('created_at', 'desc')->get();
        
        return view('pages.code.index', ['codes' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $randomCode = Str::random(10);

        Code::create([
            'code'=> $randomCode,
            'maker_by' => $user->assistant_id
        ]);

        return redirect()->back()->with('success', "Berhasil membuat kode absen! berikut kodenya : $randomCode");
    }

}
