<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{asset('BackEnd/assets/images')}}/logo-den.png" alt="" height="40" />
                    </span>
                    <span class="logo-lg">
                        <img
                            src="{{asset('BackEnd/assets/images')}}/logo-chu-den.png"
                            alt=""
                            height="60"
                        />
                    </span>
                </a>

                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{asset('BackEnd/assets/images')}}/logo-trang.png" alt="" height="40" />
                    </span>
                    <span class="logo-lg">
                        <img
                            src="{{asset('BackEnd/assets/images')}}/logo-chu-trang.png"
                            alt=""
                            height="60"
                        />
                    </span>
                </a>
            </div>

            <button
                type="button"
                class="btn btn-sm px-3 font-size-24 header-item waves-effect"
                id="vertical-menu-btn"
            >
                <i class="mdi mdi-backburger"></i>
            </button>

            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Tìm kiếm..."
                    />
                    <span class="mdi mdi-magnify"></span>
                </div>
            </form>
        </div>

        <div class="d-flex">
            <!-- Search Mobile -->
            <div class="dropdown d-inline-block d-lg-none ml-2">
                <button
                    type="button"
                    class="btn header-item noti-icon waves-effect"
                    id="page-header-search-dropdown"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                >
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div
                    class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                    aria-labelledby="page-header-search-dropdown"
                >
                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Tìm kiếm ..."
                                    aria-label="Tìm kiếm"
                                />
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="mdi mdi-magnify"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Flag -->
            <div class="dropdown d-inline-block">
                <button
                    type="button"
                    class="btn header-item waves-effect"
                    id="page-header-flag-dropdown"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                >
                    Ngôn ngữ
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img
                            src="{{asset('BackEnd/assets/images')}}/flags/vi.png"
                            alt="user-image"
                            class="mr-2"
                            height="12"
                        /><span class="align-middle">Tiếng Việt</span>
                    </a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img
                            src="{{asset('BackEnd/assets/images')}}/flags/us.jpg"
                            alt="user-image"
                            class="mr-2"
                            height="12"
                        /><span class="align-middle">English</span>
                    </a>
                </div>
            </div>
            <!-- Information -->
            <div class="dropdown d-inline-block">
                <button
                    type="button"
                    class="btn header-item waves-effect"
                    id="page-header-user-dropdown"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                >
                    <img
                        class="rounded-circle header-profile-user"
                        src="{{asset('BackEnd/assets/images')}}/users/avatar-1.jpg"
                        alt="Header Avatar"
                    />
                    <span class="d-none d-sm-inline-block ml-1"
                        >Kim Bảo Đẹp Trai</span
                    >
                    <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a class="dropdown-item" href="#"
                        ><i
                            class="mdi mdi-face-profile font-size-16 align-middle mr-1"
                        ></i>
                        Thông tin tài khoản</a
                    >
                    <a class="dropdown-item" href="#"
                        ><i
                            class="mdi mdi-credit-card-outline font-size-16 align-middle mr-1"
                        ></i>
                        Hóa đơn</a
                    >
                    <a class="dropdown-item" href="#"
                        ><i
                            class="mdi mdi-account-settings font-size-16 align-middle mr-1"
                        ></i>
                        Cài đặt</a
                    >
                    <a class="dropdown-item" href="#"
                        ><i class="mdi mdi-lock font-size-16 align-middle mr-1"></i>
                        Khóa màn hình</a
                    >
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"
                        ><i class="mdi mdi-logout font-size-16 align-middle mr-1"></i>
                        Đăng xuất</a
                    >
                </div>
            </div>
        </div>
    </div>
</header>
