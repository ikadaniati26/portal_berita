<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\DataPengguna;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|numeric',
            // Tambahkan validasi lainnya sesuai kebutuhan
        ]);

        // Simpan data profil
        $user = Auth::user();
        $user->nama_lengkap = $request->input('nama_lengkap');
        $user->alamat = $request->input('alamat');
        $user->telepon = $request->input('telepon');
        // Simpan data lainnya sesuai kebutuhan
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Profil berhasil dilengkapi.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = Auth::user();

        $pengguna = DataPengguna::where('akun_idpengguna', $user->id)->first();
        return view('website.main.profil', compact('user', 'pengguna'));
    }
    


    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = Auth::user();
        $pengguna = DB::table('pengguna')->get();
        return view('website.main.profil',compact('user','pengguna'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
                $username = $request->username;
                $password = $request->password;
                $role = $request->role;
                
                User::where('id_pengguna', $id)->update([
                    'username' => $username,
                    'password' => $password,
                    'Role'   => $role
                
            ]);
            // Redirect dengan pesan sukses
            return redirect('website.jurnalis.dashboardjurnalis')->back()->with('success', 'Profil berhasil diupdate!');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
