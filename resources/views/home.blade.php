<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users | User Management System</title>
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
                <a href="/welcome" class="btn btn-secondary btn-sm">
                    <span>🏠</span>
                    Welcome
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <div class="page-header-content">
            <div>
                <h1 class="page-title">User Directory</h1>
                <p class="page-subtitle">Manage and organize your user database</p>
            </div>
            <a href="/add-user" class="btn btn-primary">
                <span>➕</span>
                Add New User
            </a>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="main-content">
    <div class="container">
        <div class="data-table-container">
            <div class="table-header">
                <h2 class="table-title">All Users ({{ count($users) }})</h2>
                <div class="table-actions">
                    <button class="btn btn-secondary btn-sm" onclick="location.reload()">
                        <span>🔄</span>
                        Refresh
                    </button>
                </div>
            </div>

            @if(count($users) > 0)
                <table class="data-table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <div style="font-weight: 500;">{{ $user->first_name }} {{ $user->second_name }}</div>
                            </td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success btn-sm">
                                        <span>✏️</span>
                                        Edit
                                    </a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                          style="display: inline;"
                                          onsubmit="return confirm('Are you sure you want to delete {{ $user->first_name }} {{ $user->second_name }}? This action cannot be undone.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <span>🗑️</span>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="no-data">
                    <div style="font-size: 48px; margin-bottom: 16px;">👤</div>
                    <h3 style="margin-bottom: 8px; color: #64748b;">No users found</h3>
                    <p style="color: #94a3b8; margin-bottom: 24px;">Get started by adding your first user to the system</p>
                    <a href="/add-user" class="btn btn-primary">
                        <span>➕</span>
                        Add First User
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
</body>
</html>
