<style>
    /* Global Styles */
    body {
        font-family: 'Inter', sans-serif;
        background-color: #f9fafb;
        color: #333;
        margin: 0;
        padding: 0;
    }

    h2 {
        font-size: 2.5rem;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 1.5rem;
    }

    p {
        font-size: 1rem;
        color: #6b7280;
        margin-bottom: 1.5rem;
    }

    /* Form Styles */
    #suratForm {
        background-color: #fff;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        max-width: 900px;
        margin: 0 auto;
        padding: 2rem;
    }

    /* Form Elements */
    label {
        font-weight: 500;
        color: #4b5563;
    }

    select, input {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #d1d5db;
        border-radius: 0.375rem;
        font-size: 1rem;
        color: #4b5563;
        outline: none;
        transition: all 0.3s ease-in-out;
    }

    select:focus, input:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.3);
    }

    /* Button Styles */
    button {
        width: 100%;
        padding: 0.75rem;
        background-color: #3b82f6;
        color: #fff;
        border-radius: 0.375rem;
        font-size: 1.125rem;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #2563eb;
    }

    /* Space Between Form Fields */
    .space-y-3 > * + * {
        margin-top: 1rem;
    }

    .space-y-4 > * + * {
        margin-top: 1.5rem;
    }

    /* Responsive Design */
    @media (max-width: 640px) {
        #suratForm {
            padding: 1.5rem;
        }
        h2 {
            font-size: 2rem;
        }
    }
</style>

<h2 class="text-2xl font-semibold text-gray-800 mb-4">Mahasiswa Dashboard</h2>
<p class="text-gray-600 mb-4">Selamat datang Mahasiswa</p>

<form id="suratForm" class="space-y-4 max-w-3xl mx-auto p-6">
    <!-- Dropdown for Jenis Surat -->
    <div>
        <label for="jenis_surat" class="block text-gray-700 font-semibold mb-2">Pilih Jenis Surat</label>
        <select id="jenis_surat" name="jenis_surat" class="w-full border border-gray-300 rounded-md p-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" onchange="showForm()">
            <option value="">Pilih Jenis Surat</option>
            @foreach($jenisSurat as $surat)
                <option value="{{ $surat->id }}">{{ $surat->jenis_surat }}</option>
            @endforeach
        </select>
    </div>

    <!-- Dynamic Form Fields -->
    <div id="form-fields"></div>

    <!-- Submit Button -->
    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition ease-in-out duration-300">
        Submit
    </button>
</form>


<script>
    function showForm() {
        var jenisSurat = document.getElementById('jenis_surat').value;
        var formFields = document.getElementById('form-fields');

        // Clear existing fields
        formFields.innerHTML = '';

        if (jenisSurat == "") return;

        // Based on the selected jenis surat, render different form fields
        if (jenisSurat == 1) { // Surat Keterangan Mahasiswa Aktif
            formFields.innerHTML = `
                <div class="space-y-3">
                    <div>
                        <label for="nrp" class="block text-gray-700 font-semibold mb-1">NRP</label>
                        <input type="text" id="nrp" name="nrp" class="w-full border border-gray-300 rounded-md p-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label for="nama" class="block text-gray-700 font-semibold mb-1">Nama</label>
                        <input type="text" id="nama" name="nama" class="w-full border border-gray-300 rounded-md p-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label for="alamat" class="block text-gray-700 font-semibold mb-1">Alamat</label>
                        <input type="text" id="alamat" name="alamat" class="w-full border border-gray-300 rounded-md p-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label for="semester" class="block text-gray-700 font-semibold mb-1">Semester</label>
                        <input type="text" id="semester" name="semester" class="w-full border border-gray-300 rounded-md p-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label for="keperluan" class="block text-gray-700 font-semibold mb-1">Keperluan Pengajuan</label>
                        <input type="text" id="keperluan" name="keperluan" class="w-full border border-gray-300 rounded-md p-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                </div>
            `;
        } else if (jenisSurat == 2) { // Surat Pengantar Tugas Mata Kuliah
            formFields.innerHTML = `
                <div class="space-y-3">
                    <div>
                        <label for="nrp" class="block text-gray-700 font-semibold mb-1">NRP</label>
                        <input type="text" id="nrp" name="nrp" class="w-full border border-gray-300 rounded-md p-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label for="nama" class="block text-gray-700 font-semibold mb-1">Nama</label>
                        <input type="text" id="nama" name="nama" class="w-full border border-gray-300 rounded-md p-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label for="kode_mata_kuliah" class="block text-gray-700 font-semibold mb-1">Kode Mata Kuliah</label>
                        <input type="text" id="kode_mata_kuliah" name="kode_mata_kuliah" class="w-full border border-gray-300 rounded-md p-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label for="mata_kuliah" class="block text-gray-700 font-semibold mb-1">Nama Mata Kuliah</label>
                        <input type="text" id="mata_kuliah" name="mata_kuliah" class="w-full border border-gray-300 rounded-md p-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label for="tujuan" class="block text-gray-700 font-semibold mb-1">Tujuan</label>
                        <input type="text" id="tujuan" name="tujuan" class="w-full border border-gray-300 rounded-md p-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label for="topik" class="block text-gray-700 font-semibold mb-1">Topik</label>
                        <input id="topik" name="topik" class="w-full border border-gray-300 rounded-md p-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                </div>
            `;
        } else if (jenisSurat == 3) { // Surat Pengantar Tugas Mata Kuliah
            formFields.innerHTML = `
                <div class="space-y-3">
                    <div>
                        <label for="nrp" class="block text-gray-700 font-semibold mb-1">NRP</label>
                        <input type="text" id="nrp" name="nrp" class="w-full border border-gray-300 rounded-md p-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label for="nama" class="block text-gray-700 font-semibold mb-1">Nama</label>
                        <input type="text" id="nama" name="nama" class="w-full border border-gray-300 rounded-md p-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                </div>
            `;
        } else if (jenisSurat == 4) { // Surat Pengantar Tugas Mata Kuliah
            formFields.innerHTML = `
                <div class="space-y-3">
                    <div>
                        <label for="nrp" class="block text-gray-700 font-semibold mb-1">NRP</label>
                        <input type="text" id="nrp" name="nrp" class="w-full border border-gray-300 rounded-md p-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label for="nama" class="block text-gray-700 font-semibold mb-1">Nama</label>
                        <input type="text" id="nama" name="nama" class="w-full border border-gray-300 rounded-md p-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label for="keperluan" class="block text-gray-700 font-semibold mb-1">Keperluan</label>
                        <input type="text" id="keperluan" name="keperluan" class="w-full border border-gray-300 rounded-md p-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                </div>
            `;
        }
    }
</script>
