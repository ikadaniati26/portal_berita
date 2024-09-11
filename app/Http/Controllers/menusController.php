<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class menusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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
        // dd($berita_video);
        
    
        $kategori = DB::table('artikel')
            ->join('kategori', 'artikel.kategori_idkategori', '=', 'kategori.idkategori')
            ->select('artikel.judul', 'artikel.image', 'kategori.nama as kategori')
            ->where('kategori.status', 'true')
            ->get();

        // Debugging, cek apakah $beritautama ada
        // dd($kategori);
    
        return view('website.user.layout', compact('trendingnow','berita_utama','kategori','berita_video'));
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
        //
    }

    /**
     * Display the specified resource.
     */

    public function show($page)
    {
        // Ambil semua menu dari tabel 'menus' menggunakan query builder
        $menus = DB::table('menus')->get();
    
        // Periksa apakah view dengan nama yang sesuai ada
        if (view()->exists($page)) {
            return view($page, compact('menus'));
        }
    
        // Jika view tidak ditemukan, tampilkan halaman 404
        abort(404);
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
