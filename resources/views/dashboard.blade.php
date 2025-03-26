<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Selamat datang di Dashboard</h1>

        <!-- Menampilkan Role Pengguna -->
        <p class="text-lg mb-6">
            Role Anda: 
            @if(Auth::user()->role)  <!-- Mengecek apakah role ada -->
                {{ Auth::user()->role->role_name }}
            @else
                Role tidak ditemukan
            @endif
        </p>

        <!-- Cek Role Pengguna dan tampilkan konten yang berbeda -->
        @if(Auth::user()->role && Auth::user()->role->role_name == 'Admin')
            @include('dashboard.admin')  <!-- Menampilkan dashboard admin -->
        @elseif(Auth::user()->role && Auth::user()->role->role_name == 'Kaprodi')
            @include('dashboard.kaprodi')  <!-- Menampilkan dashboard kaprodi -->
        @elseif(Auth::user()->role && Auth::user()->role->role_name == 'Mahasiswa')
            @include('dashboard.mahasiswa')  <!-- Menampilkan dashboard mahasiswa -->
        @elseif(Auth::user()->role && Auth::user()->role->role_name == 'TU')
            @include('dashboard.tu')  <!-- Menampilkan dashboard TU -->
        @else
            <p>Role tidak dikenali. Harap hubungi administrator.</p>
        @endif
    </div>
</x-app-layout>
