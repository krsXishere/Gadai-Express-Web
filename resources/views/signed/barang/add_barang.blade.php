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
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow rounded">
                        <div class="card-body">
                            <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="font-weight-bold">Nama Barang</label>
                                    <input type="text"
                                        class="mb-3 mt-3 form-control @error('nama_barang') is-invalid @enderror"
                                        name="nama_barang" value="{{ old('nama_barang') }}"
                                        placeholder="Masukkan Nama Barang">

                                    <!-- error message untuk title -->
                                    @error('nama_barang')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Tipe Barang</label>
                                    <input type="text"
                                        class="mb-3 mt-3 form-control @error('tipe_barang') is-invalid @enderror"
                                        name="tipe_barang" value="{{ old('tipe_barang') }}"
                                        placeholder="Masukkan Tipe Barang">

                                    <!-- error message untuk title -->
                                    @error('tipe_barang')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Harga Barang</label>
                                    <input type="number"
                                        class="mb-3 mt-3 form-control @error('harga_barang') is-invalid @enderror"
                                        name="harga_barang" value="{{ old('harga_barang') }}"
                                        placeholder="Masukkan Harga Barang">

                                    <!-- error message untuk title -->
                                    @error('harga_barang')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Spesifikasi</label>
                                    <textarea id="spesifikasi" class="mb-3 mt-3 form-control @error('spesifikasi') is-invalid @enderror" name="spesifikasi"
                                        value="{{ old('spesifikasi') }}" placeholder="Masukkan Spesifikasi Barang"></textarea>

                                    <!-- error message untuk title -->
                                    @error('spesifikasi')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Pilih Kategori</label>
                                    <div class="col">
                                        <select name="kategori_id" class="form-select form-select mb-3 mt-3">
                                            @foreach ($kategori as $row)
                                                <option value="{{ $row->id }}">
                                                    {{ $row->nama_kategori }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Pilih Merk</label>
                                    <div class="col">
                                        <select name="merk_id" class="form-select form-select mb-3 mt-3">
                                            @foreach ($merk as $row)
                                                <option value="{{ $row->id }}">
                                                    {{ $row->nama_merk }} - {{ $row->nama_kategori }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Gambar Barang</label>
                                    <input type="file"
                                        class="mb-3 mt-3 form-control @error('image') is-invalid @enderror" name="image"
                                        value="">

                                    <!-- error message untuk title -->
                                    @error('image')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button onclick="replaceLineBreaks()" type="submit"
                                        class="btn btn-md btn-success btn-sm">Simpan</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function replaceLineBreaks() {
                var str = document.getElementById("spesifikasi").value;
                var res = str.replace(/(?:\r|\r\n)/g, '\n');
                document.getElementById("demo").innerHTML = res;
                snippet.log(res);
            }
        </script>
    </section>
@endsection
