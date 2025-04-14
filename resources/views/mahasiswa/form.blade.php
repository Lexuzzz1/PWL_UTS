@extends('layouts.master')

@section('content')
   <!-- ========== title-wrapper start ========== -->
   <div class="title-wrapper pt-30">
      <div class="row align-items-center">
        <div class="title">
          <h2 class="text-2xl font-semibold text-gray-800">Data Users</h2>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
   </div>
   <!-- ========== title-wrapper end ========== -->

   <div class="card-style mb-30">
      <form method="POST" action="{{ route('surat.store') }}">
        @csrf
        <div class="select-style-1">
          <label>Jenis Surat</label>
          <div class="select-position">
            <select name="jenis_surat_id" class="text-capitalize" required>
               <option value="">Select Jenis Surat</option>
               @foreach($jenisSurat as $jenis)
               <option class="text-capitalize" value="{{ $jenis->id }}">{{ $jenis->name }}</option>
            @endforeach
            </select>
          </div>


          <div class="input-style-1">
            <label>NRP</label>
            <input type="text" name="nrp" placeholder="NRP" value="{{ Auth::user()->nrp }}" readonly />
          </div>

          <div class="input-style-1">
            <label>Nama</label>
            <input type="text" name="name" placeholder="Nama" value="{{ Auth::user()->name }}" readonly />
          </div>

          <div class="input-style-1">
            <label>Alamat</label>
            <input type="text" name="alamat" placeholder="Alamat" maxlength="45" />
          </div>

          <div class="input-style-1">
            <label>Semester</label>
            <input type="text" name="semester" maxlength="1" placeholder="Angka Semester" />
          </div>

          <div class="input-style-1">
            <label>Keperluan</label>
            <input type="text" name="keperluan" placeholder="Keperluan Untuk Surat" maxlength="45" />
          </div>

          <div class="input-style-1">
            <label>Kode MK</label>
            <input type="text" name="kode_mata_kuliah" placeholder="Kode MK" maxlength="45" />
          </div>

          <div class="input-style-1">
            <label>Mata Kuliah</label>
            <input type="text" name="mata_kuliah" placeholder="Mata Kuliah" maxlength="45" />
          </div>

          <div class="input-style-1">
            <label>Tujuan Topik</label>
            <input type="text" name="tujuan_topik" placeholder="Tujuan Topik" maxlength="45" />
          </div>

          <button class="btn btn-primary">
            {{ __('Register') }}
          </button>
        </div>
      </form>
   </div>

@endsection