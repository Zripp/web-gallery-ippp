@extends('admin.layout')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="/users/store" method="post">
            @csrf
        <div class="form-grup mb-3">
            <label for="name">Nama</label>
            <input type="text" class="form-control" name="name">
        </div>

        <div class="form-grup mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email">
        </div>

        <div class="form-grup mb-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password">
        </div>

        <button class="btn btn-primary" type="submit">Simpan</button>
    </form>
    </div>
</div>
@endsection