@extends('layout.panel')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Edit Data Skill</h3>
        </div>
    <form action="{{ route('skill.update', $skills) }}" method="POST" class="row mx-3" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="image" class="form-label me-3 mt-3 d-block">Gambar</label>
            <input type="hidden" name="oldImage" value="{{ $skills->image }}">
            @if ($skills->image)
                <img src="{{ asset('/' .$skills->image) }}" alt="{{ $skills->image }}" class="img-preview img-fluid mb-3 col-sm-5">
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
            <label for="judul">Skill</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $skills->judul) }}">
            <!-- error message untuk judul -->
            @error('judul')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ old('deskripsi', $skills->deskripsi) }}">
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