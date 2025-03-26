<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TU Dashboard</title>

    <!-- Tailwind CSS Link (optional, if using CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Additional Styling -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
        }
        .sidebar ul li a {
            transition: all 0.3s ease-in-out;
        }
        .sidebar ul li a:hover {
            color: #4b82c6;
        }
    </style>
</head>
<body class="bg-gray-100">
        <!-- Main Content -->
        <div class="flex-1 p-8">
            <!-- Header -->
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Dashboard</h2>
                <a href="{{ route('register') }}" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Registrasi User</a>
            </div>

            <!-- Table for Users -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <table class="min-w-full table-auto border-collapse">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2 text-left">ID</th>
                            <th class="border px-4 py-2 text-left">Nama</th>
                            <th class="border px-4 py-2 text-left">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr class="hover:bg-gray-100">
                                <td class="border px-4 py-2">{{ $user->id }}</td>
                                <td class="border px-4 py-2">{{ $user->name }}</td>
                                <td class="border px-4 py-2">{{ $user->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</body>
</html>
