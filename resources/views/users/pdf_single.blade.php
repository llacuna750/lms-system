<!DOCTYPE html>
<html>

<head>
    <title>User Report</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 14px;
        }

        .section {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <h2>User Report: {{ $user->name }}</h2>

    <div class="section">
        <strong>Email:</strong> {{ $user->email }}
    </div>

    <div class="section">
        <strong>Role:</strong> {{ ucfirst($user->role) }}
    </div>

    <div class="section">
        <strong>Registered on:</strong> {{ $user->created_at->format('F j, Y') }}
    </div>
</body>

</html>