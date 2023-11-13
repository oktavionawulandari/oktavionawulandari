@extends('layout.panel')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Edit Data Hobby</h3>
        </div>
    <form action="{{ route('hobby.update', $hobbies) }}" method="POST" class="row mx-3" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="image" class="form-label me-3 mt-3 d-block">Gambar</label>
            <input type="hidden" name="oldImage" value="{{ $hobbies->image }}">
            @if ($hobbies->image)
                <img src="{{ asset('/' .$hobbies->image) }}" alt="{{ $hobbies->image }}" class="img-preview img-fluid mb-3 col-sm-5">
            @else 
                <img class="img-preview img-fluid mb-3 col-sm-5">                                    
            @endif
            <input class="form-control form-control-sm @error('image') is-invalid @enderror" id="image" type="file" name="image" onchange="previewImage()">
            <!-- error message untuk image -->
            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>            
            @enderror
        </div>
        <div class="col form-group">
            <label for="judul">Nama Hobby</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $hobbies->judul) }}">
            <!-- error message untuk judul -->
            @error('judul')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ old('deskripsi', $hobbies->deskripsi) }}">
            <!-- error message untuk deskripsi -->
            @error('deskripsi')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
 
    <div class="form-group">
        <button type="submit" value="Simpan" class="btn btn-info">Simpan</button>
    </div>
 </form>
 </div>
 </div>
 </div>

@endsection