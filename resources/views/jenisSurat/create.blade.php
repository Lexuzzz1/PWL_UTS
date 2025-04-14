@extends('layouts.master')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title">
                    <h2 class="text-2xl font-semibold text-gray-800">Create Jenis Surat</h2>
                </div>
            </div>
            <!-- end col -->
        </div>
        <div class="card-style mb-30">
            <form method="POST" action="{{ route('jenisSurat.store') }}">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="input-style-1">
                            <label>Name</label>
                            <input name="name" type="text" placeholder="Nama Jenis Surat" required/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="select-style-1">
                            <label>Status</label>
                            <div class="select-position">
                                <select name="status" class="text-capitalize" required>
                                    <option value="">Select Status Jenis Surat</option>
                                    <option class="text-capitalize" value="1">Aktif</option>
                                    <option class="text-capitalize" value="0">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-style-1">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" placeholder="Deskripsi Jenis Surat" rows="5" maxlength="255"></textarea>
                    </div>
                </div>

                <button class="btn btn-primary">
                    {{ __('Create') }}
                </button>
            </form>
        </div>
    </div>
    <!-- end row -->
    <!-- ========== title-wrapper end ========== -->
@endsection
