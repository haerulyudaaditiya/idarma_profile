<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <!-- Dashboard -->
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>

        <!-- Users -->
        <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-users"></i>
                <p>Users</p>
            </a>
        </li>

        {{-- Visi & Misi --}}
        <li class="nav-item">
            <a href="{{ route('vision-and-misions.index') }}"
                class="nav-link {{ request()->routeIs('vision-and-misions.*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-bullseye"></i>
                <p>Visi & Misi</p>
            </a>
        </li>

        {{-- Services --}}
        <li class="nav-item">
            <a href="{{ route('services.index') }}"
                class="nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-concierge-bell"></i>
                <p>Layanan</p>
            </a>
        </li>

        {{-- struktur organisasi --}}
        <li
            class="nav-item {{ request()->is('admin/positions*') || request()->is('admin/organizations*') ? 'menu-open' : '' }}">
            <a href="#"
                class="nav-link {{ request()->is('admin/positions*') || request()->is('admin/organizations*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-sitemap"></i>
                <p>
                    Struktur Organisasi
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('positions.index') }}"
                        class="nav-link {{ request()->is('admin/positions*') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Data Jabatan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('organizations.index') }}"
                        class="nav-link {{ request()->is('admin/organizations*') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Struktur Jabatan</p>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Portfolio --}}
        <li class="nav-item">
            <a href="{{ route('portfolios.index') }}" class="nav-link {{ request()->routeIs('portfolios.*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-briefcase"></i>
                <p>Portfolio</p>
            </a>
        </li>

        {{-- Testimonials --}}
        <li class="nav-item">
            <a href="{{ route('testimonials.index') }}"
                class="nav-link {{ request()->routeIs('testimonials.*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-comment-dots"></i>
                <p>Testimoni</p>
            </a>
        </li>

        {{-- Berita --}}
        <li class="nav-item {{ request()->is('admin/news*') || request()->is('admin/news-categories*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('admin/news*') || request()->is('admin/news-categories*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-newspaper"></i>
                <p>
                    Berita
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <!-- Berita -->
                <li class="nav-item">
                    <a href="{{ route('news.index') }}" class="nav-link {{ request()->is('admin/news') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Daftar Berita</p>
                    </a>
                </li>

                <!-- Kategori Berita -->
                <li class="nav-item">
                    <a href="{{ route('news-categories.index') }}" class="nav-link {{ request()->is('admin/news-categories') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Kategori Berita</p>
                    </a>
                </li>

                <!-- Tag Berita -->
                <li class="nav-item">
                    <a href="{{ route('news-tags.index') }}" class="nav-link {{ request()->is('admin/news-tags') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Tag Berita</p>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Contact --}}
        <li class="nav-item">
            <a href="{{ route('contacts.index') }}"
                class="nav-link {{ request()->routeIs('contacts.*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-envelope"></i>
                <p>Pesan Pengguna</p>
            </a>
        </li>

        <!-- Logout -->
        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link text-red"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>Logout</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>

    </ul>
</nav>
