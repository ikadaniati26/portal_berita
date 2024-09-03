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
             // Mengambil data menu langsung dari database tanpa model
             $menus = DB::table('menus')->orderBy('order_no', 'asc')->get();

             // Kirim data ke view
             return view('website.user.home', compact('menus'));
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
