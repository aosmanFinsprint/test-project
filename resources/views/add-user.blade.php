<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add User</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h1>Add User Page</h1>
    <a href="/home">🏠 Home</a>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf 

        <label for="first_name">First Name:</label><br>
        <input type="text" id="first_name" name="first_name" required><br><br>

        <label for="second_name">Second Name:</label><br>
        <input type="text" id="second_name" name="second_name" required><br><br>

        <label for="phone">Phone:</label><br>
        <input type="text" id="phone" name="phone" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <button type="submit">➕ Save User</button>
    </form>
</body>
</html>
