@extends('layouts.master')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title">
                    <h2 class="text-2xl font-semibold text-gray-800">Create User</h2>
                </div>
            </div>
            <!-- end col -->
        </div>
        <div class="card-style mb-30">
            <form method="POST" action="{{ route('user.store') }}">
                @csrf
                <div class="input-style-1">
                    <x-input-label for="name" :value="__('Name')"/>
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                                  required autofocus autocomplete="name" placeholder="Full Name"/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="input-style-1">
                            <label>NRP</label>
                            <input name="nrp" type="text" placeholder="NRP" required/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-style-1">
                            <x-input-label for="email" :value="__('Email')"/>
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                          :value="old('email')" required autocomplete="username"
                                          placeholder="email@ex.com"/>
                            <x-input-error :messages="$errors->get('email')" class="mt-2"/>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="input-style-1">
                            <x-input-label for="password" :value="__('Password')"/>

                            <x-text-input id="password" class="block mt-1 w-full"
                                          type="password"
                                          name="password"
                                          required autocomplete="new-password"/>

                            <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="select-style-1">
                            <label>Program Studi</label>
                            <div class="select-position">
                                <select name="programStudi" class="text-capitalize"  required>
                                    <option value="">Select Program Studi</option>
                                    @foreach($programStudi as $program)
                                        <option class="text-capitalize"
                                                value="{{ $program->id }}">{{ $program->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="input-style-1">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')"/>

                            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                          type="password"
                                          name="password_confirmation" required autocomplete="new-password"/>

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="select-style-1">
                            <label>Role</label>
                            <div class="select-position">
                                <select name="role" class="text-capitalize"  required>
                                    <option class="text-capitalize" value="">Select role</option>
                                    @foreach($roles as $role)
                                        <option class="text-capitalize"
                                                value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </form>
        </div>
    </div>
    <!-- end row -->

    <!-- ========== title-wrapper end ========== -->

@endsection
