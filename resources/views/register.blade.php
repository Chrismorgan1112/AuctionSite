@extends("layouts.main")

@push('styles')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/registerStyle.css') }}" rel="stylesheet">
@endpush

@section("content")
{{-- <body class="text-center"> --}}
<div class="main-div container col-3 text-center">
    <main class="form-register">

        <h1 class="mt-5">REGISTER</h1>
        <form method="POST" action="/api/register">
            @csrf
            <div class="form-floating">
                <input type="text" id="floatingInput" class="form-control @error('name') is-invalid @enderror"
                    name="name" placeholder="Kimi No Namaewa" required value="{{ old('name') }}">
                <label for="floatingInput">Name</label>

                @error('name')
                <div class="invalid-feedback error-message">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-floating">
                <input type="email" id="floatingInput" class="form-control @error('email') is-invalid @enderror"
                    name="email" placeholder="Your age" required value="{{ old('email') }}">
                <label for="floatingInput">Email address</label>

                @error('email')
                <div class="invalid-feedback error-message">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-floating">
                <input type="password" id="floatingPassword"  class="form-control @error('password') is-invalid @enderror"
                    class="form-control @error('password') is-invalid @enderror" name="password" placeholder="password"
                    required value="{{ old('password') }}">
                <label for="floatingPassword">Password</label>

                @error('password')
                <div class="invalid-feedback error-message">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-floating">
                <input type="password" id="floatingPassword" class="form-control @error('password_confirmation') is-invalid @enderror"
                    class="form-control @error('password') is-invalid @enderror" name="password_confirmation"
                    placeholder="Confirm Password" required value="{{ old('password') }}">
                <label for="floatingPassword">Confirm Password</label>

                @error('confirm_password')
                <div class="invalid-feedback error-message">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="input-group">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Gender</label>
                </div>
                <select class="form-control custom-select @error('gender') is-invalid @enderror"
                 id="inputGroupSelect01" name="gender">
                    <option selected>Choose...</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>

                @error('gender')
                <div class="invalid-feedback error-message">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="w-100 btn btn-lg btn-danger register-button mt-2">Register</button>
        </form>

        <button onclick="location.href = 'home';" class="w-100 btn btn-lg btn-secondary mt-2">Go Back</button>

        <small class="d-block text-center mt-3"> Already have account? <a href="login" class="text-danger"> Login Now!</a></small>

    </main>
</div>
{{-- </body> --}}
@endsection
