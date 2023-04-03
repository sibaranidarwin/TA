 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-primary elevation-4" style="background-color: #000066; color: #fff;">
     <!-- Brand Logo -->
     <a href="/" class="brand-link">
         <span class="brand-text font-weight">Kaldera Toba </span>
         <img src="{{ asset('frontend/images/Logo_kaldera.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
     </a>
<hr>
     <!-- Sidebar -->
     {{-- <div class="sidebar"> --}}
         <!-- Sidebar user panel (optional) -->
         {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="{{ asset('admin/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block">{{ Auth::user()->name }}</a>
             </div>
         </div> --}}

         <!-- Sidebar Menu -->
         <nav class="mt-3">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 @if (Auth::user()->role == 'admin')
                     <li class="nav-item">
                         <a href="{{ route('dashboard') }}" class="nav-link {{ set_active('dashboard') }}">
                             <i class="nav-icon fas fa-tachometer-alt"></i>
                             <p>
                                 Dashboard
                             </p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="{{ route('category.index') }}" class="nav-link {{ set_active('category.*') }}">
                             <i class="nav-icon fas fa-th"></i>
                             <p>
                                 Kategori Tiket Wisata
                             </p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="{{ route('product.index') }}" class="nav-link {{ set_active('product.*') }}">
                             <i class="nav-icon fa fa-table"></i>
                             <p>
                                 Tiket Wisata
                             </p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="{{ route('article.index') }}" class="nav-link {{ set_active('article.*') }}">
                             <i class="nav-icon fas fa-image"></i>
                             <p>
                                 Blog Wisata
                             </p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="{{ route('gallery.index') }}" class="nav-link {{ set_active('gallery.*') }}">
                             <i class="nav-icon fas fa-image"></i>
                             <p>
                                 Gallery Wisata
                             </p>
                         </a>
                     </li>

                     <li class="nav-item">
                         <a href="{{ route('order.index') }}" class="nav-link {{ set_active('order.*') }}">
                             <i class="nav-icon fa fa-file"></i>
                             <p>
                                 Pemesanan Tiket Wisata
                             </p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="{{ route('transaction.index') }}"
                             class="nav-link {{ set_active('transaction.*') }}">
                             <i class="nav-icon fa fa-credit-card"></i>
                             <p>
                                 Pembayaran Tiket Wisata
                             </p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="{{ route('user.index') }}" class="nav-link" {{ set_active('user.*') }}>
                             <i class="nav-icon fa fa-user-circle"></i>
                             <p>
                                 User
                             </p>
                         </a>
                     </li>
                 @elseif (Auth::user()->role == 'umkm')
                     <li class="nav-item">
                         <a href="{{ route('pelanggan.transaksi') }}"
                             class="nav-link {{ set_active('pelanggan.transaksi') }}">
                             <i class="nav-icon fa fa-cart-plus"></i>
                             <p>
                                 Lihat Tiket
                             </p>
                         </a>
                     </li>
                 @else
                     <li class="nav-item">
                         <a href="{{ route('pelanggan.transaksi') }}"
                             class="nav-link {{ set_active('pelanggan.transaksi') }}">
                             <i class="nav-icon fa fa-table"></i>
                             <p>
                                 Lihat Tiket
                             </p>
                         </a>
                     </li>
                 @endif
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
