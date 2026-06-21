<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In - Arctic Travels</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #fff;
            overflow-x: hidden;
        }
        
        .auth-wrapper {
            min-height: 100vh;
        }

        /* Sisi Kiri (Sidebar Biru) */
        .auth-sidebar {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 4rem 3rem;
            min-height: 100vh;
        }

        .brand-logo {
            font-size: 1.75rem;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .brand-logo span {
            color: #93c5fd;
        }

        /* Input Minimalis Garis Bawah */
        .form-underlined {
            border: none;
            border-bottom: 1px solid #ced4da;
            border-radius: 0;
            padding: 0.75rem 0;
            background-color: transparent;
            font-size: 1rem;
        }

        .form-underlined:focus {
            box-shadow: none;
            background-color: transparent;
            border-bottom-color: #1d4ed8;
        }

        /* Tombol Sign In */
        .btn-custom {
            background-color: #3b82f6;
            color: white;
            border-radius: 8px;
            padding: 0.6rem 2rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .btn-custom:hover {
            background-color: #1d4ed8;
            color: white;
        }

        /* Dots Indicator */
        .dot {
            height: 8px;
            width: 8px;
            background-color: rgba(255, 255, 255, 0.4);
            border-radius: 50%;
            display: inline-block;
            margin-right: 6px;
        }

        .dot.active {
            background-color: white;
            width: 24px;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<div class="container-fluid p-0">
    <div class="row g-0 auth-wrapper">
        
        <div class="col-lg-6 auth-sidebar d-none d-lg-flex">
            <div class="brand-logo">
                <span>A</span>rctic Travels
            </div>
            
            <div class="text-center my-auto px-4">
                <img src="https://images.unsplash.com/photo-1581291518633-83b4ebd1d83e?auto=format&fit=crop&w=500&q=80" alt="Illustration" class="img-fluid mb-5 rounded" style="max-height: 260px; object-fit: cover;">
                <h2 class="fw-bold mb-3" style="font-size: 2.25rem;">Welcome!</h2>
                <p class="text-white-50 px-4" style="font-size: 1.05rem; line-height: 1.6;">
                    Plan your ideal ski trip from home with the help of professionals. Experience luxury skiing holidays worldwide.
                </p>
            </div>

            <div class="ps-3">
                <span class="dot active"></span>
                <span class="dot"></span>
                <span class="dot"></span>
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