@extends('layouts.admin')
{{-- menambahkan layout admin.blade.php --}}
@section('title', 'Detail Masyarakat')
{{-- title halaman web --}}

@section('content')
{{-- content adalah isi halaman dalam file admin.blade.php --}}

<!-- Page Heading -->
<a href="{{ route('admin.report-category.index') }}" class="btn btn-danger mb-3">Kembali</a>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Kategori</h6>
    </div>
    <div class="card-body">

        <table class="table table-bordered">
            <tr>
                <td>Nama</td>
                <td>{{ $category->name }}</td>
            </tr>
            <tr>
                <td>Gambar / Ikon</td>
                <td>
                    <img src="{{ asset('storage/' . $category->image) }}" alt="image" width="200">
                </td>
            </tr>
        </table>
    </div>
</div>  


@endsection
