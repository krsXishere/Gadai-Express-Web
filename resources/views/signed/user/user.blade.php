@extends('template')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <section class="home-section">
        <title>{{ $title }}</title>
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <span class="text">Gadai Express Admin</span>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow rounded">
                        <div class="card-body">
                            <form action="{{ route('user.search') }}" method="GET">
                                @csrf
                                @method('GET')
                                <div class="d-flex justify-content-start">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <input type="text"
                                                    class="mb-3 mt-3 form-control @error('search') is-invalid @enderror"
                                                    name="search" value="" placeholder="Cari pengguna">

                                                <!-- error message untuk title -->
                                                @error('search')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col mt-3">
                                            <button type="submit" class="btn btn-primary">Cari</button>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end col mt-3">
                                        <a href="{{ route('user.create') }}"
                                            class="btn btn-md btn-success mb-3 btn-sm">Tambah
                                            pengguna</a>
                                    </div>
                                </div>
                            </form>
                            {{-- <!-- <a href="{{ route('user.create.bulk') }}" class="btn btn-md btn-success mb-3 btn-sm">Import Dari Excel</a> --> --}}
                            <div class="table-responsive">
                                <table class="table table-stripped table-hover">
                                    <thead>
                                        <tr style="color:#F37A29;">
                                            <th class="text-center" scope="col">No.</th>
                                            <th class="text-center" scope="col">Nama Pengguna</th>
                                            <th class="text-center" scope="col">Email</th>
                                            <th class="text-center" scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($no = 1)
                                        @forelse ($user as $row)
                                            <tr>
                                                <td class="text-center">{{ $no++ }}</td>
                                                <td class="text-center">{{ $row->name }}</td>
                                                <td class="text-center">{{ $row->email }}</td>
                                                <td class="text-center">
                                                    <form onsubmit="return confirm('Apakah Anda Yakin?');"
                                                        action="{{ route('user.destroy', $row->id) }}" method="POST">
                                                        <a href="{{ route('user.edit', $row->id) }}"
                                                            class="btn btn-sm btn-primary">Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Data user belum Tersedia.
                                            </div>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
