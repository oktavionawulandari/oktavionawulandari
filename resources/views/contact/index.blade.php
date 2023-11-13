@extends('layout.panel')

@section('content')

<div class="container mt-lg-5">
    <div class="my-5 py-5 px-3">
        <div class="container mt-4 p-3">
            <div class="row">
                <div class="col-md-12">
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
                    <div class="card border-0 shadow rounded">
                        <div class="card-header p-3 fs-5 text-light" style="background-color: #850E35;">Data Contact</div>
                        <div class="card-body p-3">
                            <div class="my-3 table-responsive">
                                <table id="contacts" class="table table-hover table-bordered border-secondary border-1">
                                    <thead class="text-center align-middle">
                                    <tr>
                                    <th scope="col">NO</th>
                                    <th scope="col">Nama Pengguna</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Message</th>
                                </tr>
                                    <tbody class="text-center">
                                        @php $no=1; @endphp
                                        @forelse($contacts as $contact)
                                        <tr>

                                    <td>{{$no++}}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->subject }}</td>
                                    <td>{{ $contact->message }}</td>

                                    @empty
                                      <div class="alert alert-danger">
                                          Data Contact Belum Tersedia.
                                      </div>
                                @endforelse
                            </tbody>
                            </thead>
                            <tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
   $(document).ready(function () {
    $('#contacts').DataTable(
    {
        scrollX: true,
        scrollY: '500px',
        scrollCollapse: true,
        paging: true,
    });
});
</script>
@endsection
