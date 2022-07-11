@extends('admin.template')

@section('title','Login')

@section('content')
    <div class="row">
        <div class="col mx-auto my-3 col-3">
            <form action="{{ route('admin.auth.sign-in') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control"/>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control"/>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary col-12">Log In</button>
                </div>
            </form>
        </div>
    </div>
@endsection
