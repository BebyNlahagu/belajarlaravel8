    <!doctype html>
    <html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css" integrity="sha384-X8QTME3FCg1DLb58++lPvsjbQoCT9bp3MsUU3grbIny/3ZwUJkRNO8NPW6zqzuW9" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <title>Data Pegawai</title>
    </head>
    <body>
        <h1 class="text-center mb-3">Data Pegawai</h1>
        <div class="container">
            <a href="/tambah" type="button" class="btn btn-primary mb-2">Tambah +</a>
                <div class="row g-3 align-items-center mg-2">
                    <form action="/pegawai" method="get">
                        <div class="col-lg-2">
                            <input type="search" id="inputPassword6" name="search" class="form-control" aria-describedby="passwordHelpInline">
                        </div>
                    </form>
                </div>
            <div class="row">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">No.Telpon</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Dibuat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $row)
                        <tr>
                            <th scope="row">{{$no++}}</th>
                            <td>{{$row->name}}</td>
                            <td>{{$row->jeniskelamin}}</td>
                            <td>{{$row->notelpon}}</td>
                            <td>
                                <img src="{{asset('fotopegawai/'.$row->foto)}}" alt="" style="width: 40px">
                            </td>
                            <td>{{$row->created_at->format('D M Y')}}</td>
                            <td>
                              <a href="/tampil/{{$row->id}}" class="btn btn-primary">Edit</a>
                              <a href="#" type="button" class="btn btn-danger delete" data-id="{{$row->id}}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$data->links()}}
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </body>
    <script>
        $('.delete').click( function(){
            var pegawaiid = $(this).attr('data-id');
            swal({
                title: "kamu Yakin?",
                text: "kamu akan menghapus data pegawai dengan id "+pegawaiid+" ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/hapus/"+pegawaiid+""
                    swal("Data Pegawai Berhasil Dihapus", {
                    icon: "success",
                    });
                } else {
                    swal("Data Tidak Jadi Dihapus");
                }
            });
        });
    </script>

    <script>
        @if (Session::has('success'))
            toastr.success("{{Session::get('success')}}")
        @endif
    </script>
    </html>
