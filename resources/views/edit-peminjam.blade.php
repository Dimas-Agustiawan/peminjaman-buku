@extends('peminjam')
@section('edit')
<div class="modal modal-open" id="modal_edit">
    <div class="modal-box">
        @foreach ($edit_peminjam as $edit)
            <form action="/update-peminjam/{{$edit->id}}" method="post">
                @csrf
                <h3 class="font-bold text-lg">Ubah Data Peminjam</h3>
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
                    <input type="text" name="nim" value="{{$edit->mahasiswa_nim}}" placeholder="masukkan nim" class="input input-bordered w-full max-w-xs" />
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">ID Buku</span>
                    </label>
                    <input type="text" name="id_buku" value="{{$edit->buku_id}}" placeholder="masukkan id buku" class="input input-bordered w-full max-w-xs" />
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Tgl. Pengembalian</span>
                    </label>
                    <input type="date" name="tgl_kembali" value="{{$edit->tgl_kembali}}" placeholder="masukkan tgl. kembali" class="input input-bordered w-full max-w-xs" min="<?php echo date('Y-m-d', strtotime("+0 days")); ?>" />
                </div>
                
                <div class="modal-action">
                    <a href="/peminjam">
                        <button type="button" class="btn btn-outline">Batal</button>
                    </a>
                    <button type="submit" class="btn btn-outline btn-primary">Simpan</button>
                </div>
            </form>
        @endforeach
    </div>
</div>
@endsection