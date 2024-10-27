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
                      <th>No</th>
                      <th>Judul</th>
                      <th>Image</th>
                      <th>Video</th>
                      <th>Konten</th>
                      <th>Status</th>
                      <th>Created at</th>
                      <th>Updated at</th>
                      <th>Kategori</th>
                      <th>Penulis</th>
                      <th>Editor</th>
                      <th>Aksi</th>
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
                              <form method="POST" action="">
                                  @csrf
                                  @method('DELETE')
                                  <a href="" class="btn btn-info btn-sm">
                                    <i class="fa-solid fa-eye"></i>
                                  </a>
                                  <a class="btn btn-warning btn-sm" title="Edit"
                                      href="=">
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