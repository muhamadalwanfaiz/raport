@extends('admin.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah Guru Mapel</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('gumap.index') }}">Guru Mapel</a></li>
                <li class="breadcrumb-item active">Tambah Guru Mapel</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <form action="{{ route('gumap.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="mapel_id" class="form-label">Pilih Mata Pelajaran</label>
            <select id="mapel_id" name="mapel_id" class="form-control" required>
                <option value="" disabled selected>Pilih Mata Pelajaran</option>
                @foreach ($mapels as $mapel)
                    <option value="{{ $mapel->id }}">{{ $mapel->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="guru_id" class="form-label">Pilih Guru</label>
            <select id="guru_id" name="guru_id" class="form-control" required>
                <option value="" disabled selected>Pilih Guru</option>
                @foreach ($gurus as $guru)
                    <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('gumap.index') }}" class="btn btn-secondary">Kembali</a>
    </form>

</main>
@endsection