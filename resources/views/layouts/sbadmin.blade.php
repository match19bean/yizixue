<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>易子學 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('sb-admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('sb-admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <!-- broccoli style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/broccoli-color.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/artical.css') }}">

</head>
<style>
    input[type="text"],
    select.form-control {
        background: transparent;
        border: none;
        border-bottom: 1px solid #4C2A70;
        -webkit-box-shadow: none;
        box-shadow: none;
        border-radius: 0;
    }

    input[type="text"]:focus,
    select.form-control:focus {
        background: transparent;
        -webkit-box-shadow: none;
        box-shadow: none;
    }

    #upload-img-div {
        background-image: url('');
        background-size: cover;
        background-position: center;
        border: 1px solid #bbb;
    }
</style>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul style="background:#4C2A70" class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home">
                <div class="sidebar-brand-text mx-3">易子學 系統</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="/">
                    <i class="fas fa-compass fa-tachometer-alt"></i>
                    <span>易子學前台</span></a>
            </li>
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/user/profile">
                    <i class="fas fa-user fa-tachometer-alt"></i>
                    <span>個人檔案</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item active">
                <a class="nav-link" href="/bulletinboard">
                    <i class="fa fa-bookmark" aria-hidden="true"></i>
                    <span>佈告欄</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a style="color:white !important" class="nav-link collapsed" href="#" data-toggle="collapse"
                    data-target="#post-list" aria-expanded="false" aria-controls="post-list">
                    <i style="color:white !important" class="fa fa-book" aria-hidden="true"></i>
                    <span>文章管理</span>
                </a>
                <div id="post-list" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar"
                    style="">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('create-post')}}">新增文章</a>
                        <a class="collapse-item" href="{{route('list-all-posts')}}">我的文章</a>
                        <a class="collapse-item" href="{{route('collect-posts')}}">收藏文章</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a style="color:white !important" class="nav-link collapsed" href="#" data-toggle="collapse"
                    data-target="#qa-list" aria-expanded="false" aria-controls="qa-list">
                    <i style="color:white !important" class="fa fa-window-maximize" aria-hidden="true"></i>
                    <span>問與答管理</span>
                </a>
                <div id="qa-list" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar"
                    style="">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/create-qa">新增問題</a>
                        <a class="collapse-item" href="/list-qa">我的問題</a>
                        <a class="collapse-item" href="/collect-qa">收藏問與答</a>
                    </div>
                </div>
            </li>
{{--            <hr class="sidebar-divider">--}}
{{--            <li class="nav-item active">--}}
{{--                <a class="nav-link" href="#">--}}
{{--                    <i class="fa fa-envelope" aria-hidden="true"></i>--}}
{{--                    <span>我的訊息</span></a>--}}
{{--            </li>--}}
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a style="color:white !important" class="nav-link collapsed" href="#" data-toggle="collapse"
                    data-target="#invite-list" aria-expanded="false" aria-controls="invite-list">
                    <i style="color:white !important" class="fa fa-users" aria-hidden="true"></i>
                    <span>學長姊管理</span>
                </a>
                <div id="invite-list" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar"
                    style="">
                    <div class="bg-white py-2 collapse-inner rounded">
{{--                        <a class="collapse-item" href="/user/invite-list">邀請學長姊</a>--}}
                        <a class="collapse-item" href="/user/collect-user">收藏學長姐</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('pay-product-list') }} ">
                    <i class="fa fa-asterisk" aria-hidden="true"></i>
                    <span>付費加值</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('pay-order-list') }}">
                    <i class="fa fa-asterisk" aria-hidden="true"></i>
                    <span>加值服務紀錄</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fa fa-asterisk" aria-hidden="true"></i>
                    <span>聯繫案件</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fa fa-bell" aria-hidden="true"></i>
                    <span>線上客服</span></a>
            </li>
            <hr class="sidebar-divider">

            <!-- Heading -->
{{--            <div class="sidebar-heading">--}}
{{--                Interface--}}
{{--            </div>--}}

            <!-- Nav Item - Pages Collapse Menu -->
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"--}}
{{--                    aria-expanded="true" aria-controls="collapseTwo">--}}
{{--                    <i class="fas fa-fw fa-cog"></i>--}}
{{--                    <span>調整</span>--}}
{{--                </a>--}}
{{--            </li>--}}

            <!-- Divider -->
{{--            <hr class="sidebar-divider d-none d-md-block">--}}

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                @if(!is_null(Auth::user()->avatar))
                                <img class="img-profile rounded-circle"
                                    src="{{ url('/') . '/uploads/' . Auth::user()->avatar }}">
                                @else
                                    <img class="img-profile rounded-circle"
                                         src="{{ url('/') . '/uploads/images/default_avatar.png' }}">
                                @endif
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/user/profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    修改基本資料
                                </a>
{{--                                <a class="dropdown-item" href="#">--}}
{{--                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>--}}
{{--                                    系統設定--}}
{{--                                </a>--}}
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal"
                                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    登出
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Content Wrapper -->
                @yield('content')
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('sb-admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('sb-admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('sb-admin/js/sb-admin-2.min.js') }}"></script>

    <script src="{{ asset('vendor/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('article-ckeditor');
    </script>

    <script>
        $('#OpenImgUpload').click(function() {
            $('#imgInp').trigger('click');
        });


        document.getElementById('imgInp').addEventListener('change', readURL, true);

        function readURL() {
            var file = document.getElementById("imgInp").files[0];
            var reader = new FileReader();
            reader.onloadend = function() {
                document.getElementById('upload-img-div').style.backgroundImage = "url(" + reader.result + ")";
            }
            if (file) {
                reader.readAsDataURL(file);
            } else {}
        }

        imgInp_studentProof.onchange = evt => {
            const [file] = imgInp_studentProof.files
            if (file) {
                blahStudentProof.src = URL.createObjectURL(file)
            }
        }
    </script>

</body>

</html>
