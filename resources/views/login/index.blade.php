@extends('layouts.main')

@section('frontend')

<div class="row justify-content-center">
    <div class="col-lg-4">
        
        @if (session()->has('loginError'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        
        <main class="border rounded-1 p-5 mt-5 bg-light">
            <h1 class="h3 mb-4 fw-normal text-center">Silakan Login</h1>
            <form action="/login" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" autofocus required value="{{ old('username') }}">
                    <label for="username">Username</label>
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-5">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
            
                <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
            </form>
        </main>
    </div>
</div>



@endsection