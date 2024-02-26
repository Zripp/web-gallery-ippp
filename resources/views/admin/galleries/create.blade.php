@extends('admin.layout')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="/galleries" method="post">
                @csrf
                <div class="form-group mb-3">
                    <label for="post_id">Judul Post</label>
                    <select name="post_id" class="form-control" id="post_id">
                        <option value="">Pilih Post</option>
                        @foreach ($posts as $post)
                            <option value="{{ $post->id }}">{{ $post->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-grup mb-3">
                            <label for="position">Posisi</label>
                            <input type="number" name='position' class="form-control" id="position" required>
                            <small>Nilai pisisi harus berupa angka</small>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                    <div class="form-grup mb-3">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" id="status" required>
                            <option value="">Pilih Status</option>
                            <option value="aktif">Aktif</option>
                            <option value="tidak-aktif">Tidak Aktif</option>
                        </select>
                    </div>
                </div>

                <button class="btn btn-primary" type="submit">Simpan</button>

            </form>
        </div>
    </div>
@endsection
