<!DOCTYPE html>
<html>

<head>
    <title>All Subjects PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>

<body>
    <h2>All Subjects</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Code</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subjects as $subject)
            <tr>
                <td>{{ $subject->name }}</td>
                <td>{{ $subject->code }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>