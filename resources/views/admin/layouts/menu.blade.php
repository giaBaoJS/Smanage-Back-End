<div class="vertical-menu">
    <div class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            @if (session('account')->role==1)
            <ul class="metismenu list-unstyled" id="side-menu">
                <!-- Title -->
                <li class="menu-title">Menu</li>
                <!-- Menu normal -->
                <li>
                    <a href="/admin/dashboard" class="waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uim uim-airplay"></i>
                        </div>
                        <span>Trang chủ</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uim uim-layers-alt"></i>
                        </div>
                        <span>Coupon</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="/admin/coupon" class="waves-effect">
                                <div class="d-inline-block icons-sm mr-1">
                                    <i class="uim uim-airplay"></i>
                                </div>
                                <span>Danh sách coupon</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/coupon/add" class="waves-effect">
                                <div class="d-inline-block icons-sm mr-1">
                                    <i class="uim uim-airplay"></i>
                                </div>
                                <span>Thêm coupon</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Coupon -->
                <!-- Người dùng -->
                <!-- Khu vực -->
                <li class="menu-title">Dịch vụ</li>
                <!-- Multiple Dropdown -->
                <!-- Slider -->

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uim uim-layers-alt"></i>
                        </div>
                        <span>Slider</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="/admin/slider">Danh sách các slider</a>
                        </li>
                        <li>
                            <a href="/admin/slider/add">Thêm slider</a>
                        </li>
                    </ul>
                </li>

                <!-- Tours -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uim uim-layers-alt"></i>
                        </div>
                        <span>Tours</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="/admin/tours" class="waves-effect">
                                <div class="d-inline-block icons-sm mr-1">
                                    <i class="uim uim-airplay"></i>
                                </div>
                                <span>Danh sách tours</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/tours/add" class="waves-effect">
                                <div class="d-inline-block icons-sm mr-1">
                                    <i class="uim uim-airplay"></i>
                                </div>
                                <span>Thêm tours</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Tin tức -->
            </ul>
            @else
            {{-- @if (session('account')->role==2)
            <ul class="metismenu list-unstyled" id="side-menu">
                <!-- Title -->
                <li class="menu-title">Menu</li>
                <!-- Menu normal -->
                <li>
                    <a href="/admin/dashboard" class="waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uim uim-airplay"></i>
                        </div>
                        <span>Trang chủ</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uim uim-layers-alt"></i>
                        </div>
                        <span>Liên hệ</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="/admin/contact" class="waves-effect">
                                <div class="d-inline-block icons-sm mr-1">
                                    <i class="uim uim-airplay"></i>
                                </div>
                                <span>Danh sách liên hệ</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-title">Dịch vụ</li>
                <!-- Multiple Dropdown -->
                <!-- Tours -->
                <!-- Tin tức -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uim uim-layers-alt"></i>
                        </div>
                        <span>Tin tức</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="/admin/news" class="waves-effect">
                                <div class="d-inline-block icons-sm mr-1">
                                    <i class="uim uim-airplay"></i>
                                </div>
                                <span>Danh sách tin tức</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/news/add" class="waves-effect">
                                <div class="d-inline-block icons-sm mr-1">
                                    <i class="uim uim-airplay"></i>
                                </div>
                                <span>Thêm tin tức</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            @else --}}
            <ul class="metismenu list-unstyled" id="side-menu">
                <!-- Title -->
                <li class="menu-title">Menu</li>
                <!-- Menu normal -->
                <li>
                    <a href="/admin/dashboard" class="waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uim uim-airplay"></i>
                        </div>
                        <span>Trang chủ</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uim uim-layers-alt"></i>
                        </div>
                        <span>Liên hệ</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="/admin/contact" class="waves-effect">
                                <div class="d-inline-block icons-sm mr-1">
                                    <i class="uim uim-airplay"></i>
                                </div>
                                <span>Danh sách liên hệ</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Coupon -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uim uim-layers-alt"></i>
                        </div>
                        <span>Coupon</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="/admin/coupon" class="waves-effect">
                                <div class="d-inline-block icons-sm mr-1">
                                    <i class="uim uim-airplay"></i>
                                </div>
                                <span>Danh sách coupon</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Người dùng -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uim uim-layers-alt"></i>
                        </div>
                        <span>Người dùng</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="/admin/user" class="waves-effect">
                                <div class="d-inline-block icons-sm mr-1">
                                    <i class="uim uim-airplay"></i>
                                </div>
                                <span>Danh sách người dùng</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/add-user" class="waves-effect">
                                <div class="d-inline-block icons-sm mr-1">
                                    <i class="uim uim-airplay"></i>
                                </div>
                                <span>Thêm người dùng</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Khu vực -->
                <li class="menu-title">Dịch vụ</li>
                <!-- Multiple Dropdown -->

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uim uim-layers-alt"></i>
                        </div>
                        <span>Slider</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="/admin/slider">Danh sách các slider</a>
                        </li>
                        <li>
                            <a href="/admin/slider/add">Thêm slider</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uim uim-layers-alt"></i>
                        </div>
                        <span>Miền</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="/admin/mien">Danh sách các miền</a>
                        </li>
                        <li>
                            <a href="/admin/mien/add">Thêm miền</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uim uim-layers-alt"></i>
                        </div>
                        <span>Tỉnh thành</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="/admin/tinhthanh">Danh sách các tỉnh thành</a>
                        </li>
                        <li>
                            <a href="/admin/tinhthanh/add">Thêm tỉnh thành</a>
                        </li>
                    </ul>
                </li>
                <!-- Tours -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uim uim-layers-alt"></i>
                        </div>
                        <span>Tours</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="/admin/tours" class="waves-effect">
                                <div class="d-inline-block icons-sm mr-1">
                                    <i class="uim uim-airplay"></i>
                                </div>
                                <span>Danh sách tours</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/tours/add" class="waves-effect">
                                <div class="d-inline-block icons-sm mr-1">
                                    <i class="uim uim-airplay"></i>
                                </div>
                                <span>Thêm tours</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uim uim-layers-alt"></i>
                        </div>
                        <span>Hóa đơn</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="/admin/bill" class="waves-effect">
                                <div class="d-inline-block icons-sm mr-1">
                                    <i class="uim uim-airplay"></i>
                                </div>
                                <span>Danh sách hóa đơn</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Tin tức -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uim uim-layers-alt"></i>
                        </div>
                        <span>Tin tức</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="/admin/news" class="waves-effect">
                                <div class="d-inline-block icons-sm mr-1">
                                    <i class="uim uim-airplay"></i>
                                </div>
                                <span>Danh sách tin tức</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/news/add" class="waves-effect">
                                <div class="d-inline-block icons-sm mr-1">
                                    <i class="uim uim-airplay"></i>
                                </div>
                                <span>Thêm tin tức</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Thư viện -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uim uim-layers-alt"></i>
                        </div>
                        <span>Thư viện</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="/admin/gallery" class="waves-effect">
                                <div class="d-inline-block icons-sm mr-1">
                                    <i class="uim uim-airplay"></i>
                                </div>
                                <span>Danh sách thư viện</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            @endif

        </div>
        <!-- Sidebar -->
    </div>
</div>
