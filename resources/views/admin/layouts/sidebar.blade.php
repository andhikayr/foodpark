<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{ route('admin.index') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.slider.index') }}">
                        <i class="fas fa-list"></i>
                        <span> Produk (Slider) </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.why-choose-us.index') }}">
                        <i class="fas fa-font"></i>
                        <span> "Mengapa Memilih Kita" </span>
                    </a>
                </li>

                <li>
                    <a href="#sidebarEcommerce" data-bs-toggle="collapse">
                        <i class="fas fa-utensils"></i>
                        <span> Kelola Restoran </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('admin.product-category.index') }}">Kategori Produk</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.product.index') }}">Produk</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
