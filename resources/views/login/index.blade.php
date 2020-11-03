@extends('layout.index')

@section('content')
    <form class="card-384" action="{{ url('/login') }}" method="POST">
        @csrf
        <div class="row pt-5">
            <div class="col-6 offset-md-3 mt-5 mb-5">
                <h1 class="text-purple">Salam!</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6 offset-md-3">
                <div class="row mb-4 mt-3">
                    <div class="col-12">
                        <h5 for="username"><strong>Username</strong></h5>
                    </div>
                    <div class="col-12">
                        <input type="text" name="username" class="form-control default-textbox" id="username" autocomplete="off" placeholder="Masukan username">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h5 for="password"><strong>Password</strong></h5>
                    </div>
                    <div class="col-12">
                        <input type="password" name="password" class="form-control default-textbox" id="password" autocomplete="off" placeholder="Masukan password">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <button type="submit" class="mt-4 btn btn-primary btn-block">MASUK</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
