<div class="right-bar">
    <div data-simplebar class="h-100">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-bordered nav-justified" role="tablist">
            <li class="nav-item">
                <a class="nav-link py-2 active" data-bs-toggle="tab" href="#settings-tab" role="tab">
                    <i class="mdi mdi-cog-outline d-block font-22 my-1"></i>
                </a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content pt-0">

            <div class="tab-pane active" id="settings-tab" role="tabpanel">
                <h6 class="fw-medium px-3 m-0 py-2 font-13 text-uppercase bg-light">
                    <span class="d-block py-1">Pengaturan Tema</span>
                </h6>

                <div class="p-3">

                    <h6 class="fw-medium font-14 mb-2 pb-1">Skema Warna</h6>
                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="layout-color" value="light"
                            id="light-mode-check" checked />
                        <label class="form-check-label" for="light-mode-check">Mode Terang</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="layout-color" value="dark"
                            id="dark-mode-check" />
                        <label class="form-check-label" for="dark-mode-check">Mode Gelar</label>
                    </div>

                    <!-- Menu positions -->
                    <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Posisi Menu (Sidebar Kiri dan Bar Atas)</h6>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="menu-position" value="fixed" id="fixed-check"
                            checked />
                        <label class="form-check-label" for="fixed-check">Tetap</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="menu-position" value="scrollable"
                            id="scrollable-check" />
                        <label class="form-check-label" for="scrollable-check">Dapat Discroll</label>
                    </div>

                    <!-- Left Sidebar-->
                    <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Warna Sidebar Kiri</h6>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="leftbar-color" value="light" id="light-check" />
                        <label class="form-check-label" for="light-check">Terang</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="leftbar-color" value="dark" id="dark-check" checked/>
                        <label class="form-check-label" for="dark-check">Gelap</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="leftbar-color" value="brand" id="brand-check" />
                        <label class="form-check-label" for="brand-check">Brand</label>
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input type="checkbox" class="form-check-input" name="leftbar-color" value="gradient" id="gradient-check" />
                        <label class="form-check-label" for="gradient-check">Gradient</label>
                    </div>

                    <!-- User info -->
                    <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Nyalakan Info User pada Sidebar ?</h6>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="sidebar-user" value="fixed" id="sidebaruser-check" />
                        <label class="form-check-label" for="sidebaruser-check">On / Off</label>
                    </div>


                    <!-- Topbar -->
                    <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Bar Atas</h6>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="topbar-color" value="dark" id="darktopbar-check"
                            checked />
                        <label class="form-check-label" for="darktopbar-check">Gelap</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="topbar-color" value="light" id="lighttopbar-check" />
                        <label class="form-check-label" for="lighttopbar-check">Terang</label>
                    </div>

                    <div class="d-grid mt-4">
                        <button class="btn btn-primary" id="resetBtn">Kembalikan ke Pengaturan Awal</button>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- end slimscroll-menu-->
</div>
