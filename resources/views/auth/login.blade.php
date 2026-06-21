<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In - Arctic Travels</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

<div class="container-fluid p-0">
    <div class="row g-0 auth-wrapper">
        
        <div class="col-lg-6 auth-sidebar d-none d-lg-flex">
            <div class="brand-logo">
                <span>A</span>rctic Travels
            </div>
            
            <div class="text-center my-auto px-4">
                <img src="https://images.unsplash.com/photo-1455156218388-5e61b526818b?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Illustration" class="img-fluid mb-5 rounded" style="max-height: 260px; object-fit: cover;">
                <h2 class="fw-bold mb-3" style="font-size: 2.25rem;">Welcome!</h2>
                <p class="text-white-50 px-4" style="font-size: 1.05rem; line-height: 1.6;">
                    Plan your ideal ski trip from home with the help of professionals. Experience luxury skiing holidays worldwide.
                </p>
            </div>

        </div>

        <div class="col-lg-6 d-flex align-items-center justify-content-center bg-white py-5">
            <div class="px-4 px-md-5" style="width: 100%; max-width: 480px;">
                
                <h1 class="fw-bold text-dark mb-2" style="font-size: 2.5rem; letter-spacing: -0.5px;">Log In</h1>
                <p class="text-muted mb-5">
                    Don't have an account? <a href="{{ route('register') }}" class="text-primary text-decoration-none fw-semibold">Create an account</a>
                </p>

                @if (session('status'))
                    <div class="alert alert-success mb-4" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-4">
                        <input id="email" type="email" name="email" 
                            class="form-control form-underlined @error('email') is-invalid @enderror" 
                            placeholder="Email Address" value="{{ old('email') }}" required autofocus autocomplete="username">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <input id="password" type="password" name="password" 
                            class="form-control form-underlined @error('password') is-invalid @enderror" 
                            placeholder="Password" required autocomplete="current-password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex align-items-center justify-content-between mb-5 mt-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                            <label class="form-check-label text-muted small" for="remember_me">
                                Remember password
                            </label>
                        </div>
                        @if (Route::has('password.request'))
                            <a class="text-muted small text-decoration-none" href="{{ route('password.request') }}">
                                Forgot your password?
                            </a>
                        @endif
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-custom py-25 text-center fs-5">
                            Sign In
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>

</body>
</html>