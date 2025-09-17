<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
</head>
<body>
    <h1>Home Page</h1>

    
    <h2>User Information</h2>
    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Second Name</th>
                <th>Phone</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->second_name }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="no-data">No user available</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="/add-user">➕ Add User</a>
</body>
</html>
