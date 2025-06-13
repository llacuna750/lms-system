<!DOCTYPE html>
<html>

<head>
    <title>Enrollment Details</title>
</head>

<body>
    <h2>Enrollment Info</h2>
    <p><strong>Student:</strong> {{ $enrollment->student_name }}</p>
    <p><strong>Course:</strong> {{ $enrollment->course->name }}</p>
    <p><strong>Subject:</strong> {{ $enrollment->subject->name }}</p>
    <p><strong>Enrolled At:</strong> {{ $enrollment->created_at->format('Y-m-d') }}</p>
</body>

</html>