@extends('layouts.app')
@section('judul', 'Daftar Alat')

@section('konten')
  <a href="{{ route('alat.create') }}" class="btn btn-success mb-3">+ Tambah Alat</a>

  <form method="GET" action="{{ route('alat.index') }}" class="d-flex gap-2 mb-3">
    <input name="q" value="{{ $q }}" class="form-control" placeholder="Cari nama alat">
    <button type="submit" class="btn btn-primary">Cari</button>
    <a href="{{ route('alat.index') }}" class="btn btn-outline-secondary">Reset</a>
  </form>

  @if (session('sukses'))
    <div class="alert alert-success">{{ session('sukses') }}</div>
  @endif

  <table class="table table-bordered table-striped">
    <tr>
      <th>Kode</th><th>Nama</th><th>Stok</th><th>Kondisi</th><th>Lokasi</th><th>Aksi</th>
    </tr>
    @forelse ($alat as $a)
      <tr>
        <td>{{ $a->kode }}</td>
        <td>{{ $a->nama }}</td>
        <td @if ($a->stok == 0) class="text-danger fw-bold" @endif>{{ $a->stok }}</td>
        <td>{{ $a->kondisi }}</td>
        <td>{{ $a->lokasi }}</td>
        <td>
          <a href="{{ route('alat.show', $a) }}" class="btn btn-sm btn-info">Detail</a>
          <a href="{{ route('alat.edit', $a) }}" class="btn btn-sm btn-warning">Ubah</a>
          <form method="POST" action="{{ route('alat.destroy', $a) }}"
                class="d-inline"
                onsubmit="return confirm('Hapus alat ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
          </form>
        </td>
      </tr>
    @empty
      <tr><td colspan="6">Belum ada data alat.</td></tr>
    @endforelse
  </table>

  {{ $alat->links() }}
@endsection