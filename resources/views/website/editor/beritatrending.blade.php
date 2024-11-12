@extends('website.main.layout')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Data Berita Trending</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Tables</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Data Artikel</a>
                </li>
            </ul>
        </div>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{-- !-- Button untuk membuka modal --> --}}
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#artikelModal">
                            Tambah Artikel
                        </button>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="artikelModal" tabindex="-1" aria-labelledby="artikelModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content" width="100px">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="artikelModalLabel">Daftar Artikel</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Daftar artikel akan ditampilkan di sini -->
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Judul</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Kategori</th>
                                                <th scope="col">Penulis</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $no = 1;
                                            @endphp
                                            @foreach($daftarArtikel as $artikel)
                                            <tr onclick="selectArticle({{ $artikel->idartikel }}, this)">
                                                <td>{{$no++}}</td>
                                                <td class="text-truncate" style="max-width: 150px;"
                                                    title="{{ $artikel->judul }}">
                                                    {{ Str::limit($artikel->judul, 20) }}
                                                </td>
                                                <td>{{$artikel->status}}</td>
                                                <td>{{$artikel->nama}}</td>
                                                <td>{{$artikel->penulis}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <form action="{{ route('tambahBeritaTrending') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="artikel_idartikel" id="selectArticle" />
                                    <button type="submit" class="btn btn-primary">Tambahkan ke Berita Trending</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- EndModal -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th class="center" style="width:5%">No</th>
                                        <th style="width: 20%">Judul</th>
                                        <th style="width: 15%">Image</th>
                                        <th style="width: 15%">Video</th>
                                        <th style="width: 15%">Konten</th>
                                        <th style="width: 15%">Status</th>
                                        <th style="width: 15%">Kategori</th>
                                        <th style="width: 15%">Penulis</th>
                                        <th style="width: 15%">Editor</th>
                                        <th style="width: 15%">Aksi</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach ($bT as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td class="text-truncate" style="max-width: 150px;" title="{{ $item->judul }}">
                                          {{ Str::limit($item->judul, 20) }}
                                        </td>
                                        <td>
                                          <img src="{{ $item->image }}" alt="Image" class="img-fluid" style="max-width: 100px; height: auto;">
                                      </td>
                                        <td>{{ Str::limit($item->video, 10) }}</td>
                                        <td class="text-truncate" style="max-width: 200px;" title="{{ strip_tags($item->konten) }}">
                                          {!! Str::limit(strip_tags($item->konten), 20) !!}
                                      </td>                       
                                        <td>{{ $item->status}}</td>
                                        <td>{{ $item->nama}}</td>
                                        <td>{{ $item->penulis}}</td>
                                        <td>{{ $item->editor}}</td>
                                        <td>
                                            <form method="POST" action="{{ route('hapus_trending',['id'=>$item->idberitatrending])}}">
                                                @csrf
                                                @method('DELETE')
                                                {{-- &nbsp; --}}
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    title="Hapus Pegawai"
                                                    onclick="return confirm('Anda Yakin Data akan diHapus?')">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection