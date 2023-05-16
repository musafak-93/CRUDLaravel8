@extends('layout.admin')

@push('css')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-T5m5WERuXcjgzF8DAb7tRkByEZQGcpraRTinjpywg37AO96WoYN9+hrhDVoM6CaT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard AHG</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard AHG</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container">
            <a href="/tambahpegawai" class="btn btn-success">Tambah +</a>
            <div class="row g-3 align-items-center mt-2 mb-2">
                <div class="col-auto">
                    <form action="/pegawai" method="GET">
                        <input type="search" id="inputPassword6" name="search" class="form-control"
                            aria-labelledby="passwordHelpInline">
                    </form>
                </div>
                <div class="col-auto">
                    <a href="/exportpdf" class="btn btn-info">Export PDF</a>
                </div>
                <div class="col-auto">
                    <a href="/exportexcel" class="btn btn-success">Export Excel</a>
                </div>
                <div class="col-auto">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Import Data
                    </button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                {{-- <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1> --}}
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="/importexcel" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="file" name="file" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Import</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">No Telpon</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Agama</th>
                            <th scope="col">Dibuat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $index => $row)
                            <tr>
                                <th scope="row">{{ $index + $data->firstItem() }}</th>
                                <td>{{ $row->nama }}</td>
                                <td>
                                    <img src="{{ asset('fotopegawai/' . $row->foto) }}" alt="" style="width: 40px;">
                                </td>
                                <td>{{ $row->jeniskelamin }}</td>
                                <td>0{{ $row->notelpon }}</td>
                                <td>{{ $row->tanggal_lahir }}</td>
                                <td>{{ $row->religions->nama }}</td>
                                <td>{{ $row->created_at->format('D M Y') }}</td>
                                <td>
                                    <a href="/tampilkandata/{{ $row->id }}" class="btn btn-info">Edit</a>
                                    <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}"
                                        data-nama="{{ $row->nama }}">Delete</a>
                                </td>
                            </tr>
                    </tbody>
                    @endforeach
                </table>
                {{ $data->links() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- Script untuk alert jika ingin menghapus data --}}
    <script>
        $('.delete').click(function() {
            var pegawaiid = $(this).attr('data-id');
            var nama = $(this).attr('data-nama');

            swal({
                    title: "Yakin ?",
                    text: "Kamu akan menghapus data pegawai dengan " + nama + "",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/delete/" + pegawaiid + ""
                        swal("Data berhasil dihapus", {
                            icon: "success",
                        });
                    } else {
                        swal("Data tidak jadi dihapus");
                    }
                });
        });
    </script>

    {{-- Alert untuk insert data --}}
    <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif
    </script>
@endpush
