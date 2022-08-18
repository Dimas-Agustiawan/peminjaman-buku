@extends('mahasiswa')
@section('edit')
<div class="modal modal-open" id="modal_edit">
    <div class="modal-box">
        @foreach ($edit_mahasiswa as $edit)
            <form action="/update-mahasiswa/{{$edit->nim}}" method="post">
                @csrf
                <h3 class="font-bold text-lg">Ubah Data Mahasiswa</h3>
                @if (count($errors) > 0)
                    <div id="error">
                        @foreach ($errors->all() as $error)
                            <ul>
                                <li class="text-error">{{ $error }}</li>
                            </ul>
                        @endforeach
                    </div>
                @endif
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">NIM</span>
                    </label>
                    <input type="text" name="nim" value="{{$edit->nim}}" placeholder="masukkan nim" class="input input-bordered w-full max-w-xs" />
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Nama</span>
                    </label>
                    <input type="text" name="nama" value="{{$edit->nama}}" placeholder="masukkan nama mahasiswa" class="input input-bordered w-full max-w-xs" />
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">No. Telp</span>
                    </label>
                    <input type="text" name="telp" value="{{$edit->telp}}" placeholder="masukkan no. telp" class="input input-bordered w-full max-w-xs" />
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Alamat</span>
                    </label>
                    <textarea class="textarea textarea-bordered" name="alamat" placeholder="tuliskan alamat peminjam">{{$edit->alamat}}</textarea>
                </div>
                <div class="modal-action">
                    <a href="/mahasiswa">
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