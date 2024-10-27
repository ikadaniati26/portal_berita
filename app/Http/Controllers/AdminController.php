<?php

namespace App\Http\Controllers;
use App\Mail\ArtikelBaruDitinjau;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Kategori;

class AdminController extends Controller
{

    public function index()
    {
        $artikel = Artikel::all();
        return view('website.jurnalis.artikel', compact('artikel')); 

    }


    public function create()
    {
        // Mengambil kategori dengan status false
        $kategori = Kategori::where('status', 'false')->get();
        // dd($kategori); // Ini akan menampilkan isi dari koleksi        
        return view('website.jurnalis.forminputartikel',compact('kategori'));
    }
 
    public function store(Request $request)
    {
        //pesan validasi custom
        $message = [
            'judul.required' => 'judul harus diisi', 
            'judul.max'      => 'minimal 10 karakter',
            'status.required' => 'Status harus dipilih.',
            'kategori_idkategori.required' => 'Kategori harus dipilih.',
            'penulis.required' => 'Nama penulis harus diisi.',
            'penulis.max' => 'Nama penulis tidak boleh lebih dari 255 karakter.',
            'editor.required' => 'Nama editor harus diisi.',
            'editor.max' => 'Nama editor tidak boleh lebih dari 255 karakter.'
        ];
        //validasi input
         $validatedData = $request->validate([
            'judul' => 'required|max:10',
            'image' => 'nullable', 
            'video' => 'nullable', 
            'konten' => 'required',
            'kategori_idkategori' => 'required', // harus sesuai dengan id kategori yang ada
            'penulis' => 'required|max:30',
            'editor' => 'nullable|max:30', // editor bisa null jika belum ditentukan
        ], $message);
        // dd($request->all());

        // Setelah validasi, set status secara otomatis
        $validatedData['status'] = 'cek editor';

    
        // Simpan data ke database
        Artikel::create($validatedData); //dapat langsung menggunakan $validateData

        // Redirect atau tampilkan pesan sukses
            return redirect('/form-input')->with('success', 'Artikel berhasil dikirim untuk ditinjau oleh editor.');
        }
    

        public function show($id)
        {
            $artikel = Artikel::findOrFail($id);
            dd($artikel); // Debugging
            return view('website.jurnalis.show', compact('artikel'));
        }
        

    public function edit_artikel(string $id)
    {
        $query = Artikel::where('idartikel', $id)->first();
        return view('website.jurnalis.artikel', compact('query'));
    }

    public function dashboardEditor()
    {
        // Query untuk mendapatkan jumlah artikel yang perlu dicek editor
        $artikelBaru = Artikel::where('status', 'cek editor')->count();
        return view('website.editor.dashboard', compact('artikelBaru'));
    }

    public function artikelEditor()
    {
        // Ambil data artikel yang perlu dicek untuk ditampilkan di dashboard    
        $daftarArtikel = Artikel::where('status', 'cek editor')->get();
        return view('website.editor.artikel', compact('daftarArtikel'));
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
}
