<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    
    <!-- Header -->
    <header class="bg-blue-700 text-white p-4 flex justify-between items-center shadow-md">
        <div class="text-xl font-bold">WELCOME</div>
        <div class="relative">
            <button id="profile-btn" class="flex items-center bg-white text-black p-2 rounded-lg shadow-md focus:outline-none">
                <img src="{{ asset('image/WhatsApp Image 2025-03-19 at 15.27.49_19d609e9.jpg') }}" alt="Profile" class="w-8 h-8 rounded-full mr-2">
                {{ $nrp ?? 'NRP' }} (S-1 Teknik Informatika)
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div id="dropdown-menu" class="hidden absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg overflow-hidden">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center w-full px-4 py-2 text-gray-700 hover:bg-gray-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7"/>
                    </svg>
                    Log Out
                </button>
            </form>
            </div>
        </div>
    </header>

    <div class="flex flex-1">

        <!-- Sidebar -->
        <aside class="bg-white w-64 p-4 shadow-md border-r border-gray-300">
            <nav class="space-y-2">
                <div class="relative">
                    <button id="home-btn" class="block p-2 w-full text-left text-gray-700 hover:bg-gray-200 rounded" style="padding-top: 20px;">Home</button>
                    <button id="pengajuan-btn" class="block p-2 w-full text-left text-gray-700 hover:bg-gray-200 rounded" style="padding-top: 20px;">Pengajuan</button>
                    <div id="pengajuan-dropdown" class="hidden absolute left-0 mt-1 w-48 bg-white shadow-md rounded-lg text-xs">
                        <a href="{{ route('mahasiswa.skma') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Surat Keterangan Mahasiswa Aktif</a>
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Surat Pengantar Tugas Mata Kuliah</a>
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Surat Keterangan Lulus</a>
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Surat Laporan Hasil Studi</a>
                    </div>
                </div>
            </nav>
        </aside>
        
        @yield('main')

        <!-- Main Content
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
        </main>   -->

        <script>
            document.getElementById('profile-btn').addEventListener('click', function () {
                document.getElementById('dropdown-menu').classList.toggle('hidden');
            });

            document.getElementById('pengajuan-btn').addEventListener('click', function () {
                document.getElementById('pengajuan-dropdown').classList.toggle('hidden');
            });

            document.getElementById('home-btn').addEventListener('click', function () {
                window.location.href = '/'; // ganti jika ada halaman khusus
            });

            const statusText = document.getElementById("status-text");
            const status = document.getElementById("status").innerText.trim().toLowerCase();

            if (status === "pending") {
                statusText.classList.add("bg-yellow-300", "text-yellow-900");
            } else if (status === "decline") {
                statusText.classList.add("bg-red-500", "text-white");
            } else if (status === "accept") {
                statusText.classList.add("bg-green-500", "text-white");
            }
        </script>

    </div>
</body>
</html>