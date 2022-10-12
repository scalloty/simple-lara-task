<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="//unpkg.com/alpinejs" defer></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.css"/>
        <title>Product Catalog</title>
        <style>
            .dropdown-menu .nav-item a { color: #000 !important; }
            .dropdown-toggle:after { content: none; }
            .dropdown-menu .dropdown-menu { margin-left: 0; margin-right: 0; }
            .dropdown-menu li { position: relative }
            .nav-item .submenu { display: none; position: absolute; left: 100%; top: -7px; }
            .dropdown-menu>li:hover { background-color: #f1f1f1; }
            .dropdown-menu>li:hover>.submenu { display: block; }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-md">
                <a class="navbar-brand" href="/"><i class="fa-solid fa-house"></i> SPC</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Products</a>
                        </li>

                        {{-- Dynamic Menu --}}
                        <ul class="navbar-nav">
                            @each('submenu', $menulist, 'menu', 'empty')
                        </ul>

                    </ul>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/menu"><i class="fa-solid fa-gear"></i> Manage menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/logout"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="/register"><i class="fa-solid fa-user-plus"></i> Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>

        </nav>

        <div class="container-md mt-5">
            @yield('content')
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
        <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"
        ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.js"></script>

        <script>
            $(function () {
                $('.tags').tagsInput({'defaultText':'','width':'500px'});
            });
        </script>
        <script type="text/javascript">
            let dropdowns = document.querySelectorAll('.dropdown-toggle')
            dropdowns.forEach((dd)=> {
                dd.addEventListener('click', function (e) {
                    var el = this.nextElementSibling
                    el.style.display = el.style.display==='block'?'none':'block'
                })
            })
        </script>
        @if (session()->has('message'))
            <div class="row">
                <div 
                    class="alert alert-primary fixed-bottom col-md-4 col-md-offset-4" 
                    role="alert" 
                    x-data="{show: true}" 
                    x-init="setTimeout(()=>show=false,3000)" 
                    x-show="show">
                    {{session('message')}}
                </div>
            </div>
        @endif
    </body>
</html>