@extends('layout.panel')

@section('content')

<div class="container">
    <div class="card mb-4">
        <div class="card-header">
            <h3>Registrasi Admin</h3>
        {{-- </div>
        <div class="card-body">
            <?php if (!empty(session()->getFlashdata('error'))) : ?> --}}
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h4>Periksa Entrian Form</h4>
            </hr />
            {{-- <?php echo session()->getFlashdata('error'); ?> --}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    {{-- <?php endif; ?>  --}}
        <form method="post" action="/register"> 
             @csrf
             {{-- Name --}}
            <div class="mb-3"> 
                <label for="name" class="form-label">Name</label> 
                <input type="text" class="form-control @error('name')is-invalid @enderror" id="name" name="name" required value="{{ old('name') }}"> 
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
             {{-- Email --}}
            <div class="mb-3"> 
                <label for="email" class="form-label">Email</label> 
                <input type="email" class="form-control @error('email')is-invalid @enderror" id="email" name="email" required value="{{ old('email') }}">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
             {{-- Username --}}
            <div class="mb-3"> 
                <label for="username" class="form-label">Username</label> 
                <input type="text" class="form-control @error('username')is-invalid @enderror" id="username" name="username" required value="{{ old('username') }}"> 
                @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div> 
            {{-- Password --}}
            <div class="mb-3"> 
                <label for="password" class="form-label">Password</label> 
                <input type="password" class="form-control @error('password')is-invalid @enderror" id="password" name="password" required > 
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div> 
            {{-- <div class="mb-3"> 
                <label for="password_conf" class="form-label">Confirm Password</label> 
                <input type="password" class="form-control" id="password_conf" name="password_conf"> 
            </div>  --}}
            <div class="mb-3"> 
                <button type="submit" class="btn btn-primary">Register</button> 
            </div> 
        </form>  
    </div>
 </div>
</div>


@endsection