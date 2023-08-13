    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">holOShop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- For Admin Only -->
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('manage/product') ? 'active' : '' }}"
                                href="{{ url('/manage/product') }}">Manage Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('manage/category') ? 'active' : '' }}"
                                href="{{ url('/manage/category') }}">Manage Product Category</a>
                        </li>


                    <li class="nav-item">
                        <a class="nav-link  {{ Request::is('/') ? 'active' : '' }}"
                            href="{{ url('/') }}">Products</a>
                    </li>

                </ul>
                <ul class="navbar-nav ">
                <li class="nav-item dropdown me-2">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                    </a>
                    <!-- if user already login -->
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ url('/logout') }}">Logout</a></li>
                    </ul>
                </li>
                </ul>
            </div>
        </div>
    </nav>

