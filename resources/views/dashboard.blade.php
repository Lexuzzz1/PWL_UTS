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
            @if ($role == 'admin')
                <div class="tables-wrapper">
                </div>
            @elseif($role == 'kaprodi' || $role == 'tu' || $role == 'mahasiswa')
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
                                                    @if($role == 'kaprodi' || $role == 'tu')
                                                        <th class="lead-info">
                                                            <h6>Nama Mahasiswa</h6>
                                                        </th>
                                                    @endif
                                                    <th class="lead-info">
                                                        <h6>Jenis Surat</h6>
                                                    </th>
                                                    <th class="lead-email">
                                                        <h6>Status</h6>
                                                    </th>
                                                    @if($role == 'tu')
                                                    <th class="lead-email">
                                                        <h6>Tanggal Persetujuan</h6>
                                                    </th>
                                                    @else
                                                    <th class="lead-email">
                                                        <h6>Tanggal Pengajuan</h6>
                                                    </th>
                                                    @endif
                                                </tr>
                                                <!-- end table row-->
                                            </thead>
                                            <tbody>
                                                @foreach($surats as $surat)
                                                    <tr>
                                                        @if($role == 'kaprodi' || $role == 'tu')
                                                            <td class="lead-info">
                                                                <p class="text-capitalize">{{ $surat->user->name }}</p>
                                                            </td>
                                                        @endif
                                                        <td class="min-width">
                                                            <p class="text-capitalize">{{ $surat->jenisSurat->name }}</p>
                                                        </td>
                                                        <td class="min-width">
                                                        @if($role == 'tu')
                                                            @if ($surat->status == '1')
                                                                <p>Menunggu Surat</p>
                                                            @elseif ($surat->status == '3')
                                                                <p>Surat Dikirm</p>
                                                            @endif
                                                        @else
                                                            @if ($surat->status == '2')
                                                            <p>Pending</p>
                                                            @elseif ($surat->status == '0')
                                                            <p>Ditolak</p>
                                                            @elseif ($surat->status == '1')
                                                            <p>Disetujui</p>
                                                            @elseif ($surat->status == '3')
                                                            <p>Surat Dikirm</p>
                                                            @endif
                                                        @endif
                                                        </td>
                                                        @if($role == 'tu')
                                                        <td class="min-width">
                                                            <p>{{ $surat->updated_at->format('d M Y H:i')}}</p>
                                                        </td>
                                                        @else
                                                        <td class="min-width">
                                                            <p>{{ $surat->created_at->format('d M Y H:i')}}</p>
                                                        </td>
                                                        @endif
                                                        @if($surat->status == '2' && $role == 'mahasiswa')
                                                        <td>
                                                        <div class="action">
                                                            <a class="text-success" href="{{ route('surat.edit', $surat->id) }}">
                                                                <svg width="25" height="25" viewBox="0 0 24 24" fill="none"
                                                                     xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                          d="M19.3028 3.7801C18.4241 2.90142 16.9995 2.90142 16.1208 3.7801L14.3498 5.5511C14.3442 5.55633 14.3387 5.56166 14.3333 5.5671C14.3279 5.57253 14.3225 5.57803 14.3173 5.58359L5.83373 14.0672C5.57259 14.3283 5.37974 14.6497 5.27221 15.003L4.05205 19.0121C3.9714 19.2771 4.04336 19.565 4.23922 19.7608C4.43508 19.9567 4.72294 20.0287 4.98792 19.948L8.99703 18.7279C9.35035 18.6203 9.67176 18.4275 9.93291 18.1663L20.22 7.87928C21.0986 7.0006 21.0986 5.57598 20.22 4.6973L19.3028 3.7801ZM14.8639 7.15833L6.89439 15.1278C6.80735 15.2149 6.74306 15.322 6.70722 15.4398L5.8965 18.1036L8.56029 17.2928C8.67806 17.257 8.7852 17.1927 8.87225 17.1057L16.8417 9.13619L14.8639 7.15833ZM17.9024 8.07553L19.1593 6.81862C19.4522 6.52572 19.4522 6.05085 19.1593 5.75796L18.2421 4.84076C17.9492 4.54787 17.4743 4.54787 17.1814 4.84076L15.9245 6.09767L17.9024 8.07553Z"
                                                                          fill="#343C54"/>
                                                                </svg>
                                                            </a>
                                                        </div>
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
                </div>
            @endif
        <!-- end col -->
    </div>
    <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->
@endsection