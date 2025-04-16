@extends('layouts.master')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title">
                    <h2 class="text-2xl font-semibold text-gray-800">Edit Program Studi {{$programStudi->name}}</h2>
                </div>
            </div>
            <!-- end col -->
        </div>
        <div class="card-style mb-30">
            <form method="POST" action="{{ route('programStudi.update', $programStudi->id) }}">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="input-style-1">
                            <label>ID</label>
                            <input name="id" type="text" placeholder="Nama Jenis Surat"
                                   value="{{ old('id', $programStudi->id) }}" readonly/>
                        </div>
                    </div>
                    <div class="col-6">
                    <div class="input-style-1">
                            <label>Name</label>
                            <input name="name" type="text" placeholder="Nama Jenis Surat"
                                   value="{{ old('name', $programStudi->name) }}" required/>
                        </div>
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
