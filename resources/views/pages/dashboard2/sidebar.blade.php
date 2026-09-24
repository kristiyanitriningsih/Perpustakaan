<ul class="navbar-nav sidebar sidebar-light accordion" style="background-color: #FFF4BD !important;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-book"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Perpustakaan</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
          
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('book2.index') }}">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Data Buku Perpustakan</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{ route('loan2.index') }}">
                    <i class="fas fa-fw fa-edit"></i>
                    <span>Form Peminjaman</span></a>
            </li>

        </ul>