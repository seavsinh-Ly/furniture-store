<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Store Management System</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    @stack('styles')
</head>

<body class="bg-success bg-gradient text-dark">

    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand fw-bold text-success fs-4" href="{{ route('furniture.index') }}">Store Admin</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <div class="navbar-nav align-items-lg-center gap-2 mt-3 mt-lg-0">
                    
                    <a class="nav-link {{ request()->routeIs('furniture.index') ? 'text-success fw-bold' : 'text-secondary fw-medium' }} px-3" href="{{ route('furniture.index') }}">
                        Furniture List
                    </a>
                    
                    <a class="nav-link {{ request()->routeIs('categories.*') ? 'text-success fw-bold' : 'text-secondary fw-medium' }} px-3" href="{{ route('categories.index') }}">
                        Categories
                    </a>
                    
                    <div class="ms-lg-2 d-flex gap-2">
                        <a class="btn btn-success btn-sm px-3 py-2 fw-medium rounded-2 text-white" href="{{ route('furniture.create') }}">
                            + Furniture
                        </a>
                        <a class="btn btn-outline-success btn-sm px-3 py-2 fw-medium rounded-2" href="{{ route('categories.create') }}">
                            + Category
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </nav>

    @if(session('success'))
        <div class="container mt-4">
            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert" style="max-width: 1100px; margin: 0 auto;">
                <svg class="me-2 flex-shrink-0" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
                <div>
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <main class="py-2">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    @stack('scripts')
</body>

</html>