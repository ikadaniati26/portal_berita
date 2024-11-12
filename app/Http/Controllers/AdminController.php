<?php

namespace App\Http\Controllers;
use App\Mail\ArtikelBaruDitinjau;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\BeritaUtama;
use App\Models\beritaTrending;


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
        $kategori = Kategori::where('status', 'true')->get();
        return view('website.jurnalis.forminputartikel',compact('kategori'));
    }
 
    public function store(Request $request)
    {
        $message = [
            'judul.required' => 'judul harus diisi', 
            'judul.max'      => 'minimal 100 karakter',
            'status.required' => 'Status harus dipilih.',
            'kategori_idkategori.required' => 'Kategori harus dipilih.',
            'penulis.required' => 'Nama penulis harus diisi.',
            'penulis.max' => 'Nama penulis tidak boleh lebih dari 255 karakter.',
            'editor.required' => 'Nama editor harus diisi.',
            'editor.max' => 'Nama editor tidak boleh lebih dari 255 karakter.'
        ];
        //validasi input
         $request->validate([
            'judul' => 'required|max:100',
            'image' => 'nullable', 
            'video' => 'nullable', 
            'konten' => 'required',
            'kategori_idkategori' => 'required', 
            'penulis' => 'required|max:30',
            'editor' => 'nullable|max:30', 
        ], $message);

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

        ]); 

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
            $kategori = Kategori::all();
            
            return view('website.editor.dashboard', compact('artikelBaru','kategori'));
        }

        public function artikelEditor()
        {
            // Ambil data artikel yang perlu dicek untuk ditampilkan di dashboard    
            $dataArtikel = Artikel::where('status', 'cek editor')->get();
            return view('website.editor.artikel', compact('dataArtikel'));
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
            $jmlArtikeldraft = Artikel::where('status','draft')->count();

            return view('website.jurnalis.dashboard', compact('jmlTerbit','jmlArtikelcek','jmlArtikeldraft'));
        }

        public function kelolaberita()
        {
            return view('website.editor.kelolaberita');
        }

        public function beritautama()
        {
            $daftarArtikel = Artikel::select(
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
            ->where('artikel.status', 'dipublikasikan')
            ->get();

            $bU = BeritaUtama::join('artikel', 'beritautama.artikel_idartikel', '=', 'artikel.idartikel')
            ->select(
                'beritautama.idberitautama', 
                'beritautama.artikel_idartikel', 
                'artikel.judul', 
                'artikel.image',
                'artikel.video',
                'artikel.konten',
                'artikel.status',
                'artikel.penulis',
                'artikel.editor',
                )
            ->get();
            return view('website.editor.beritautama',compact('daftarArtikel','bU'));
        }

        public function tambahBeritaUtama(Request $request)
        {
             // Ambil array ID artikel yang dipilih
            $selectedArticles = $request->input('artikel_idartikel');
             // Pisahkan string berdasarkan koma untuk mendapatkan array
            $selectedArticlesArray = explode(',', $selectedArticles);
         
            // Simpan setiap artikel sebagai berita utama
                foreach ($selectedArticlesArray as $artikelId) {
                    BeritaUtama::create([
                        'artikel_idartikel' => $artikelId,  // Simpan satu ID artikel per entri
                    ]);
                }
            return redirect()->back()->with('success', 'Artikel berhasil ditambahkan sebagai Berita Utama');
        }


        public function beritaTrending()
        {
            $daftarArtikel = Artikel::select(
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
            ->where('artikel.status', 'dipublikasikan')
            ->get();

            // dd($daftarArtikel);

            $bT = BeritaTrending::join('artikel', 'beritatrending.artikel_idartikel', '=', 'artikel.idartikel')
            ->select(
                'beritatrending.idberitatrending', 
                'beritatrending.artikel_idartikel', 
                'artikel.judul', 
                'artikel.image',
                'artikel.video',
                'artikel.konten',
                'artikel.status',
                'artikel.penulis',
                'artikel.editor',
                )
            ->get();

            return view('website.editor.beritatrending',compact('daftarArtikel','bT'));
        }

        public function tambahBeritaTrending(Request $request)
        {
            // Ambil array ID artikel yang dipilih
            $selectedArticles = $request->input('artikel_idartikel');
            // Pisahkan string berdasarkan koma untuk mendapatkan array
            $selectedArticlesArray = explode(',', $selectedArticles);
         
            // Simpan setiap artikel sebagai berita trending
                foreach ($selectedArticlesArray as $artikelId) {
                    BeritaTrending::create([
                        'artikel_idartikel' => $artikelId,  // Simpan satu ID artikel per entri
                    ]);
                }
            // dd($selectedArticlesArray);
            return redirect()->back()->with('success', 'Artikel berhasil ditambahkan sebagai Berita Trending');
        }
        
        public function tambahKategori(Request $request){
            Kategori::create([
                'nama' => $request->nama,
                'status'=> $request->status,
            ]);
            return redirect('/dashboardeditor')->with('success', 'berhasil menambahkan kategori baru.');
        }
        
        public function destroyBerita($id)
        {
            $B = BeritaUtama::where('idberitautama', $id)->delete();
            return redirect('berita_utama')->with('success', 'Berhasil Menghapus data.');
        }

        public function destroyTrending($id)
        {
            $B = BeritaTrending::where('idberitatrending', $id)->delete();
            return redirect('berita_trending')->with('success', 'Berhasil Menghapus data.');
        }

        public function destroyKategori($id)
        {
            $B = Kategori::where('idkategori', $id)->delete();
            return redirect('dashboardeditor')->with('success', 'Berhasil Menghapus data.');
        }

        
        
}
