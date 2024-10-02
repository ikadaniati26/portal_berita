<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Artikel;
use Illuminate\Http\Request;


class menusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $trendingnow = DB::table('artikel')
        ->join('kategori', 'artikel.kategori_idkategori', '=', 'kategori.idkategori')
        ->select('artikel.*', 'kategori.*')->orderBy('create_at','desc')
        ->where('kategori.status', 'true')
        ->whereNull('artikel.video')
        ->get();
       
        $berita_utama = DB::table('beritautama')
            ->join('artikel', 'beritautama.artikel_idartikel', '=', 'artikel.idartikel')
            ->join('kategori', 'artikel.kategori_idkategori', '=', 'kategori.idkategori')
            ->select('beritautama.*', 'artikel.judul', 'artikel.image', 'kategori.nama as kategori')
            ->get();
        // dd($berita_utama);
        $berita_video = DB::table('artikel')
                       ->whereNotNull('video')
                       ->get();
        
        $pilihkategori = $request->query('page'); // Mendapatkan kategori dari query string
        // dd($request->all());
        if ($pilihkategori) {
            // Mengambil artikel yang sesuai dengan kategori
            $kategori = DB::table('artikel')
                ->join('kategori', 'artikel.kategori_idkategori', '=', 'kategori.idkategori')
                ->select('artikel.judul', 'artikel.image', 'kategori.nama as kategori')
                ->where('kategori.status', 'true')
                ->where('kategori.nama', $pilihkategori) // Menggunakan $pilihkategori di sini
                ->get();
        } else {
            // Jika tidak ada kategori yang dipilih, ambil semua artikel
            $kategori = DB::table('artikel')
                ->join('kategori', 'artikel.kategori_idkategori', '=', 'kategori.idkategori')
                ->select('artikel.judul', 'artikel.image', 'kategori.nama as kategori')
                ->where('kategori.status', 'true')
                ->get();
        }
        // dd($kategori);
        // dd($pilihkategori); // Akan menampilkan kategori yang diambil dari query string
        $berita_utama = DB::table('artikel')->get(); // Ambil data berita utama
        // dd($berita_utama); // Periksa data yang dikirim ke view
        return view('website.user.layout', compact('trendingnow', 'berita_utama', 'berita_video','kategori'));
        
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
        $inputan = $request->all();
        dd($inputan);
        
    }
    /**
     * Display the specified resource.
     */

    public function show($id)
    {
        // $artikel = Artikel::where('idartikel', $idartikel)->get();
        $artikel = Artikel::findOrFail($id);
        return view('website.user.layout', compact('artikel'));
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
}
