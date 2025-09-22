<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User | User Management System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<!-- Navigation -->
<nav class="navbar">
    <div class="container">
        <div class="navbar-content">
            <a href="/home" class="navbar-brand">
                <div class="logo">👥</div>
                User Management
            </a>
            <div class="navbar-actions">
                <a href="/home" class="btn btn-secondary btn-sm">
                    <span>🏠</span>
                    Back to Home
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="form-page">
    <div class="container">
        <div class="form-container">
            <div class="form-header">
                <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #22c55e, #16a34a); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white; font-size: 18px;">
                    ➕
                </div>
                <h1>Add New User</h1>
            </div>

            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="form-body">
                    <div class="form-group">
                        <label for="first_name" class="form-label">First Name *</label>
                        <input
                            type="text"
                            id="first_name"
                            name="first_name"
                            class="form-input"
                            required
                            placeholder="Enter first name"
                            value="{{ old('first_name') }}"
                        >
                        @error('first_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="second_name" class="form-label">Last Name *</label>
                        <input
                            type="text"
                            id="second_name"
                            name="second_name"
                            class="form-input"
                            required
                            placeholder="Enter last name"
                            value="{{ old('second_name') }}"
                        >
                        @error('second_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone" class="form-label">Phone Number *</label>
                        <input
                            type="text"
                            id="phone"
                            name="phone"
                            class="form-input"
                            required
                            placeholder="Enter phone number"
                            value="{{ old('phone') }}"
                        >
                        @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email Address *</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-input"
                            required
                            placeholder="Enter email address"
                            value="{{ old('email') }}"
                        >
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-footer">
                    <a href="/home" class="btn btn-secondary">
                        <span>❌</span>
                        Cancel
                    </a>
                    <div class="form-actions">
                        <button type="reset" class="btn btn-secondary">
                            <span>🔄</span>
                            Reset
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <span>💾</span>
                            Save User
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Auto-format phone number
    document.getElementById('phone').addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length > 0) {
            if (value.length <= 3) {
                value = `(${value}`;
            } else if (value.length <= 6) {
                value = `(${value.slice(0, 3)}) ${value.slice(3)}`;
            } else {
                value = `(${value.slice(0, 3)}) ${value.slice(3, 6)}-${value.slice(6, 10)}`;
            }
        }
        e.target.value = value;
    });

    // Form validation feedback
    document.querySelector('form').addEventListener('submit', function(e) {
        const requiredFields = ['first_name', 'second_name', 'phone', 'email'];
        let isValid = true;

        requiredFields.forEach(field => {
            const input = document.getElementById(field);
            if (!input.value.trim()) {
                input.style.borderColor = '#ef4444';
                isValid = false;
            } else {
                input.style.borderColor = '#d1d5db';
            }
        });

        if (!isValid) {
            e.preventDefault();
            alert('Please fill in all required fields.');
        }
    });
</script>
</body>
</html>
