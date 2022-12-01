@if (auth()->user()->user_level == "super")
                <div class="menu-item pt-5">
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Admin Menu</span>
                    </div>
                </div>

                <div class="menu-item">
                    <a class="menu-link" href="">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <i class="fas fa-cog"></i>
                            </span>
                        </span>
                        <span class="menu-title">App Setting</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link" href="{{route('admin.user-list')}}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <i class="fas fa-users"></i>
                            </span>
                        </span>
                        <span class="menu-title">User List</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link" href="">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <i class="fas fa-key"></i>
                            </span>
                        </span>
                        <span class="menu-title">Role Management</span>
                    </a>
                </div>
                
                <div class="menu-item">
                    <a class="menu-link" href="">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <i class="fas fa-clock"></i>
                            </span>
                        </span>
                        <span class="menu-title">Log Activity</span>
                    </a>
                </div>
                
                @endif

                @if(auth()->user()->user_level == "staff" OR auth()->user()->user_level == "super")
                <div class="menu-item pt-5">
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Menu List</span>
                    </div>
                </div>
                
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <i class="fas fa-book"></i>
                            </span>
                        </span>
                        <span class="menu-title">Master Kesantrian</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion" style="display: none; overflow: hidden;">
                        <div class="menu-item">
                            <a class="menu-link" href="">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Data Santri</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Data Asrama</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Data Kelas</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <i class="fas fa-book"></i>
                            </span>
                        </span>
                        <span class="menu-title">Master Perizinan</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion" style="display: none; overflow: hidden;">
                        <div class="menu-item">
                            <a class="menu-link" href="">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Perizinan</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Laporan</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <i class="fas fa-book"></i>
                            </span>
                        </span>
                        <span class="menu-title">Master Kesehatan</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion" style="display: none; overflow: hidden;">
                        <div class="menu-item">
                            <a class="menu-link" href="">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Rekam Medis</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Laporan</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <i class="fas fa-book"></i>
                            </span>
                        </span>
                        <span class="menu-title">Master Prestasi</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion" style="display: none; overflow: hidden;">
                        <div class="menu-item">
                            <a class="menu-link" href="">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Rekam Prestasi</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Laporan</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <i class="fas fa-book"></i>
                            </span>
                        </span>
                        <span class="menu-title">Master PSB</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion" style="display: none; overflow: hidden;">
                        <div class="menu-item">
                            <a class="menu-link" href="">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Dashboard PSB</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Data Santri</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Ruang Tes</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Pembayaran</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Laporan</span>
                            </a>
                        </div>
                    </div>
                </div>
                @endif

                @if(auth()->user()->user_level == "student")

                <div class="menu-item pt-5">
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Menu List</span>
                    </div>
                </div>
                
                <div class="menu-item">
                    <a class="menu-link" href="{{route('psb.payment')}}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <i class="fas fa-dollar-sign"></i>
                            </span>
                        </span>
                        <span class="menu-title">Payment</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link" href="{{route('psb.biodata', 'data-diri')}}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <i class="fas fa-file"></i>
                            </span>
                        </span>
                        <span class="menu-title">Biodata</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link" href="{{route('psb.kartu-ujian')}}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <i class="fas fa-pen"></i>
                            </span>
                        </span>
                        <span class="menu-title">Ujian Penerimaan</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link" href="{{route('home')}}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <i class="fas fa-graduation-cap"></i>
                            </span>
                        </span>
                        <span class="menu-title">Kelulusan</span>
                    </a>
                </div>

                @endif