<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('pages.user.index',  ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // gaada bang
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
            'assistant_id' => 'required',
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|confirmed',
            'role' => 'required',
        ]);

        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return redirect()->route('users')->with('success', 'Berhasil menambah pengguna baru!'); // Ganti 'success.route' dengan nama rute yang sesuai
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // sama ini juga gaada bang
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('assistant_id', $id)->firstOrFail();

        return view('pages.user.edit', ['data' => $user]);
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
        // Validasi data
        $validatedData = $request->validate([
            'assistant_id' => 'required',
            'name' => 'required',
            'username' => 'required|unique:users,username,' . $id,
            'old_password' => 'required',
            'password' => 'sometimes|confirmed|required',
            'role' => 'required',
        ]);
    
        // Cari pengguna berdasarkan ID
        $user = User::findOrFail($id);
    
        // Memeriksa apakah password lama sesuai
        if (!Hash::check($validatedData['old_password'], $user->password)) {
            return redirect()->back()->with('error', 'Password lama tidak sesuai');
        }
    
        // Jika password baru diisi, update password
        if ($validatedData['password']) {
            $user->password = Hash::make($validatedData['password']);
        }
    
        // Update data pengguna
        $user->assistant_id = $validatedData['assistant_id'];
        $user->name = $validatedData['name'];
        $user->username = $validatedData['username'];
        $user->role = $validatedData['role'];
        $user->save();
    
        return redirect()->route('users')->with('success', 'User berhasil diperbarui');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users')->with('success', 'User berhasil dihapus');
    }
}
