@extends('layouts.admin')
{{-- menambahkan layout admin.blade.php --}}
@section('title', 'Data Kategory Laporan')
{{-- title halaman web --}}

@section('content')
{{-- content adalah isi halaman dalam file admin.blade.php --}}

<a href="{{ route('admin.report.create') }}" class="btn btn-primary mb-3">Tambah Data</a>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Data Kategori Laporan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Laporan</th>
                                            <th>Pelapor</th>
                                            <th>Kategori Laporan</th>
                                            <th>Judul Laporan</th>
                                            <th>Bukti Laporan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reports as $report)
                                        {{-- loop data dari variabel report --}}
                                        
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $report->code }}</td>
                                            <td>{{ $report->resident->user->name }}</td>
                                            <td>{{ $report->reportCategory->name }}</td>
                                            <td>{{ $report->title }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $report->image) }}" alt="image"
                                                    style="width: 100px"> 
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.report.edit', $report->id) }}" class="btn btn-warning">Edit</a>

                                                <a href="{{ route('admin.report.show', $report->id) }}" class="btn btn-info">Show</a>

                                                <form action="{{ route('admin.report.destroy', $report->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



@endsection