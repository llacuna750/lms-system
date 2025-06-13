<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">LMS</a>
        <ul class="navbar-nav ml-auto">
            @auth
            <li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>
            @if(Auth::user()->role === 'admin')
            <li class="nav-item"><a class="nav-link" href="/subjects">Subjects</a></li>
            <li class="nav-item"><a class="nav-link" href="/courses">Courses</a></li>
            @endif
            <li class="nav-item"><a class="nav-link" href="/enrollments">Enrollments</a></li>
            <li class="nav-item">
                <form method="POST" action="/logout">@csrf <button class="btn btn-link nav-link">Logout</button></form>
            </li>
            @endauth
        </ul>
    </div>
</nav>