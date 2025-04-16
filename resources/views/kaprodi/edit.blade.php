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
      <div class="select-style-1">
        <label>Jenis Surat</label>
        <div class="select-position">
          <select name="jenis_surat_id" class="text-capitalize" required readonly>
            <option value="{{ $detailSurat->surat->jenisSurat->id }}" selected>{{ $detailSurat->surat->jenisSurat->name }}</option>
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
          <input type="text" name="alamat" value="{{ $detailSurat->alamat }}" readonly/>
        </div>

        <div class="input-style-1">
          <label>Semester</label>
          <input type="text" name="semester" value="{{ $detailSurat->semester }}" readonly />
        </div>

        <div class="input-style-1">
          <label>Keperluan</label>
          <input type="text" name="keperluan" value="{{ $detailSurat->keperluan }}" readonly />
        </div>

        <div class="input-style-1">
          <label>Kode MK</label>
          <input type="text" name="kode_mata_kuliah" value="{{ $detailSurat->kode_mata_kuliah }}" readonly />
        </div>

        <div class="input-style-1">
          <label>Mata Kuliah</label>
          <input type="text" name="mata_kuliah" value="{{ $detailSurat->mata_kuliah }}" readonly/>
        </div>

        <div class="input-style-1">
          <label>Tujuan Topik</label>
          <input type="text" name="tujuan_topik" value="{{ $detailSurat->tujuan_topik }}" readonly/>
        </div>

        <form method="POST" action="{{ route('kaprodi.update', $detailSurat->surat_id) }}">
          @csrf
          @method('PUT')
          <div class="select-style-1">
            <label>Status</label>
            <div class="select-position">
               <select name="status" class="text-capitalize" required>
                  <option value="" selected>Select Status Pengajuan</option>
                  <option value="2" {{ $detailSurat->surat->status == '2' ? 'selected' : '' }}>Pending</option>
                  <option value="1" {{ $detailSurat->surat->status == '1' ? 'selected' : '' }}>Setujui</option>
                  <option value="0" {{ $detailSurat->surat->status == '0' ? 'selected' : '' }}>Tolak</option>
               </select>
            </div>
          </div>
          <button class="btn btn-primary">
            {{ __('Save') }}
          </button>
        </form>
      </div>
   </div>

@endsection