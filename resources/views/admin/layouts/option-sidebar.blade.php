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
                        <label class="form-check-label" for="dark-mode-check">Mode Gelap</label>
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


                    <!-- Topbar -->
                    <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Bar Atas (Tidak berpengaruh jika skema warna dan warna sidebar kiri diubah menjadi gelap)</h6>

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

@push('scripts')
    <script>
        // Simpan pengaturan tema ke Local Storage
        function saveThemeSettings() {
            const layoutColor = document.querySelector('input[name="layout-color"]:checked').value;
            const leftbarColor = document.querySelector('input[name="leftbar-color"]:checked').value;
            const topbarColor = document.querySelector('input[name="topbar-color"]:checked').value;

            localStorage.setItem('layoutColor', layoutColor);
            localStorage.setItem('leftbarColor', leftbarColor);
            localStorage.setItem('topbarColor', topbarColor);
        }

        // Terapkan pengaturan tema yang disimpan
        function applySavedThemeSettings() {
            // Hapus atribut "checked" dari semua opsi
            document.querySelectorAll('input[name="layout-color"], input[name="leftbar-color"], input[name="topbar-color"]')
                .forEach(input => {
                    input.checked = false;
                });

            const savedLayoutColor = localStorage.getItem('layoutColor');
            const savedLeftbarColor = localStorage.getItem('leftbarColor');
            const savedTopbarColor = localStorage.getItem('topbarColor');

            if (savedLayoutColor) {
                document.getElementById(savedLayoutColor + '-mode-check').checked = true;
                document.body.setAttribute('data-theme', savedLayoutColor);
            }
            if (savedLeftbarColor) {
                document.getElementById(savedLeftbarColor + '-check').checked = true;
                document.body.setAttribute('data-leftbar-color', savedLeftbarColor);
            }
            if (savedTopbarColor) {
                document.getElementById(savedTopbarColor + 'topbar-check').checked = true;
                document.body.setAttribute('data-topbar-color', savedTopbarColor);
            }
        }

        // Event listener untuk menyimpan pengaturan saat ada perubahan
        document.querySelectorAll('input[name="layout-color"], input[name="leftbar-color"], input[name="topbar-color"]')
            .forEach(input => {
                input.addEventListener('change', saveThemeSettings);
            });

        // Terapkan pengaturan tema saat halaman dimuat
        window.onload = applySavedThemeSettings;

        // Reset ke pengaturan default
        document.getElementById('resetBtn').addEventListener('click', function() {
            localStorage.removeItem('layoutColor');
            localStorage.removeItem('leftbarColor');
            localStorage.removeItem('topbarColor');

            document.getElementById('light-mode-check').checked = true;
            document.getElementById('light-check').checked = true;
            document.getElementById('darktopbar-check').checked = true;
        });
    </script>
@endpush
