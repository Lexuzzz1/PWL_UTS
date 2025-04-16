@extends('layouts.master')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title">
                    <h2 class="text-2xl font-semibold text-gray-800">Create Program Studi</h2>
                </div>
            </div>
            <!-- end col -->
        </div>
        <div class="card-style mb-30">
            <form method="POST" action="{{ route('programStudi.store') }}">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="input-style-1">
                            <label>ID</label>
                            <input name="id" type="text" placeholder="Kode Program Studi" required/>
                        </div>
                    </div>
                    <div class="col-6">
                    <div class="input-style-1">
                            <label>Name</label>
                            <input maxlength='45' name="name" type="text" placeholder="Nama Program Studi" required/>
                        </div>
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
