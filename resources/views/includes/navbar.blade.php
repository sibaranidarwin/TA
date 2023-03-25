<style>
    .searchInputWrapper {
        position: relative;
    }
    
    .searchInput {
        width: 20rem;
        height: 2rem;
        padding: 0 1rem;
        border-radius: 2rem;
        border: none;
        transition: transform 0.1s ease-in-out;
    }
    
    ::placeholder {
        color: #a1a1a1;
    }
    
    /* hide the placeholder text on focus */
    :focus::placeholder {
        text-indent: -999px
    }
    
    .searchInput:focus {
        outline: none;
        transform: scale(1.1);
        transition: all 0.1s ease-in-out;
    }
    
    .searchInputIcon {
        position: absolute;
        right: 0.8rem;
        top: 0.5rem;
        color: #a1a1a1;
        transition: all 0.1s ease-in-out;
    }
    
    .container:focus-within>.searchInputWrapper>.searchInputIcon {
        right: 0.2rem;
    }
    </style>
    
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #0079C2;">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" style="color: #fff" data-widget="pushmenu" href="#" role="button"><i
                        class="fas fa-bars"></i></a>
            </li>
        </ul>
    
        <div class="searchInputWrapper">
            <input class="searchInput" type="text" placeholder='Search'>
            <i class="searchInputIcon fa fa-search"></i>
            </input>
        </div>
    
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <img height="30px" src="{{asset('admin/img/avatar.png')}}" class="img-circle elevation-2" alt="User Image">
                <a class="dropdown-toggle" style="color: #fff;" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
    
                <div class="dropdown-menu">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="fas fa-sign-out-alt"></i>
                            Logout
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->