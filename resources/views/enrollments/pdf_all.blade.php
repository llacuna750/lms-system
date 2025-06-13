<!DOCTYPE html>
<html>

<head>
    <title>All Enrollments PDF</title>
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
    <h2>All Enrollments</h2>
    <table>
        <thead>
            <tr>
                <th>Student</th>
                <th>Course</th>
                <th>Subject</th>
                <th>Enrolled On</th>
            </tr>
        </thead>
        <tbody>
            @foreach($enrollments as $enrollment)
            <tr>
                <td>{{ $enrollment->student_name }}</td>
                <td>{{ $enrollment->course->name }}</td>
                <td>{{ $enrollment->subject->name }}</td>
                <td>{{ $enrollment->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>