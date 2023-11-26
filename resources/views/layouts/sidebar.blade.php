<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
        <span class="brand-text font-weight-bold">SPK EDAS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            {{--            <div class="image">--}}
            {{--                <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" width="160" class="img-circle elevation-2"--}}
            {{--                     alt="User Image">--}}
            {{--            </div>--}}
            <div class="info">
                {{--          <a href="#" class="d-block">{{Auth::user()->username}}</a>--}}
                <a href="{{url('profile')}}" class="d-block">
                    <i class="fas fa-user mx-1"></i>
                    Untitled
                </a>
            </div>
        </div>

        <!-- SidebarSearch Form -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                    <li class="nav-item">
                        <a href="{{ url('/kriteria') }}" class="nav-link">
                            <i class="nav-icon fas fa-solid fa-users"></i>
                            <p>
                                Kriteria
                            </p>
                        </a>
                    </li>
                <li class="nav-item">
                    <a href="{{ url('/sub_kriteria') }}" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-users"></i>
                        <p>
                            Sub Kriteria
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/alternatif') }}" class="nav-link">
                        <i class="nav-icon fas fa-bars"></i>
                        <p>
                            Alternatif
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/perhitungan') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Data Perhitungan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/hasil_akhir') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Hasil Akhir
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>