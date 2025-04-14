@extends('layouts.master')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="title">
                @if ($role == 'admin')
                    <h2 class="text-2xl font-semibold text-gray-800">Selamat Datang Admin!</h2>
                @elseif($role == 'surat')
                    <h2 class="text-2xl font-semibold text-gray-800">Maaf, Anda sudah tidak memiliki akses ke halaman ini</h2>
                @else
                    <h2 class="text-2xl font-semibold text-gray-800">Selamat Datang {{ $user->name }}!</h2>
                @endif
            </div>
                @if($role == 'mahasiswa')
                <div class="tables-wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-style mb-30">
                                <div class="header-left d-flex align-items-center justify-content-between mb-4">
                                    <div class="header">
                                        <h2 class="text-capitalize">Status Pengajuan Surat</h6>
                                    </div>
                                </div>
                                <div class="table-wrapper table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="lead-info">
                                                <h6>Jenis Surat</h6>
                                            </th>
                                            <th class="lead-email">
                                                <h6>Status</h6>
                                            </th>
                                        </tr>
                                        <!-- end table row-->
                                        </thead>
                                        <tbody>
                                        @foreach($surats as $surat)
                                            <tr>
                                                <td class="min-width">
                                                        <p class="text-capitalize">{{ $surat->jenisSurat->name }}</p>
                                                </td>
                                                <td class="min-width">
                                                    @if ($surat->status == '2')
                                                        <p>Pending</p>
                                                    @elseif ($surat->status == '0')
                                                        <p>Ditolak</p>
                                                    @elseif ($surat->status == '1') 
                                                        <p>Disetujui</p>
                                                    @endif
                                                </td>
                                            </tr>
                                            <!-- end table row -->
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <!-- end table -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->
@endsection
