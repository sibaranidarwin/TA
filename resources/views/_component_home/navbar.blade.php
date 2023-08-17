    <!-- ***** Header Area Start ***** -->
    <style>
        .hr {
            /*mengatur tinggi minimal garis*/
            min-height: 100%;
            /*mengatur tinggi maksimal garis*/
            max-height: 100vh;
            /*mengatur margin garis*/
            margin: 0;
        }
        
        .vertical {
            /*mengatur display pembungkus tag hr*/
            display: flex;
        }
        .navbar {
  overflow: hidden;
  background-color: #333;
  font-family: Arial, Helvetica, sans-serif;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: #333;
  text-align: center;
  padding: 10px 10px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  cursor: pointer;
  font-size: 16px;  
  border: none;
  outline: none;
  color: #333;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #333;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 0px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #333;
}

.show {
  display: block;
}
            </style>
            <header class="header-area header-sticky">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <nav class="main-nav">
                                <!-- ***** Logo Start ***** -->
                                <a href="" class="logo">
                                    <img src="{{ asset('pelanggan/assets/images/galeri/Logo_Kaldera.png') }}" alt=""
                                        style="width: 65%;">
                                </a>
                                <!-- ***** Logo End ***** -->
                                <!-- ***** Menu Start ***** -->
                                <ul class="nav">
                                    <li class="nav-item mx-md-2">
                                        <a class="nav-link {{ set_active('home') }}" href="/">Beranda</a>
                                    </li>
                                    @guest
                                    @if (Route::has('login'))
                                    <li class="nav-item mx-md-2 ">
                                        <a class="nav-link {{ set_active('wisata') }}" href="{{ route('wisata') }}">Tiket Masuk
                                        </a>
                                    </li>
                                    <li class="nav-item mx-md-2 ">
                                        <a class="nav-link {{ set_active('wisata') }}" href="{{ route('wisata') }}">Tiket Event
                                        </a>
                                    </li>
                                    @endif
                                    @else
                                    <li class="nav-item mx-md-2 ">
                                        <a class="nav-link {{ set_active('wisata') }}"
                                            href="{{ route('wisata') }}">{{ ucwords('Tiket Masuk ') }}</a>
                                    </li>
                                    <li class="nav-item mx-md-2 ">
                                        <a class="nav-link {{ set_active('event') }}"
                                            href="{{ route('event') }}">{{ ucwords('Tiket Event') }}</a>
                                    </li>
                                    @endguest
                                    {{-- <li class="nav-item mx-md-2 ">
                                        <a class="nav-link {{ set_active('gallery-wisata') }}"
                                            href="{{ route('gallery-wisata') }}">Galery</a>
                                    </li> --}}
                                    <!-- Mobile button -->
                                    @guest
                                    @if (Route::has('login'))

                                    <li class="form-inline d-sm-block d-md-none">
                                        <a class="nav-link {{ set_active('login') }}"
                                            href="{{ route('login') }}">Login</a>
                                    </li>

                                    <li class="form-inline my-2 my-lg-0 d-none d-md-block">
                                        <a class="nav-link {{ set_active('login') }}"
                                            href="{{ route('login') }}">Login</a>
                                    </li>
                                    @endif
                                    @else
                                    <li class="submenu" class="dropbtn" onclick="myFunction()" style="text-align: right;"> 
                                        <img style="width: 12%; border-radius: 50%;" class="user-avatar rounded-circle" src="{{asset('admin/img/avatar.png')}}"
                                        alt="User Avatar">&nbsp; {{ Auth::user()->name }} <i class="fa fa-caret-down" aria-hidden="true"></i>
                                         <ul class="text-left">
                                        @if (Auth::user()->role == 'admin')
                                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                        @elseif (Auth::user()->role == 'penjual')
                                        <li><a href="{{ route('dashboardpenjual') }}">Dashboard</a></li>
                                        @else
                                        <li><a href="{{ route('dashboard.pelanggan') }}">Dashboard</a></li>
                                        @endif
                                        {{-- class="dropdown-item" --}}
                                        <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </li>
    
                                        <form hidden id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </ul>
                                      
                                    </a>
                                </li>
                                      @endguest
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
            <!-- ***** Header Area End ***** -->

            <script>
                /* When the user clicks on the button, 
                toggle between hiding and showing the dropdown content */
                function myFunction() {
                  document.getElementById("myDropdown").classList.toggle("show");
                }
                
                // Close the dropdown if the user clicks outside of it
                window.onclick = function(e) {
                  if (!e.target.matches('.dropbtn')) {
                  var myDropdown = document.getElementById("myDropdown");
                    if (myDropdown.classList.contains('show')) {
                      myDropdown.classList.remove('show');
                    }
                  }
                }
                </script> 