<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom background and centering the form */
        body {
            background-color: #f7fafc;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        /* Form container style */
        .form-container {
            background-color: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        /* Title style */
        h2 {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

        /* Input field style */
        .input-field {
            width: 100%;
            padding: 12px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            margin-bottom: 15px;
            transition: all 0.3s ease-in-out;
        }

        .input-field:focus {
            outline: none;
            border-color: #4c51bf;
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
            transition: opacity 0.3s ease;
        }

        .submit-button:hover {
            opacity: 0.85;
        }

        /* Additional text styling for the link */
        .login-link {
            text-align: center;
            font-size: 14px;
            color: #555;
        }

        .login-link a {
            color: #4c51bf;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Login</h2>
        @if (session('status'))
        <div class="bg-green-500 text-white p-3 rounded mb-4">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <label for="email" class="block text-gray-700 font-semibold mb-1">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required class="input-field" />
            </div>
            <div>
                <label for="password" class="block text-gray-700 font-semibold mb-1">Password</label>
                <input id="password" type="password" name="password" placeholder="Enter your password" required class="input-field" />
            </div>

            <button type="submit" class="submit-button">Login</button>
        </form>
        <p class="login-link mt-4">Belum punya akun? 
            <a href="{{ route('register') }}">Register</a>
        </p>
    </div>

</body>
</html>
