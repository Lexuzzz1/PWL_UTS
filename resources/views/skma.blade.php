@extends('dashboard') {{-- atau layout yang kamu gunakan --}}

@section('main')
<div class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow-md mt-6">
    <h2 class="text-2xl font-bold mb-4 text-center">Pengajuan Surat Keterangan Mahasiswa Aktif</h2>

    @if (session('success'))
        <div class="mb-4 p-3 bg-green-200 text-green-800 rounded">{{ session('success') }}</div>
    @endif

    <form method="POST" action="">
        @csrf
        <div class="mb-4">
            <label class="font-semibold">NRP</label>
            <input type="text" name="nrp" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Nama</label>
            <input type="text" name="nama" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Alamat</label>
            <textarea name="alamat" rows="3" class="w-full p-2 border rounded" required></textarea>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Semester</label>
            <select name="semester" class="w-full p-2 border rounded" required>
                @for ($i = 1; $i <= 8; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Keperluan</label>
            <input type="text" name="keperluan" class="w-full p-2 border rounded" required>
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700">
            Ajukan Surat
        </button>
    </form>
</div>
@endsection