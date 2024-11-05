@extends('website.main.layout')

@section('content')
<div class="container">
    <div class="page-inner">
      <div class="page-header">
        <h3 class="fw-bold mb-3">Data Artikel</h3>
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
              <h4 class="card-title">Basic</h4>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                {{-- <button type="button" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Tambah Data
                </button> --}}
                  
                <table
                  id="basic-datatables"
                  class="display table table-striped table-hover"
                >
                <thead>
                  <tr>
                      <th class="center" style="width:5%">No</th>
                      <th style="width: 20%">Judul</th>
                      <th style="width: 15%">Image</th>
                      <th style="width: 15%">Video</th>
                      <th style="width: 15%">Konten</th>
                      <th style="width: 15%">Status</th>
                      <th style="width: 15%">Tgl Dibuat</th>
                      <th style="width: 15%">Tgl Diperbarui</th>
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
                  @foreach ($daftarArtikel as $item)
                      <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{ $item->judul }}</td>
                          <td>{{ $item->image }}</td>
                          <td>{{ $item->video }}</td>
                          <td>{!! $item->konten !!}</td>
                          <td>{{ $item->status}}</td>
                          <td>{{ $item->created_at}}</td>
                          <td>{{ $item->updated_at}}</td>
                          <td>{{ $item->kategori_idkategori}}</td>
                          <td>{{ $item->penulis}}</td>
                          <td>{{ $item->editor}}</td>
                            <td >
                              <form method="POST" action="{{ route('hapus_artikel',['id'=>$item->idartikel])}}">
                                  @csrf
                                  @method('DELETE')
                                  <a href="{{ route('show',['id'=>$item->idartikel]) }}"  class="btn btn-info btn-sm">
                                    <i class="fa-solid fa-eye"></i>
                                  </a>
                                  <a class="btn btn-warning btn-sm" title="Edit"
                                      href="{{ route('editArtikel',['id'=>$item->idartikel])}}">
                                      <i class="fa-solid fa-pencil"></i>
                                  </a>
                                  
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