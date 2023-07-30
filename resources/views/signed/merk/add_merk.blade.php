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
                            <form action="{{ route('merk.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="font-weight-bold">Nama merk</label>
                                    <input type="text"
                                        class="mb-3 mt-3 form-control @error('nama_merk') is-invalid @enderror"
                                        name="nama_merk" value="{{ old('nama_merk') }}" placeholder="Masukkan Nama merk">

                                    <!-- error message untuk title -->
                                    @error('nama_merk')
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
