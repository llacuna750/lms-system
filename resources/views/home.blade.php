<!-- 12th add home.blade.php & HomeController updated the: partials.nav -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Dashboard</h2>

    {{-- Role-Based Welcome --}}
    @if(Auth::user()->role === 'admin')
        <div class="alert alert-info">Welcome, Admin! You can manage all courses, subjects, and users.</div>
    @elseif(Auth::user()->role === 'teacher')
        <div class="alert alert-warning">Welcome, Teacher! You can view assigned courses and student enrollments.</div>
    @else
        <div class="alert alert-success">Welcome, Student! View your enrolled courses here.</div>
    @endif

    {{-- Summary Cards --}}
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Total Courses</h5>
                    <p class="card-text fs-3">{{ $courseCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Total Subjects</h5>
                    <p class="card-text fs-3">{{ $subjectCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <h5 class="card-title">Total Enrollments</h5>
                    <p class="card-text fs-3">{{ $enrollmentCount }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Chart.js Bar Chart --}}
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Enrollments Per Course</h5>
            <canvas id="enrollmentChart" height="100"></canvas>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const chartCanvas = document.getElementById('enrollmentChart');
    const ctx = chartCanvas.getContext('2d');

    // Get data from HTML data attributes
    const chartLabels = JSON.parse(chartCanvas.dataset.labels);
    const chartData = JSON.parse(chartCanvas.dataset.chartData);

    const enrollmentChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: chartLabels,
            datasets: [{
                label: 'Enrollments',
                data: chartData,
                backgroundColor: 'rgba(54, 162, 235, 0.7)'
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection