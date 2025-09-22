<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User | User Management System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<!-- Navigation -->
<nav class="navbar">
    <div class="navbar-content">
        <a href="{{ route('users.index') }}" class="navbar-logo">👥 User Management</a>
        <div class="navbar-links">
            <a href="{{ route('users.index') }}">🏠 Back to Home</a>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="form-container">
    <h2>Edit User</h2>

    <!-- Validation Errors -->
    @if ($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Edit Form -->
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="first_name">First Name</label>
        <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $user->first_name) }}" required>

        <label for="second_name">Second Name</label>
        <input type="text" name="second_name" id="second_name" value="{{ old('second_name', $user->second_name) }}" required>

        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}" required>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>

        <button type="submit" class="btn btn-primary">💾 Save Changes</button>
        <a href="{{ route('users.index') }}" class="btn btn-danger">❌ Cancel</a>
    </form>
</div>
</body>
</html>
