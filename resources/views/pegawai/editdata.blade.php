@extends('layouts.main')
@extends('layouts.admin')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Pegawai</h1><br>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v2</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="/updatedata/{{ $pegawai->id }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" value="{{ $pegawai->nama }}" name="nama" id="formGroupExampleInput" placeholder="" required>
                                </div>

                                <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Pilih Jenis Kelamin</label>
                                <select class="form-select" name="jenis_kelamin"  value="{{ $pegawai->jenis_kelamin }}" aria-label="Default select example">
                                    <option value="Laki-Laki">1. Laki-Laki</option>
                                    <option value="Perempuan">2. Perempuan</option>
                                </select>
                                </div>

                                <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Nomor Handphone</label>
                                <input type="number" class="form-control" name="no_hp" value="{{ $pegawai->no_hp }}" id="formGroupExampleInput" placeholder="" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
