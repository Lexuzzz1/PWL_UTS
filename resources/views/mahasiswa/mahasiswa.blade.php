@extends('dashboard')

@section('main')
    <!-- Main Content -->
        <main class="flex-1 p-6">
            <h2 class="text-2xl font-bold mb-4">Status Pengajuan</h2>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Surat Keterangan Mahasiswa Aktif</h3>
                <h3 id="status-text" class="text-xl font-semibold mb-4 px-3 py-1 rounded-lg w-fit">
                    Status: <span id="status">{{ $status ?? 'Pending' }}</span>
                </h3>                
                <div class="grid grid-cols-2 gap-y-2 text-gray-700">
                    <p><span class="font-bold">NRP:</span> {{ $nrp ?? '-' }}</p>
                    <p><span class="font-bold">Nama:</span> {{ $nama ?? '-' }}</p>
                    <p><span class="font-bold">Alamat:</span> {{ $alamat ?? '-' }}</p>
                    <p><span class="font-bold">Semester:</span> {{ $semester ?? '-' }}</p>
                    <p><span class="font-bold">Keperluan Pengajuan:</span> {{ $keperluan ?? '-' }}</p>
                </div>
                <p class="mt-4 text-sm text-gray-500">Tanggal Pengajuan: {{ $tanggal ?? now()->format('d F Y') }}</p>
            </div>
        </main>  
@endsection