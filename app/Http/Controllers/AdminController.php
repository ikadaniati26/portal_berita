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
        // $artikel = Artikel::all();
        // Mengambil semua data artikel beserta data kategori terkait
        $artikel = Artikel::select(
            'artikel.idartikel',
            'artikel.judul', 
            'artikel.image', 
            'artikel.video', 
            'artikel.konten', 
            'artikel.status', 
            'artikel.created_at', 
            'artikel.updated_at', 
            'artikel.penulis', 
            'artikel.editor', 
            'kategori.nama AS nama'
        )
        ->join('kategori', 'artikel.kategori_idkategori', '=', 'kategori.idkategori')
        ->where('artikel.status','like','draft')
        ->get();

        return view('website.jurnalis.artikel', compact('artikel')); 

    }


    public function create()
    {
        // Mengambil kategori dengan status false
        $kategori = Kategori::where('status', 'true')->get();
        // dd($kategori);
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
         $request->validate([
            'judul' => 'required|max:10',
            'image' => 'nullable', 
            'video' => 'nullable', 
            'konten' => 'required',
            'kategori_idkategori' => 'required', // harus sesuai dengan id kategori yang ada
            'penulis' => 'required|max:30',
            'editor' => 'nullable|max:30', // editor bisa null jika belum ditentukan
        ], $message);
        // dd($request->all());


        if($request->action == 'submit'){
            $status='cek editor';
        }else{
            $status='draft';
        }
       
        // Simpan data ke database
        Artikel::create([
            'judul' => $request->judul,
            'image' => $request->image,
            'video' => $request->video,
            'konten' => $request->konten,
            'status' => $status,
            'kategori_idkategori' =>$request->kategori_idkategori,
            'penulis' => $request->penulis,
            'editor' => $request->editor

        ]); //dapat langsung menggunakan $validateData

        // Redirect atau tampilkan pesan sukses
            return redirect('/form-input')->with('success', 'Artikel berhasil dikirim untuk ditinjau oleh editor.');
    }
    

    public function show($id)
    {
        // Mengambil satu artikel berdasarkan ID
        $artikel = Artikel::select(
                'artikel.idartikel',
                'artikel.judul', 
                'artikel.image', 
                'artikel.video', 
                'artikel.konten', 
                'artikel.status', 
                'artikel.created_at', 
                'artikel.updated_at', 
                'artikel.penulis', 
                'artikel.editor', 
                'kategori.nama AS nama'
            )
            ->join('kategori', 'artikel.kategori_idkategori', '=', 'kategori.idkategori')
            ->where('artikel.idartikel', $id) // Mengambil artikel berdasarkan ID
            ->first(); // Menggunakan first() untuk mendapatkan satu objek artikel
            
            // Memeriksa jika artikel ada
            if (!$artikel) {
                return redirect()->back()->with('error', 'Article not found.'); // Jika artikel tidak ditemukan
            }
        
            // Mengembalikan tampilan berdasarkan peran pengguna
            if (auth()->user()->role === 'editor') {
                return view('website.editor.show', compact('artikel'));
            } else {
                return view('website.jurnalis.show', compact('artikel'));
            }
    }
        
        

    public function editArtikel(string $id)
    {
       // Mengambil satu artikel berdasarkan ID
       $artikel = Artikel::select(
        'artikel.idartikel',
        'artikel.judul', 
        'artikel.image', 
        'artikel.video', 
        'artikel.konten', 
        'artikel.status', 
        'artikel.created_at', 
        'artikel.updated_at', 
        'artikel.penulis', 
        'artikel.editor', 
        'kategori.nama AS nama'
    )
    ->join('kategori', 'artikel.kategori_idkategori', '=', 'kategori.idkategori')
    ->where('artikel.idartikel', $id) // Mengambil artikel berdasarkan ID
    ->first(); // Menggunakan first() untuk mendapatkan satu objek artikel
    
    $kategori = Kategori::where('status', 'true')->get();
    // dd($kategori);
    
    if (auth()->user()->role === 'editor') {
            return view('website.editor.formEdit_Artikel', compact('artikel','kategori'));
        } else {
            return view('website.jurnalis.formEdit_Artikel', compact('artikel','kategori'));
        }
        
    }

        public function updateArtikel(Request $request, string $id)
    {
        
        if($request->action == 'submit'){
            $status='cek editor';
        }else{
            $status='draft';
        }
       
        // dd($request->all());
        // Simpan data ke database
       $artikel = Artikel::where('idartikel',$id)
        ->update([
            'judul' => $request->judul,
            'image' => $request->image,
            'video' => $request->video,
            'konten' => $request->konten,
            'status' => $status,
            'penulis' => $request->penulis,
            'editor' => $request->editor

        ]); 

        // Jika pengguna adalah editor, tambahkan status ke array data yang akan di-update
    if (auth()->user()->role === 'editor') {
        $dataToUpdate['status'] = $request->input('status');
    }

                // Redirect ke halaman dashboard editor dengan pesan sukses
            if (auth()->user()->role === 'editor') {
                return redirect('dataartikel')->with('success', 'Artikel berhasil diperbarui');
            } else {
                return redirect('artikel')->with('success', 'Artikel berhasil diperbarui');

        }
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

        public function destroyArtikel($id)
        {
            $artikel = Artikel::where('idartikel', $id)->delete();
            if (auth()->user()->role === 'editor') {
                return redirect('dataartikel')->with('success', 'Berhasil Menghapus data.');
            } else {
                return redirect('artikel')->with('success', 'Berhasil Menghapus data.');
           }
        }
        public function dashboard()
        {
            $jmlTerbit = Artikel::where('status', 'dipublikasikan')->count();
            $jmlArtikelcek = Artikel::where('status','cek editor')->count();

            return view('website.jurnalis.dashboard', compact('jmlTerbit','jmlArtikelcek'));
        }
}
