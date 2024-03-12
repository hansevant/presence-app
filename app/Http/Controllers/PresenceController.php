<?php

namespace App\Http\Controllers;

use App\Models\Code;
use App\Models\LabClass;
use App\Models\Material;
use App\Models\Presence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PresenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function dashboard(){
        $user = Auth::user();
        $classes = LabClass::all();
        $materials = Material::all();

        $isCheckIn = Presence::where('assistant_id', $user->assistant_id)->whereNotNull('start')->whereNull('end')->first();
    
        return view('pages.presence.index', compact('classes', 'materials','isCheckIn','user'));
    }

    public function checkIn(Request $request)
    {
        $user = Auth::user();
        $request->merge(['assistant_id' => $user->assistant_id]);

        $request->validate([
            'assistant_id' => 'required',
            'material' => 'required',
            'class' => 'required',
            'teaching_role' => 'required',
            'code' => 'required|string',
        ]);
    
        // Ambil kode absen dari input form
        $inputCode = $request->input('code');
    
        // Cari kode absen dalam database
        $code = Code::where('code', $inputCode)->first();

        if (!is_null($code->maker_by) && $code->maker_by == $user->assistant_id) {
            return redirect()->back()->with('error', 'Anda tidak dapat menggunakan kode yang Anda buat sendiri.');
        }
    
        if ($code && is_null($code->used_by)) {

            $code->used_by = $user->assistant_id;
            $code->save();

            Presence::create([
                'assistant_id' => $request->input('assistant_id'),
                'material_id' => $request->input('material'),
                'class_id' => $request->input('class'),
                'teaching_role' => $request->input('teaching_role'),
                'code_id' => $code->id,
                'date' => now()->toDateString(), // Contoh, mengambil tanggal saat ini
                'start' => now()->toTimeString(), // Contoh, mengambil waktu saat ini
            ]);
            
            return redirect()->back()->with('success', 'Kode absen valid.');
        } else {
            // Jika kode absen tidak ditemukan atau sudah digunakan, kembalikan pesan kesalahan
            dd('tidak okee');
            return redirect()->back()->with('error', 'Kode absen tidak valid atau sudah digunakan.');
        }
    }

    public function checkOut(){
        $userId = Auth::user()->assistant_id;

        // Cari data presence yang sedang berlangsung (dimulai tetapi belum berakhir) untuk asisten yang login
        $presence = Presence::where('assistant_id', $userId)
                            ->whereNotNull('start')
                            ->whereNull('end')
                            ->first();

        // Jika ada data presence yang sedang berlangsung
        if ($presence) {
            // Update kolom end dengan waktu saat ini
            $presence->end = now()->toTimeString(); // Contoh, mengambil waktu saat ini

            // Hitung durasi kehadiran
            $startTime = strtotime($presence->start);
            $endTime = strtotime($presence->end);
            $duration = ($endTime - $startTime) / 60; // Menghitung durasi dalam menit
            $presence->duration = $duration;

            // Simpan perubahan
            $presence->save();

            return redirect()->back()->with('success', 'Anda telah check-out.');
        } else {
            return redirect()->back()->with('error', 'Anda belum melakukan check-in.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Presence  $presence
     * @return \Illuminate\Http\Response
     */
    public function show(Presence $presence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Presence  $presence
     * @return \Illuminate\Http\Response
     */
    public function edit(Presence $presence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Presence  $presence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presence $presence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Presence  $presence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presence $presence)
    {
        //
    }
}
