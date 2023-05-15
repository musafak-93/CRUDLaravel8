<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-T5m5WERuXcjgzF8DAb7tRkByEZQGcpraRTinjpywg37AO96WoYN9+hrhDVoM6CaT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Data Pegawai</title>
</head>

<body>
    <h1 class="text-center mb-4 mt-4">Data Pegawai</h1>
    <div class="container">
        <a href="/tambahpegawai" class="btn btn-success">Tambah +</a>
        <div class="row g-3 align-items-center mt-2">
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
        </div>
        <div class="row">
            {{-- alert/notifikasi model lama muncul terus --}}
            {{-- @if ($message = Session::get('success'))
                <div class="alert alert-success mt-2" role="alert">
                    {{ $message }}
        </div>
        @endif --}}
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">No Telpon</th>
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
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>
    -->
</body>
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

</html>
