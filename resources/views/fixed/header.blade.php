

    <!-- mian-content -->
    <div class="main-banner" id="home">
        <!-- header -->
        <header class="header">
            <div class="container-fluid px-lg-5">
                <!-- nav -->
                <nav class="py-4">
                    <div id="logo">
                        <h1> <a href="{{ route("home") }}"><span class="fa fa-bold" aria-hidden="true"></span>ootie</a></h1>
                    </div>

                    <label for="drop" class="toggle">Menu</label>
                    <input type="checkbox" id="drop" />
                    <ul class="menu mt-2">
                        @if(session()->has("user"))
                            @if(session()->get("user")->name == 'admin')
                                <li><a href="{{ route('products.index') }}">Admin Panel</a></li>
                            @endif
                        @endif
                        <li><a href="{{ route("home") }}">Home</a></li>
                        <li><a href="{{ route("about") }}">About</a></li>
                        <li><a href="{{ route("contact") }}">Contact</a></li>
                        @if(!session()->has("user"))
                            <li><a href="{{ route("login") }}">Login</a></li>
                            <li><a href="{{ route("register") }}">Registration</a></li>
                        @else
                            <li><a href="{{ route("logout") }}">Logout</a></li>
                            <a class="btn btn-dark btn-sm ml-3" href="{{ route("coming-soon") }}">
                               <i class="fa fa-shopping-cart"></i> Cart
                               <span class="badge badge-light">0</span>
                            </a>
                        @endif

                    </ul>

                </nav>
                <!-- //nav -->
            </div>
        </header>
        <!-- //header -->
        <!--/banner-->
        <div class="banner-info">
            <p>Trending of the week</p>
            <h3 class="mb-4">Casual Shoes for Men</h3>
        </div>
        <!--// banner-inner -->

    </div>
    <!--//main-content-->
