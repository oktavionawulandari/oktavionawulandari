@extends('layout.panel')

@section('content')

<div class="container">
    <div class="card mb-4">
        <div class="card-header" >
            <h3>Tambah Data Educations</h3>
       <form action="{{ route('education.update', $educations) }}" method="POST" class="row mx-3" enctype="multipart/form-data">
            @csrf
            @method('PUT')
             <!-- IMAGE -->
            <div class="mb-3"> 
                <label for="image" class="form-label">Image</label> 
                  <input type="hidden" name="oldImage" value="{{$educations->image}}">
                    @if ($educations->image)
                        <img src="{{ asset('/' .$educations->image) }}" alt="{{ $educations->image }}" class="img-preview img-fluid mb-3 col-sm-5">
                            @else
                                <img class="img-preview img-fluid mb-3 col-sm-5">
                                    @endif
                                        <input class="form-control form-control-sm @error('image') is-invalid @enderror" id="image" type="file" name="image" onchange="previewImage()">
                            <!-- error message untuk title -->
                                @error('image')
                                    <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
             <!-- IMAGE -->

             <!-- JUDUL -->
            <div class="mb-3"> 
                <label for="judul" class="form-label">Nama Instansi</label> 
                    <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul',$educations->judul) }}">
                        <!-- error message untuk name -->
                            @error('judul')
                                <div class="invalid-feedback">
                            {{$message}}
                        </div>
                     @enderror
            <!-- JUDUL -->

            <!-- DESKRIPSI -->
            <div class="mb-3"> 
                <label for="deskripsi" class="form-label">Deskripsi</label> 
            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ old('deskripsi' ,$educations->deskripsi) }}">
            <!-- error message untuk name -->
            @error('deskripsi')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
            <!-- DESKRIPSI -->

           <div class="form-group">
                <input type="submit" value="Simpan" class="btn btn-success" />
            </div> 
        </form>  
    </div>
 </div>
</div>

@endsection