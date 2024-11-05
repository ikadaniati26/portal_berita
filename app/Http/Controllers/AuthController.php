<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\DataPengguna;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $dataLogin = Auth::user();
        // $query = DataPengguna::join('akun','akun.id', 'pengguna.akun_idpengguna')
        // ->select('akun.*', 'pengguna.*')
        // ->where('akun_idpengguna',$dataLogin->id)->first();

        // dd($query);
        // return view('website.main.header', compact('query'))
        // ->with('dataLogin', $dataLogin);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // dd($request->all()); // Cek data yang diterima
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:akun,email',
            'password' => 'required|string|min:3|confirmed', // Pastikan ini
            'role' => 'required|string',
        ]);
        
        // Jika validasi lolos, maka simpan datanya
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role, // Simpan jabatan
        ]);
        return redirect()->back()->with('success', 'Akun berhasil dibuat,Silakan login.');
         
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function showRegistrationForm()
    {
        return view('website.auth.register'); // Buat view ini
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function login()
    {
        return view('website.auth.login');
        
    }
    
    public function authenticate(Request $request)
    {
        // Validasi input termasuk role jika diperlukan
        $credentials = $request->only('email', 'password');
        $roleFromForm = $request->input('role'); // Ambil role dari form
    
        // Coba autentikasi user
        if (Auth::attempt($credentials)) {
            // Regenerasi session untuk keamanan
            // $request->session()->regenerate();
            
            // Ambil user yang sedang login
            $user = Auth::user();
            // dd($user);
    
            // Cek apakah role dari form sesuai dengan role dari database
            if ($user->role !== $roleFromForm) {
                Auth::logout();
                return redirect()->back()->with('gagal', 'Role tidak sesuai.');
            }
    
            // Cek role user yang login dan arahkan ke dashboard sesuai peran
            switch ($user->role) {
                case 'jurnalis':
                    return redirect()->intended('dashboardjurnalis');
                case 'editor':
                    return redirect()->intended('dashboardeditor');
                case 'admin':
                    return redirect()->intended('dashboardadmin');
                default:
                    // Jika role tidak sesuai, logout dan berikan pesan error
                    Auth::logout();
                    return redirect()->back()->with('gagal', 'Role tidak valid.');
            }
        } else {
            // Jika autentikasi gagal
            return back()->with('gagal', 'Password atau email salah.');
        }
    }
    
    public function Logout(Request $request): RedirectResponse
    {
       Auth::logout();
       $request->session()->invalidate();
       $request->session()->regenerateToken();
       return redirect('login');
    }
   
    }
        
    

   

