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
                            <form action="{{ route('barang.search') }}" method="GET">
                                @csrf
                                @method('GET')
                                <div class="d-flex justify-content-start">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <input type="text"
                                                    class="mb-3 mt-3 form-control @error('search') is-invalid @enderror"
                                                    name="search" value="" placeholder="Cari barang">

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
                                        <a href="{{ route('barang.create') }}"
                                            class="btn btn-md btn-success mb-3 btn-sm">Tambah
                                            barang</a>
                                    </div>
                                </div>
                            </form>
                            {{-- <!-- <a href="{{ route('barang.create.bulk') }}" class="btn btn-md btn-success mb-3 btn-sm">Import Dari Excel</a> --> --}}
                            <div class="table-responsive">
                                <table class="table table-stripped table-hover">
                                    <thead>
                                        <tr style="color:#F37A29;">
                                            <th class="text-center" scope="col">No.</th>
                                            <th class="text-center" scope="col">Gambar Barang</th>
                                            <th class="text-center" scope="col">Nama Barang</th>
                                            <th class="text-center" scope="col">Merk Barang</th>
                                            <th class="text-center" scope="col">Tipe Barang</th>
                                            <th class="text-center" scope="col">Harga Barang</th>
                                            <th class="text-center" scope="col">Kategori</th>
                                            {{-- <th class="text-center" scope="col">Spesifikasi</th> --}}
                                            <th class="text-center" scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($no = 1)
                                        @forelse ($barang as $row)
                                            <tr>
                                                <td class="text-center">{{ $no++ }}</td>
                                                <td class="text-center">
                                                    <a href="{{ asset('storage/' . $row->image) }}"
                                                        class="without-caption image-link">
                                                        <img src="{{ asset('storage/' . $row->image) }}" class="rounded"
                                                            width="40" style="border-radius: 50%">
                                                    </a>
                                                </td>
                                                <td class="text-center">{{ $row->nama_barang }}</td>
                                                <td class="text-center">{{ $row->nama_merk }}</td>
                                                <td class="text-center">{{ $row->tipe_barang }}</td>
                                                <td class="text-center">Rp @convert($row->harga_barang)</td>
                                                <td class="text-center">{{ $row->nama_kategori }}</td>
                                                {{-- <td class="text-center">{{ $row->spesifikasi }}</td> --}}
                                                <td class="text-center">
                                                    <form onsubmit="return confirm('Apakah Anda Yakin?');"
                                                        action="{{ route('barang.destroy', $row->id) }}" method="POST">
                                                        <a href="{{ route('barang.edit', $row->id) }}"
                                                            class="btn btn-sm btn-primary">Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Data barang belum Tersedia.
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
