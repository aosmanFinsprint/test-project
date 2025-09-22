<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | User Management System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="login-body">
<div class="login-container">
    <div class="login-header">
        <div class="login-logo">
            👥
        </div>
        <h1 class="login-title">Welcome Back</h1>
        <p class="login-subtitle">Sign in to your User Management account</p>
    </div>

    <form class="login-form" action="{{ route('login') ?? '#' }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email" class="form-label">Email Address</label>
            <input
                type="email"
                id="email"
                name="email"
                class="form-input"
                required
                placeholder="Enter your email address"
                value="{{ old('email') }}"
                autocomplete="email"
            >
            @error('email')
            <div class="alert alert-danger" style="margin-top: 8px;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                class="form-input"
                required
                placeholder="Enter your password"
                autocomplete="current-password"
            >
            @error('password')
            <div class="alert alert-danger" style="margin-top: 8px;">{{ $message }}</div>
            @enderror
        </div>

        <div class="login-options" style="display: flex; justify-content: space-between; align-items: center; margin: 16px 0;">
            <label style="display: flex; align-items: center; gap: 8px; font-size: 14px; color: #64748b; cursor: pointer;">
                <input type="checkbox" name="remember" style="margin: 0;">
                Remember me
            </label>
            <a href="#" style="font-size: 14px; color: #3b82f6; text-decoration: none;">
                Forgot password?
            </a>
        </div>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <button type="submit" class="btn btn-primary" style="width: 100%; margin-bottom: 20px;">
            <a href="/welcome" class="btn btn-secondary" style="width: 100%; text-align: center;">
            <span>🚀</span>
            Sign In
        </button>

        <div style="text-align: center; margin: 20px 0;">
            <span style="color: #94a3b8; font-size: 14px;">or</span>
        </div>

        <a href="/welcome" class="btn btn-secondary" style="width: 100%; text-align: center;">
            <span>👁️</span>
            Continue as Guest
        </a>
    </form>

    <div class="login-footer">
        <p>Don't have an account?
            <a href="javascript:void(0)" id="openRegister">Create one here</a>
        </p>
        <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #e2e8f0; font-size: 12px; color: #94a3b8;">
            <p>&copy; {{ date('Y') }} User Management System. All rights reserved.</p>
            <div style="margin-top: 8px;">
                <a href="javascript:void(0)" id="openPrivacy" style="color: #94a3b8; margin-right: 16px;">Privacy Policy</a>
                <a href="javascript:void(0)" id="openTerms" style="color: #94a3b8; margin-right: 16px;">Terms of Service</a>
                <a href="javascript:void(0)" id="openSupport" style="color: #94a3b8;">Support</a>
            </div>
        </div>

    </div>

    <!-- Register Modal -->
    <div id="registerModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close" id="closeRegister">&times;</span>
            <h2>Create Account</h2>

            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <label for="first_name">First Name</label>
                <input type="text" name="first_name" required>

                <label for="second_name">Second Name</label>
                <input type="text" name="second_name" required>

                <label for="phone">Phone</label>
                <input type="text" name="phone" required>

                <label for="email">Email</label>
                <input type="email" name="email" required>

                <label for="password">Password</label>
                <input type="password" name="password" required>

                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>

</div>

<!-- Privacy Policy Modal -->
<div id="privacyModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" id="closePrivacy">&times;</span>
        <h2>Privacy Policy</h2>
        <p>Your data is kept secure. We do not share personal information with third parties except as required by law.</p>
    </div>
</div>

<!-- Terms of Service Modal -->
<div id="termsModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" id="closeTerms">&times;</span>
        <h2>Terms of Service</h2>
        <p>By using this system, you agree to abide by all applicable rules, laws, and usage guidelines.</p>
    </div>
</div>

<!-- Support Modal -->
<div id="supportModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" id="closeSupport">&times;</span>
        <h2>Support</h2>
        <p>Need help? Contact us at <a href="mailto:support@usermanagement.com">support@usermanagement.com</a></p>
    </div>
</div>


<script>
    // Enhanced form validation
    document.querySelector('form').addEventListener('submit', function(e) {
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        let isValid = true;

        // Email validation
        if (!email) {
            showFieldError('email', 'Email is required');
            isValid = false;
        } else if (!/\S+@\S+\.\S+/.test(email)) {
            showFieldError('email', 'Please enter a valid email address');
            isValid = false;
        } else {
            clearFieldError('email');
        }

        // Password validation
        if (!password) {
            showFieldError('password', 'Password is required');
            isValid = false;
        } else if (password.length < 6) {
            showFieldError('password', 'Password must be at least 6 characters');
            isValid = false;
        } else {
            clearFieldError('password');
        }

        if (!isValid) {
            e.preventDefault();
        }
    });

    function showFieldError(fieldId, message) {
        const field = document.getElementById(fieldId);
        field.style.borderColor = '#ef4444';

        // Remove existing error message
        clearFieldError(fieldId);

        // Add new error message
        const errorDiv = document.createElement('div');
        errorDiv.className = 'alert alert-danger';
        errorDiv.style.marginTop = '8px';
        errorDiv.textContent = message;
        errorDiv.setAttribute('data-error-for', fieldId);

        field.parentNode.appendChild(errorDiv);
    }

    function clearFieldError(fieldId) {
        const field = document.getElementById(fieldId);
        field.style.borderColor = '#d1d5db';

        const existingError = field.parentNode.querySelector('[data-error-for="' + fieldId + '"]');
        if (existingError) {
            existingError.remove();
        }
    }

    // Real-time validation feedback
    document.getElementById('email').addEventListener('blur', function() {
        if (this.value && !/\S+@\S+\.\S+/.test(this.value)) {
            showFieldError('email', 'Please enter a valid email address');
        } else {
            clearFieldError('email');
        }
    });

    document.getElementById('password').addEventListener('input', function() {
        if (this.value.length > 0 && this.value.length < 6) {
            this.style.borderColor = '#f59e0b';
        } else {
            this.style.borderColor = '#d1d5db';
        }
    });

    // Show/hide password toggle (optional enhancement)
    const passwordField = document.getElementById('password');
    const toggleButton = document.createElement('button');
    toggleButton.type = 'button';
    toggleButton.innerHTML = '👁️';
    toggleButton.style.cssText = `
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #64748b;
            cursor: pointer;
            font-size: 14px;
        `;

    passwordField.parentNode.style.position = 'relative';
    passwordField.style.paddingRight = '40px';
    passwordField.parentNode.appendChild(toggleButton);

    toggleButton.addEventListener('click', function() {
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            toggleButton.innerHTML = '🙈';
        } else {
            passwordField.type = 'password';
            toggleButton.innerHTML = '👁️';
        }
    });
</script>
<script>
    const openBtn = document.getElementById("openRegister");
    const closeBtn = document.getElementById("closeRegister");
    const modal = document.getElementById("registerModal");

    openBtn.addEventListener("click", () => {
        modal.style.display = "flex";
    });

    closeBtn.addEventListener("click", () => {
        modal.style.display = "none";
    });

    window.addEventListener("click", (e) => {
        if (e.target === modal) {
            modal.style.display = "none";
        }
    });
</script>
<script>
    // Utility to open/close modals
    function setupModal(openId, modalId, closeId) {
        const openBtn = document.getElementById(openId);
        const closeBtn = document.getElementById(closeId);
        const modal = document.getElementById(modalId);

        openBtn.addEventListener("click", () => {
            modal.style.display = "flex";
        });

        closeBtn.addEventListener("click", () => {
            modal.style.display = "none";
        });

        window.addEventListener("click", (e) => {
            if (e.target === modal) {
                modal.style.display = "none";
            }
        });
    }

    // Setup modals
    setupModal("openPrivacy", "privacyModal", "closePrivacy");
    setupModal("openTerms", "termsModal", "closeTerms");
    setupModal("openSupport", "supportModal", "closeSupport");
</script>

</body>
</html>
