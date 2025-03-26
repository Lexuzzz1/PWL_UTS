<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Center the form vertically and horizontally */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f9fafb;
            font-family: 'Arial', sans-serif;
        }

        /* Form container style */
        .form-container {
            background-color: white;
            padding: 32px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        /* Title style */
        h2 {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Input field style */
        .input-field {
            width: 100%;
            padding: 12px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            margin-bottom: 15px;
            background-color: #f9fafb;
            transition: all 0.3s ease;
        }

        .input-field:focus {
            border-color: #4c51bf;
            outline: none;
            background-color: #ffffff;
            box-shadow: 0 0 5px rgba(76, 81, 191, 0.6);
        }

        /* Button style */
        .submit-button {
            background-color: #4c51bf;
            color: white;
            padding: 14px;
            border-radius: 8px;
            width: 100%;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-button:hover {
            background-color: #434190;
        }

        /* Additional text styling for the link */
        .login-link {
            text-align: center;
            font-size: 14px;
            color: #555;
            margin-top: 15px;
        }

        .login-link a {
            color: #4c51bf;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        /* Radio button styling */
        .radio-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: normal;
            color: #555;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Register</h2>
        <form method="POST" action="{{ route('registerStore') }}">
            @csrf
            <div>
                <label for="name" class="block text-gray-700 font-semibold mb-1">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Enter your name" required class="input-field" />
            </div>
            <div>
                <label for="email" class="block text-gray-700 font-semibold mb-1">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required class="input-field" />
            </div>
            <div>
    <label for="program_studi" class="block text-gray-700 font-semibold mb-1">Program Studi</label>
    <select id="program_studi" name="program_studi" class="w-full border-2 border-gray-300 rounded-lg p-2 mb-4 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
        @foreach ($programStudi as $program)
            <option value="{{ $program->id }}" {{ old('program_studi') == $program->id ? 'selected' : '' }}>
                {{ $program->nama }}
            </option>
        @endforeach
    </select>
</div>

<div>
    <label for="role" class="block text-gray-700 font-semibold mb-1">Role</label>
    <select id="role" name="role_id" class="w-full border-2 border-gray-300 rounded-lg p-2 mb-4 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
        @foreach ($roles as $role)
            <option value="{{ $role->id }}" {{ old('role') == $role->id ? 'selected' : '' }}>
                {{ $role->role_name }}
            </option>
        @endforeach
    </select>
</div>


            <div>
                <label for="password" class="block text-gray-700 font-semibold mb-1">Password</label>
                <input id="password" type="password" name="password" placeholder="Enter your password" required class="input-field" />
            </div>
            <div>
                <label for="password_confirmation" class="block text-gray-700 font-semibold mb-1">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm your password" required class="input-field" />
            </div>

            <button type="submit" class="submit-button">Register</button>
        </form>

        <p class="login-link">Sudah punya akun? 
            <a href="{{ route('login') }}">Login</a>
        </p>
    </div>

</body>
</html>
