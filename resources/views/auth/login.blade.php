<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">🔐 Login</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Oops!</strong> Invalid login credentials.<br>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="mobile" class="form-label">📱 Mobile Number</label>
                            <input type="text" name="mobile" id="mobile" class="form-control" required
                                   value="{{ old('mobile') }}">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">🔑 Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>

                    <p class="mt-3 text-center">
                        Don’t have an account? <a href="{{ route('register') }}">Register here</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
