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
                      <th>konten</th>
                      <th>tgl dibuat</th>
                      <th>kategori</th>
                      <th>status</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($artikel as $item)
                      @php
                          $no = 1;
                      @endphp
                      <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{ $item->judul }}</td>
                          <td>{{ $item->konten}}</td>
                          <td>{{ $item->create_at}}</td>
                          <td>{{ $item->kategori}}</td>
                          <td>{{ $item->status}}</td>

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