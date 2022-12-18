@extends('layouts.main');
@extends('layouts.admin');
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
@endpush
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
            <form action="/pegawai" method="GET">
                <div class="mb-3">
                    <input type="text" style="width: 25%" name="search" class="form-control" aria-describedby="passwordHelpInline" placeholder="search" autocomplete="off">
                </div>

                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group me-2" role="group" aria-label="First group">
                        <a type="button" class="btn btn-primary" href="/createpegawai" role="button">Tambah Data</a><br>
                    </div>
                    <div class="btn-group me-2" role="group" aria-label="second group">
                        <a type="button" class="btn btn-warning" href="/exportpdf" role="button">Export PDF</a><br>
                    </div>
                </div>
            </form>
            {{-- @if ($message= Session::get('success'))
                    <div class="alert alert-success" role="alert">
                    {{ $message }}
                    </div>
                @endif<br> --}}
            <table class="table table-bordered border-dark">
                <thead class="table-primary border-dark">
                    <tr class="text-center">
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">No Hp</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Create By</th>
                        <th scope="col">Last Update</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($pegawai as $index => $pegawais)
                    <tr class="text-center">
                        <td>{{ $index + $pegawai->firstitem() }}</td>
                        <td>{{ $pegawais->nama }}</td>
                        <td>{{ $pegawais->jenis_kelamin }}</td>
                        <td>{{ $pegawais->no_hp }}</td>
                        <td>
                            <img src="{{ asset('fotopegawai/'.$pegawais->foto) }}" style="width: 40px" height="40px" alt="">
                        </td>
                        <td>{{ $pegawais->created_at }}</td>
                        <td>{{ $pegawais->updated_at }}</td>
                        <td>
                            <a href="/editdata/{{ $pegawais->id }}" class="btn btn-warning">Edit</a>
                            <a href="#" data-id="{{ $pegawais->id }}" data-nama="{{ $pegawais->nama }}" class="btn btn-danger delete">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $pegawai->links() }}
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>

    $('.delete').click(function(){
        var pegawaiiid = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');
        swal({
        title: "Anda Yakin?",
        text: " Nama "+ nama + " akan dihapus dari data pegawai" ,
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location = "/delete/"+pegawaiiid+""
            swal("Data Berhasil Di hapus", {
            icon: "success",
            });
        } else {
            swal("Batal DI hapus");
        }
        });
    });

</script>
<script>

    @if (Session::has('success'))
    {
        toastr.success("{{ Session::get('success') }}")
    }
    @endif
</script>



@endsection

