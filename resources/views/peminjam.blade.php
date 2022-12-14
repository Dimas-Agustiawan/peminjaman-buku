@extends('beranda')
@section('title')
    Peminjam
@endsection
@section('content')
<div class="container mx-auto">
    <div class="grid grid-cols-12">
        <div class="col-span-12 pt-3">
            <label for="my-modal" data-aos="fade-up" data-aos-duration="3000" data-aos-once="true" class="btn btn-outline btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-plus mr-1" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z"/>
                    <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                    <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                </svg>
                Tambah peminjam
            </label>
            <input type="checkbox" id="my-modal" class="modal-toggle" />
            <div class="modal">
                <div class="modal-box">
                    <form action="/pinjam-buku" method="post">
                        @csrf
                        <h3 class="font-bold text-lg">Tambah Data Peminjam Buku</h3>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">NIM</span>
                            </label>
                            <input type="text" name="nim" placeholder="masukkan nim" class="input input-bordered w-full max-w-xs @error('nim') input-error @enderror" />
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">ID Buku</span>
                            </label>
                            <input type="text" name="id_buku" placeholder="masukkan id buku" class="input input-bordered w-full max-w-xs @error('id_buku') input-error @enderror" />
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Tgl. Pinjam</span>
                            </label>
                            <input type="date" name="tgl_pinjam" value="" placeholder="masukkan tgl. pinjam" class="input input-bordered w-full max-w-xs @error('tgl_pinjam') input-error @enderror" min="<?php echo date('Y-m-d', strtotime("+0 days")); ?>" />
                        </div>
                        <div class="modal-action">
                            <label for="my-modal" class="btn btn-outline">Batal</label>
                            <button type="submit" class="btn btn-outline btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
            @if (count($errors) > 0)
                <div id="error" data-aos="fade-up" data-aos-duration="3000" data-aos-once="true">
                    @foreach ($errors->all() as $error)
                        <ul>
                            <li class="text-error">{{ $error }}</li>
                        </ul>
                    @endforeach
                </div>
            @endif
            <div class="btn-group py-3 flex justify-center" data-aos="fade-up" data-aos-duration="3000" data-aos-once="true">
                <button class="btn all {{($active == 'all') ? 'btn-active' : 'none'}}">All</button>
                <button class="btn pinjam {{($active == 'dipinjam') ? 'btn-active' : 'none'}}">Dipinjam</button>
            </div>
            <div class="pt-3" data-aos="fade-up" data-aos-duration="3000" data-aos-once="true">
                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Judul</th>
                            <th>Tgl. Pinjam</th>
                            <th>Tgl. Kembali</th>
                            <th>Denda</th>
                            <th>Edit</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_peminjam as $list)
                            <tr>
                                <td>{{$list->mahasiswa->nama}}</td>
                                <td>{{$list->buku->judul_buku}}</td>
                                <td>{{date("d M Y", strtotime($list->tgl_pinjam))}}</td>
                                <td>{{date("d M Y", strtotime($list->tgl_kembali))}}</td>
                                <td>{{$list->denda}}</td>
                                <td>
                                    <a href="/edit-peminjam/{{$list->id}}">
                                        <button class="btn btn-outline btn-success btn-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <button data-id="{{$list->id}}" class="btn btn-outline btn-error btn-sm delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> 
            </div>

            @yield('edit')

        </div>
    </div>

</div>
@endsection
@section('script')
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        });
    </script>
    @if (session()->has('success'))
        <script>
            $(document).ready( function () {
                swal("Good job!", "Data kamu telah disimpan!", "success");
            });
        </script>
    @endif
    <script>
        $('.delete').click(function(){
            let deleteid = $(this).attr('data-id');

            swal({
                title: 'Yakin ?',
                text: 'Kamu akan menghapus data peminjam dengan id '+deleteid+' ',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location = '/hapus-peminjam/'+deleteid+' '
                swal('Data berhasil dihapus', {
                icon: 'success',
                });
            } else {
                swal('Data tidak jadi dihapus');
            }
            });
        })
    </script>
    <script>
        $('.pinjam').click(function(){
            window.location = '/dipinjam'
        });

        $('.all').click(function(){
            window.location = '/peminjam'
        });
    </script>
@endsection