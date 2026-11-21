@extends('layouts.app')
@section('judul', 'Detail Alat')

@section('konten')
  <h2>{{ $alat->nama }}</h2>
  <ul>
    <li>Kode: {{ $alat->kode }}</li>
    <li>Stok: {{ $alat->stok }}</li>
    <li>Kondisi: {{ $alat->kondisi }}</li>
    <li>Lokasi: {{ $alat->lokasi ?? '-' }}</li>
  </ul>
  <a href="{{ route('alat.index') }}">Kembali</a>
@endsection