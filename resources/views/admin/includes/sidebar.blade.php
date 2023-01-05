<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('dashboard.admin') }}">
                <i class="ri-dashboard-line"></i>
                <span>Tổng Quan</span>
            </a>
        </li>
        <!--Components Nav -->
        @if (Auth::user()->hasPermission('Category_viewAny'))
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="ri-trello-fill"></i><span>Loại Sản Phẩm</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('category.index') }}">
                            <i class="bi bi-circle"></i><span>Danh Sách Loại Sản Phẩm</span>
                        </a>
                    </li>
                    @if (Auth::user()->hasPermission('Category_create'))
                        <li>
                            <a href="{{ route('category.create') }}">
                                <i class="bi bi-circle"></i><span>Thêm Loại Sản Phẩm</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->hasPermission('Category_viewTrash'))
                    <li>
                        <a href="{{ route('category.trash') }}">
                            <i class="bi bi-circle"></i><span>Thùng Rác</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>
        @endif
        <!-- End Components Nav -->
        <!--Forms Nav -->
        @if (Auth::user()->hasPermission('Product_viewAny'))
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="ri-product-hunt-line"></i><span>Sản Phẩm</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('products.index') }}">
                            <i class="bi bi-circle"></i><span>Danh Sách Sản Phẩm</span>
                        </a>
                    </li>
                    @if (Auth::user()->hasPermission('Product_create'))
                        <li>
                            <a href="{{ route('products.create') }}">
                                <i class="bi bi-circle"></i><span>Thêm Sản Phẩm</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->hasPermission('Product_viewTrash'))
                    <li>
                        <a href="{{ route('product.trash') }}">
                            <i class="bi bi-circle"></i><span>Thùng Rác</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>
        @endif
        <!-- End Tables Nav -->
        <!-- End Forms Nav -->
        @if (Auth::user()->hasPermission('User_viewAny'))
            <!-- Forms Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#charts-navs" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-person-lines-fill"></i><span>Quản Lí Nhân Viên </span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
            <li class="nav-item">
                <ul id="charts-navs" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('users.index') }}">
                            <i class="bi bi-circle"></i><span>Danh Sách Nhân Viên </span>
                        </a>
                    </li>
                    @if (Auth::user()->hasPermission('User_create'))
                        <li>
                            <a href="{{ route('users.create') }}">
                                <i class="bi bi-circle"></i><span>Đăng Kí Tài Khoản</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
            </li>
        @endif
        <!-- Forms Nav -->
        @if (Auth::user()->hasPermission('Group_viewAny'))
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-tools"></i><span>Nhóm Quyền</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('group.index') }}">
                            <i class="bi bi-circle"></i><span>Danh Sách Nhóm Quyền</span>
                        </a>
                    </li>
                    @if (Auth::user()->hasPermission('Group_create'))
                        <li>
                            <a href="{{ route('group.create') }}">
                                <i class="bi bi-circle"></i><span>Thêm Loại Nhóm Quyền</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->hasPermission('Group_viewTrash'))
                    <li>
                        <a href="{{ route('group.trash') }}">
                            <i class="bi bi-circle"></i><span>Thùng Rác</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>
        @endif
        <!-- End Forms Nav -->

        <!--Forms Nav -->
        @if (Auth::user()->hasPermission('Customer_viewAny'))
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-people"></i><span>Khách Hàng</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('customers.index') }}">
                            <i class="bi bi-circle"></i><span>Danh Sách Khách Hàng</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        <!-- End Forms Nav -->
        <!-- End Forms Nav -->
        <!-- Forms Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#charts-hhh" data-bs-toggle="collapse" href="#">
                <i class="bi bi-handbag"></i><span>Quản Lí Đơn Hàng </span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
        <li class="nav-item">
            <ul id="charts-hhh" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('orders.index') }}">
                        <i class="bi bi-circle"></i><span>Danh Sách Đơn Hàng </span>
                    </a>
                </li>
            </ul>
        </li>
        </li>
        <!-- End Forms Nav -->


    </ul>

    <!-- End Charts Nav -->

    {{-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="icons-bootstrap.html">
              <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-remix.html">
              <i class="bi bi-circle"></i><span>Remix Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>Boxicons</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li><!-- End Login Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li><!-- End Error 404 Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
          <i class="bi bi-file-earmark"></i>
          <span>Blank</span>
        </a>
      </li><!-- End Blank Page Nav -->

    </ul> --}}

</aside>
