<!-- Main sidebar -->
<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>

    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="card-body">
                <div class="media">
                    <div class="media-body">
                        <div class="media-title font-weight-semibold">Welcome Admin</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <li class="nav-item-header">
                    <div class="text-uppercase font-size-xs line-height-xs">Main</div>
                    <i class="icon-menu" title="Main"></i>
                </li>

                {{-- Dashboard --}}
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" wire:navigate class="nav-link">
                        <i class="icon-home4"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                {{-- Categories --}}
                <li class="nav-item">
                    <a href="{{ route('categories') }}" wire:navigate class="nav-link">
                        <i class="icon-grid5"></i>
                        <span>Categories</span>
                    </a>
                </li>


                {{-- Products --}}
                <li class="nav-item">
                    <a href="{{ route('products') }}" wire:navigate class="nav-link">
                        <i class="icon-grid5"></i>
                        <span>Products</span>
                    </a>
                </li>

                {{-- Blogs --}}
                <li class="nav-item">
                    <a href="{{ route('blogs') }}" wire:navigate class="nav-link">
                        <i class="icon-grid5"></i>
                        <span>Blogs</span>
                    </a>
                </li>


                {{-- About Us --}}
                <li class="nav-item">
                    <a href="{{ route('edit-aboutus') }}" wire:navigate class="nav-link">
                        <i class="icon-grid5"></i>
                        <span>AboutUs</span>
                    </a>
                </li>


                 {{-- Testimonialss --}}
                <li class="nav-item">
                    <a href="{{ route('testimonials') }}" wire:navigate class="nav-link">
                        <i class="icon-grid5"></i>
                        <span>Testimonials</span>
                    </a>
                </li>

                {{-- Logout --}}
                <li class="nav-item">
                    <a href="{{ route('logout') }}" wire:navigate class="nav-link">
                        <i class="icon-switch2"></i>
                        <span>Logout</span>
                    </a>
                </li>

            </ul>
        </div>

    </div>
</div>