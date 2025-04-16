@extends('layouts.master')

@section('content')
   <!-- ========== title-wrapper start ========== -->
   <div class="title-wrapper pt-30">
      <div class="row align-items-center">
        <div class="title">
          <h2 class="text-2xl font-semibold text-gray-800">Data Detail Surat</h2>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
   </div>
   <!-- ========== title-wrapper end ========== -->

   <div class="card-style mb-30">
   <form method="POST" action="{{ route('surat.update', $detailSurat->id) }}">
   @csrf
   @method('PUT')
      <div class="select-style-1">
        <label>Jenis Surat</label>
        <div class="select-position">
          <select name="jenis_surat_id" class="text-capitalize" required>
            @foreach($jenisSurat as $jenis)
                <option value="{{ $jenis->id }}"
                    {{ $jenis->id == $detailSurat->surat->jenisSurat->id ? 'selected' : '' }}>
                    {{ $jenis->name }}
                </option>
            @endforeach
          </select>
        </div>


        <div class="input-style-1">
          <label>NRP</label>
          <input type="text" name="nrp" value="{{ $detailSurat->nrp }}" readonly />
        </div>

        <div class="input-style-1">
          <label>Nama</label>
          <input type="text" name="name" value="{{ $detailSurat->name }}" readonly />
        </div>

        <div class="input-style-1">
          <label>Alamat</label>
          <input type="text" name="alamat" value="{{ old('alamat', $detailSurat->alamat) }}"/>
        </div>

        <div class="input-style-1">
          <label>Semester</label>
          <input type="text" name="semester" value="{{ old('semester', $detailSurat->semester) }}" />
        </div>

        <div class="input-style-1">
          <label>Keperluan</label>
          <input type="text" name="keperluan" value="{{ old('keperluan', $detailSurat->keperluan) }}" />
        </div>

        <div class="input-style-1">
          <label>Kode MK</label>
          <input type="text" name="kode_mata_kuliah" value="{{ old('kode_mata_kuliah',$detailSurat->kode_mata_kuliah) }}" />
        </div>

        <div class="input-style-1">
          <label>Mata Kuliah</label>
          <input type="text" name="mata_kuliah" value="{{ old('mata_kuliah',$detailSurat->mata_kuliah) }}"/>
        </div>

        <div class="input-style-1">
          <label>Tujuan Topik</label>
          <input type="text" name="tujuan_topik" value="{{ old('tujuan_topik',$detailSurat->tujuan_topik) }}"/>
        </div>
        <button class="btn btn-primary">
            {{ __('Save') }}
          </button>
        </div>
      </form>
   </div>

@endsection