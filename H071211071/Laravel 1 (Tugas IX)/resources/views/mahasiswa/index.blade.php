@extends('layout.template')
<!-- START DATA -->
@section('konten')
<div class="my-3 p-3 bg-body rounded shadow-sm">


        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
          <a href='{{ url('mahasiswa/create') }}' class="btn btn-primary">+ Tambah Data</a>
        </div>
  
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-3">NIM</th>
                    <th class="col-md-4">Nama</th>
                    <th class="col-md-2">Jurusan</th>
                    <th class="col-md-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor = $data->firstItem() ?>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $nomor }}</td>
                    <td>{{ $item->nim }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jurusan }}</td>
                    <td>
                        <a href='{{ url('mahasiswa/'.$item->nim.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                        <form onsubmit="return confirm('Yakin Ingin Menghapus Data?')" class='d-inline'action='{{ url('mahasiswa/'.$item->nim) }}' method='post' >
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php $nomor++ ?>    
                @endforeach
            </tbody>
        </table>
        {{ $data->links() }}
  </div>
  <!-- AKHIR DATA -->
@endsection
    