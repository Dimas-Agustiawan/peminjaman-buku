@extends('list-buku')
@section('edit')
    <div class="modal modal-open" id="modal_edit">
        <div class="modal-box">
            @foreach ($edit_buku as $edit)
                <form action="/update-buku/{{$edit->id}}" method="post">
                    @csrf
                    <h3 class="font-bold text-lg">Ubah Data Buku Perpustakaan</h3>
                    @if (count($errors) > 0)
                        @foreach ($errors->all() as $error)
                            <ul>
                                <li class="text-error">{{ $error }}</li>
                            </ul>
                        @endforeach
                    @endif
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">ID Buku</span>
                        </label>
                        <input type="text" name="id_buku" value="{{$edit->id}}" placeholder="masukkan id buku" class="input input-bordered w-full max-w-xs" />
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Kategori Buku</span>
                        </label>
                        <div class="input-group">
                            <select class="select select-bordered w-full max-w-xs" name="kategori">
                                <option disabled selected>Kategori Buku</option>
                                <option {{($edit->kategori_buku == "Web Developer") ? "selected" : ""}}>Web Developer</option>
                                <option {{($edit->kategori_buku == "Mobile Developer") ? "selected" : ""}}>Mobile Developer</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Judul Buku</span>
                        </label>
                        <input type="text" name="judul_buku" value="{{$edit->judul_buku}}" placeholder="masukkan judul buku" class="input input-bordered w-full max-w-xs" />
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Pengarang Buku</span>
                        </label>
                        <input type="text" name="pengarang" value="{{$edit->pengarang}}" placeholder="masukkan pengarang" class="input input-bordered w-full max-w-xs" />
                    </div>
                    <div class="modal-action">
                        <a href="/buku">
                            <button type="button" class="btn btn-outline">Batal</button>
                        </a>
                        <button type="submit" class="btn btn-outline btn-primary">Simpan</button>
                    </div>
                </form>
            @endforeach
        </div>
    </div>
    <script>
        const error = document.getElementById('error');
        error.style.display = 'none';
    </script>
@endsection