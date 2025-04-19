<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Management</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">Member Management</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                @if(auth()->user() && auth()->user()->isAdmin())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('members.index') }}">All Members</a>
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="{{ route('members.create') }}">Add New</a>--}}
{{--                    </li>--}}
                @endif
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        👤 {{ auth()->user()->name ?? 'User' }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="dropdown-item p-0 m-0">
                                @csrf
                                <button type="submit" class="btn btn-link dropdown-item">🔓 Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>

<main class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @yield('content')
</main>

<!-- Bootstrap JS Bundle (for dropdowns, modals etc.) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
