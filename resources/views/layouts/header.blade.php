  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
      <!-- Left navbar links -->

      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
          </li>
          {{-- <li class="nav-item d-none d-sm-inline-block">
              <a href="index3.html" class="nav-link">خانه</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
              <a href="#" class="nav-link">تماس</a>
          </li> --}}
      </ul>

      <!-- SEARCH FORM -->

      {{-- <form class="form-inline ml-3">
          <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="جستجو" aria-label="Search">
              <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                      <i class="fa fa-search"></i>
                  </button>
              </div>
          </div>
      </form> --}}

      <!-- Right navbar links -->
      <ul class="navbar-nav mr-auto">
          <!-- Messages Dropdown Menu -->
          <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="#">
                  <i class="fa fa-comments-o"></i>
                  <span class="badge badge-danger navbar-badge">3</span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                  <a href="#" class="dropdown-item">
                      <!-- Message Start -->
                      <div class="media">
                          <img src="{{ asset('dist/img/user1-128x128.jpg') }}" alt="User Avatar"
                              class="img-size-50 ml-3 img-circle">
                          <div class="media-body">
                              <h3 class="dropdown-item-title">
                                  حسام موسوی
                                  <span class="float-left text-sm text-danger"><i class="fa fa-star"></i></span>
                              </h3>
                              <p class="text-sm">با من تماس بگیر لطفا...</p>
                              <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 ساعت قبل</p>
                          </div>
                      </div>
                      <!-- Message End -->
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                      <!-- Message Start -->
                      <div class="media">
                          <img src="{{ asset('dist/img/user8-128x128.jpg') }}" alt="User Avatar"
                              class="img-size-50 img-circle ml-3">
                          <div class="media-body">
                              <h3 class="dropdown-item-title">
                                  پیمان احمدی
                                  <span class="float-left text-sm text-muted"><i class="fa fa-star"></i></span>
                              </h3>
                              <p class="text-sm">من پیامتو دریافت کردم</p>
                              <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 ساعت قبل</p>
                          </div>
                      </div>
                      <!-- Message End -->
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                      <!-- Message Start -->
                      <div class="media">
                          <img src="{{ asset('dist/img/user3-128x128.jpg') }}" alt="User Avatar"
                              class="img-size-50 img-circle ml-3">
                          <div class="media-body">
                              <h3 class="dropdown-item-title">
                                  سارا وکیلی
                                  <span class="float-left text-sm text-warning"><i class="fa fa-star"></i></span>
                              </h3>
                              <p class="text-sm">پروژه اتون عالی بود مرسی واقعا</p>
                              <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i>4 ساعت قبل</p>
                          </div>
                      </div>
                      <!-- Message End -->
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item dropdown-footer">مشاهده همه پیام‌ها</a>
              </div>
          </li>
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="#">
                  <i class="fa fa-bell-o"></i>
                  <span class="badge badge-warning navbar-badge">15</span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                  <span class="dropdown-item dropdown-header">15 نوتیفیکیشن</span>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                      <i class="fa fa-envelope ml-2"></i> 4 پیام جدید
                      <span class="float-left text-muted text-sm">3 دقیقه</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                      <i class="fa fa-users ml-2"></i> 8 درخواست دوستی
                      <span class="float-left text-muted text-sm">12 ساعت</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                      <i class="fa fa-file ml-2"></i> 3 گزارش جدید
                      <span class="float-left text-muted text-sm">2 روز</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item dropdown-footer">مشاهده همه نوتیفیکیشن</a>
              </div>
          </li>
          {{-- <li class="nav-item">
              <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
                      class="fa fa-th-large"></i></a>
          </li> --}}
      </ul>
  </nav>
  <!-- /.navbar -->



  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
          <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">پنل مدیریت مکاتب</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar" style="direction: ltr">
          <div style="direction: rtl">
              <!-- Sidebar user panel (optional) -->
              <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                  <div class="image">
                      <img src="https://www.gravatar.com/avatar/52f0fbcbedee04a121cba8dad1174462?s=200&d=mm&r=g"
                          class="img-circle elevation-2" alt="User Image">
                  </div>
                  <div class="info">
                      <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                      {{-- <a href="#" class="d-block">حبیبی</a> --}}
                  </div>
              </div>

              <!-- Sidebar Menu -->
              <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                      data-accordion="false">
                    {{-- Admin --}}
                      @if (Auth::user()->user_type == 1)
                          <li class="nav-item">
                              <a href="{{ url('admin/dashboard') }}" class="nav-link @if (Request::segment(2) == 'dashboard') active @endif">
                                  <i class="nav-icon fa fa-dashboard"></i>
                                  <p>
                                      داشبورد
                                  </p>
                              </a>
                          </li>

                          <li class="nav-item">
                              <a href="{{ url('admin/admin/list') }}" class="nav-link @if (Request::segment(2) == 'admin') active @endif">
                                  <i class="nav-icon fa fa-users"></i>
                                  <p>
                                      ادمین ها
                                  </p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ url('admin/student/list') }}" class="nav-link @if (Request::segment(2) == 'student') active @endif">
                                  <i class="nav-icon fa fa-users"></i>
                                  <p>
                                      شاگردان
                                  </p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ url('admin/teacher/list') }}" class="nav-link @if (Request::segment(2) == 'teacher') active @endif">
                                  <i class="nav-icon fa fa-users"></i>
                                  <p>
                                      اساتید
                                  </p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ url('admin/parent/list') }}" class="nav-link @if (Request::segment(2) == 'parent') active @endif">
                                  <i class="nav-icon fa fa-users"></i>
                                  <p>
                                      والدین
                                  </p>
                              </a>
                          </li>
                          {{-- ///////////// --}}


                          <li class="nav-item has-treeview @if (Request::segment(2) == 'class' || Request::segment(2) == 'subject' || Request::segment(2) == 'assign_subject' || Request::segment(2) == 'assign_class_teacher' || Request::segment(2) == 'class_timetable') menu-open @endif">
                            <a href="#" class="nav-link @if (Request::segment(2) == 'class' || Request::segment(2) == 'subject' || Request::segment(2) == 'assign_subject' || Request::segment(2) == 'assign_class_teacher' || Request::segment(2) == 'class_timetable') active @endif">
                              <i class="nav-icon fa fa-table"></i>
                              <p>
                                اکادمیک
                                <i class="fa fa-angle-left right"></i>
                              </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('admin/class/list') }}" class="nav-link @if (Request::segment(2) == 'class') active @endif">
                                        <i class="nav-icon fa fa-book"></i>
                                        <p>
                                            کلاس ها
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('admin/subject/list') }}" class="nav-link @if (Request::segment(2) == 'subject') active @endif">
                                        <i class="nav-icon fa fa-book"></i>
                                        <p>
                                            مضامین
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('admin/assign_subject/list') }}" class="nav-link @if (Request::segment(2) == 'assign_subject') active @endif">
                                        <i class="nav-icon fa fa-book"></i>
                                        <p>
                                            اختصاص مضمون
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('admin/class_timetable/list') }}" class="nav-link @if (Request::segment(2) == 'class_timetable') active @endif">
                                        <i class="nav-icon fa fa-book"></i>
                                        <p>
                                            تقسیم اوقات کلاس
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('admin/assign_class_teacher/list') }}" class="nav-link @if (Request::segment(2) == 'assign_class_teacher') active @endif">
                                        <i class="nav-icon fa fa-book"></i>
                                        <p>
                                            اختصاص کلاس به استاد
                                        </p>
                                    </a>
                                </li>
                            </ul>
                          </li>
                          {{-- ////// --}}

                          <li class="nav-item">
                            <a href="{{ url('admin/account') }}" class="nav-link @if (Request::segment(2) == 'account') active @endif">
                                <i class="nav-icon fa fa-book"></i>
                                <p>
                                  حساب کاربری
                                </p>
                            </a>
                        </li>
                          <li class="nav-item">
                              <a href="{{ url('admin/change_password') }}" class="nav-link @if (Request::segment(2) == 'change_password') active @endif">
                                  <i class="nav-icon fa fa-book"></i>
                                  <p>
                                    تغییر رمز کاربر
                                  </p>
                              </a>
                          </li>

                          {{-- Teachers --}}
                      @elseif (Auth::user()->user_type == 2)
                          <li class="nav-item">
                              <a href="{{ url('teacher/dashboard') }}" class="nav-link @if (Request::segment(2) == 'dashboard') active @endif">
                                  <i class="nav-icon fa fa-dashboard"></i>
                                  <p>
                                      داشبورد
                                  </p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ url('teacher/my_class_subject') }}" class="nav-link @if (Request::segment(2) == 'my_class_subject') active @endif">
                                  <i class="nav-icon fa fa-user"></i>
                                  <p>
                                      کلاس و مضمون من
                                  </p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ url('teacher/my_student') }}" class="nav-link @if (Request::segment(2) == 'my_student') active @endif">
                                  <i class="nav-icon fa fa-user"></i>
                                  <p>
                                      دانش آموزان من
                                  </p>
                              </a>
                          </li>
                        <li class="nav-item">
                            <a href="{{ url('teacher/account') }}" class="nav-link @if (Request::segment(2) == 'account') active @endif">
                                <i class="nav-icon fa fa-book"></i>
                                <p>
                                  حساب کاربری
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('teacher/change_password') }}" class="nav-link @if (Request::segment(2) == 'change_password') active @endif">
                                <i class="nav-icon fa fa-book"></i>
                                <p>
                                  تغییر رمز کاربر
                                </p>
                            </a>
                        </li>
                        {{-- Students --}}
                      @elseif (Auth::user()->user_type == 3)
                          <li class="nav-item">
                              <a href="{{ url('student/dashboard') }}" class="nav-link @if (Request::segment(2) == 'dashboard') active @endif">
                                  <i class="nav-icon fa fa-dashboard"></i>
                                  <p>
                                      داشبورد
                                  </p>
                              </a>
                          </li>
                          <li class="nav-item">
                            <a href="{{ url('student/my_subject') }}" class="nav-link @if (Request::segment(2) == 'my_subject') active @endif">
                                <i class="nav-icon fa fa-book"></i>
                                <p>
                                  مضامین من
                                </p>
                            </a>
                        </li>
                          <li class="nav-item">
                            <a href="{{ url('student/account') }}" class="nav-link @if (Request::segment(2) == 'account') active @endif">
                                <i class="nav-icon fa fa-book"></i>
                                <p>
                                  حساب کاربری
                                </p>
                            </a>
                        </li>
                          <li class="nav-item">
                            <a href="{{ url('student/change_password') }}" class="nav-link @if (Request::segment(2) == 'change_password') active @endif">
                                <i class="nav-icon fa fa-book"></i>
                                <p>
                                  تغییر رمز کاربر
                                </p>
                            </a>
                        </li>
                        {{-- Parents --}}
                      @elseif (Auth::user()->user_type == 4)
                          <li class="nav-item">
                              <a href="{{ url('parent/dashboard') }}" class="nav-link @if (Request::segment(2) == 'dashboard') active @endif">
                                  <i class="nav-icon fa fa-dashboard"></i>
                                  <p>
                                      داشبورد
                                  </p>
                              </a>
                          </li>
                          <li class="nav-item">
                            <a href="{{ url('parent/my_student') }}" class="nav-link @if (Request::segment(2) == 'my_student') active @endif">
                                <i class="nav-icon fa fa-book"></i>
                                <p>
                                  شاگردان من
                                </p>
                            </a>
                        </li>
                          <li class="nav-item">
                            <a href="{{ url('parent/account') }}" class="nav-link @if (Request::segment(2) == 'account') active @endif">
                                <i class="nav-icon fa fa-book"></i>
                                <p>
                                  حساب کاربری
                                </p>
                            </a>
                        </li>
                          <li class="nav-item">
                            <a href="{{ url('parent/change_password') }}" class="nav-link @if (Request::segment(2) == 'change_password') active @endif">
                                <i class="nav-icon fa fa-book"></i>
                                <p>
                                  تغییر رمز کاربر
                                </p>
                            </a>
                        </li>
                      @endif


                      <!-- Logout button with icon -->
                      <li class="nav-item">
                          <a href="{{ route('admin.logout') }}" class="nav-link"
                              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                              <i style="color: red;" class="nav-icon fa fa-sign-out"></i>
                              <p style="color: red;">
                                  خروج
                              </p>
                          </a>
                          <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                              style="display: none;">
                              @csrf
                          </form>
                      </li>
                  </ul>
              </nav>
              <!-- /.sidebar-menu -->
          </div>
      </div>
      <!-- /.sidebar -->
  </aside>
