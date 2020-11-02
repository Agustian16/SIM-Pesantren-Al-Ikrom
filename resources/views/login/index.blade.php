@extends('layout.index')

@section('content')
    <form class="card-384" action="{{ url('/login') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" id="username" autocomplete="off" placeholder="Ketik username">
        </div>
        <div class="form-group-last">
            <label for="password">Password</label>
            <div class="input-group input-group-password">
                <input type="password" name="password" class="form-control" id="password" autocomplete="off" placeholder="Ketik password">
            </div>
        </div>
        <button type="submit" class="mt-4 btn btn-primary btn-block">MASUK</button>
    </form>
@endsection
