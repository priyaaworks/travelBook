<!DOCTYPE html>
<html>
<head>
    <title>Saved Users</title>
    <style>
        table {
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
        }
        .success {
            color: green;
        }
        .no-data {
            color: red;
        }
    </style>
</head>
<body>

    <h2>List of Users</h2>

    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </tr>

        @forelse($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="3" class="no-data">No users found.</td>
        </tr>
        @endforelse
    </table>

    <br>
    <a href="{{ route('user.form') }}">Add Another User</a>

</body>
</html>
