<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | User Management System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="welcome-body">
<div class="welcome-container">
    <div class="welcome-header">
        <div class="login-logo">
            👥
        </div>
        <h1 class="welcome-title">Welcome to User Management</h1>
        <p class="welcome-subtitle">
            Streamline your user administration with our comprehensive management platform.
            Add, edit, and organize user information with ease and efficiency.
        </p>
    </div>

    <div class="welcome-actions">
        <a href="/home" class="btn btn-primary">
            <span>🚀</span>
            Get Started
        </a>
    </div>

    <div class="welcome-features" style="margin-top: 40px; text-align: left;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 24px; color: #64748b; font-size: 14px;">
            <div style="display: flex; align-items: center; gap: 12px;">
                <span style="color: #3b82f6; font-size: 18px;">✨</span>
                <span>Modern Interface</span>
            </div>
            <div style="display: flex; align-items: center; gap: 12px;">
                <span style="color: #22c55e; font-size: 18px;">🔒</span>
                <span>Secure Management</span>
            </div>
            <div style="display: flex; align-items: center; gap: 12px;">
                <span style="color: #f59e0b; font-size: 18px;">⚡</span>
                <span>Fast Performance</span>
            </div>
        </div>
    </div>
</div>

<div class="welcome-footer">
    &copy; {{ date('Y') }} User Management System. All rights reserved.
</div>
</body>
</html>
