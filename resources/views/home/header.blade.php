<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                        <img src="assets/images/logo.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="index.html" class="active">Home</a></li>
                        <li><a href="explore.html">Explore</a></li>
                        <li><a href="details.html">Item Details</a></li>
                        <li><a href="author.html">Author</a></li>
                        <li><a href="create.html">Create Yours</a></li>
                        @if (Route::has('login'))
                {{-- <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10"> --}}
                    @auth
                       <x-app-layout>
                       </x-app-layout>
                        @else
                    <li><a href="{{route('login')}}">Login</a></li>
                        
                        @if (Route::has('register'))
                        <li><a href="{{route('register')}}">Register</a></li>
                        @endif
                    @endauth
                </div>
            @endif

                        {{-- <li><a href="{{url('login')}}">Login</a></li>
                        <li><a href="{{url('register')}}">Register</a></li> --}}
                    </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>