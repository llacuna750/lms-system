<!DOCTYPE html>
<html>

<head>
    <title>All Courses PDF</title>
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
    <h2>All Courses</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Code</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
            <tr>
                <td>{{ $course->name }}</td>
                <td>{{ $course->code }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>