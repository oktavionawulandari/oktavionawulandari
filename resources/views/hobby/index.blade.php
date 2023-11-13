@extends('layout.panel')

@section('content')

            <body>
            <div class="content-wrapper">
                <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Hobby</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">DataHobby</li>
                        </ol>
                    </div>
                    </div>
                </div>
                
                    <!-- KONTEN -->
                    </section>
                        <div class="border-bottom-warning">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                <div class="table-responsive">
                                <table class="table table-bordered" id="h" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <!--Notifikasi menggunakan flash session data-->
                                    @if(session('success'))
                                    <div class="alert alert-success">
                                        {{session('success')}}
                                    </div>
                                    @endif
                                    @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{session('error')}}
                                    </div>
                                    @endif

                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>Gambar</th>
                                                <th>Judul</th>
                                                <th>Deskripsi</th>
                                                <th>Aksi</th>
                                            </tr>

                                            <tbody class="text-center">
                                                @php $no=1; @endphp
                                        @forelse ($hobbies as $hobby)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td style="width: 120px">@if ($hobby->image)
                                                <img src="{{ asset('/' .$hobby->image) }}" alt="{{ $hobby->image }}"class="img-fluid mt-3">
                                                @endif</td>
                                                <td>{{ $hobby->judul }}</td>
                                                <td>{{ $hobby->deskripsi }}</td>
                                                <td class="justify-content-center">
                                                        <div class="d-flex flex-row mb-2 justify-content-center">
                                                            <a href="{{ route('hobby.edit', $hobby->id) }}" class="btn btn-sm  btn-success"><i class="bi bi-pencil-square"></i>Edit</a>

                                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('hobby.destroy', $hobby->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger btn-block">Delete</button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                                    @empty
                                                    <div class="alert alert-danger">
                                                        Data hobby belum Tersedia.
                                                    </div>
                                                @endforelse
                                            </tbody>
                                        </table>

                                        </div>
                                            <a href="{{ route('hobby.create') }}"
                                                class="btn  btn-info btn-md mb-3 ms-3 float-right text-light"
                                                style="width: fit-content;">+Tambah
                                                Data Hobby</a>
                                            <a href="{{ route('hobby.pdf') }}"
                                                class="btn  btn-success btn-md mb-3  ms-1 float-right text-light" style="width: fit-content;" target="_blank">
                                                Export to PDF</a>
                                            <a href="{{ route('hobby.excel') }}"
                                                class="btn  btn-success btn-md mb-3 float-right text-light" style="width: fit-content;">
                                                Export To Excel</a>
                                        </div>
                                    </tr>
                            </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <script>
   $(document).ready(function () {
    $('#h').DataTable(
    {
        scrollX: true,
        scrollY: '500px',
        scrollCollapse: true,
        paging: true,
    });
});
</script>
@endsection