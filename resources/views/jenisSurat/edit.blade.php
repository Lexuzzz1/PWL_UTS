@extends('layouts.master')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title">
                    <h2 class="text-2xl font-semibold text-gray-800">Edit Jenis Surat {{$jenisSurat->name}}</h2>
                </div>
            </div>
            <!-- end col -->
        </div>
        <div class="card-style mb-30">
            <form method="POST" action="{{ route('jenisSurat.update', $jenisSurat->id) }}">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="input-style-1">
                            <label>Name</label>
                            <input name="name" type="text" placeholder="Nama Jenis Surat"
                                   value="{{ old('name', $jenisSurat->name) }}" required/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="select-style-1">
                            <label>Status</label>
                            <div class="select-position">
                                <select name="status" class="text-capitalize" required>
                                    <option value="">Select Status Jenis Surat</option>
                                    <option value="1" {{ $jenisSurat->status == '1' ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ $jenisSurat->status == '0' ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-style-1">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" placeholder="Deskripsi Jenis Surat" rows="5"
                                  maxlength="255">{{ old('deskripsi', $jenisSurat->deskripsi) }}</textarea>
                    </div>
                </div>

                <button class="btn btn-primary">
                    {{ __('Save') }}
                </button>
            </form>
        </div>
    </div>
    <!-- end row -->
    <!-- ========== title-wrapper end ========== -->
@endsection
