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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('sb-admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <!-- broccoli style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('scss_convert/broccoli_style.css') }}">

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
    <div id="wrapper" class="l-collectPost__main">

        <!-- Sidebar -->
        <ul class="l-collectPost__deshSide navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="o-collectPost_btn align-content-center" href="/home">
            <i class="fa fa-home"></i>
            易子學系統
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="o-collectPost_btn" href="/">
                    <i class="bi bi-ui-checks-grid"></i>
                    易子學前台
                </a>
            </li>
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="o-collectPost_btn" href="/user/profile">
                    <i class="bi bi-speedometer"></i>
                    個人檔案
                </a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item active">
                <a class="o-collectPost_btn" href="/bulletinboard">
                    <i class="bi bi-bookmark"></i>
                    佈告欄
                </a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="o-collectPost_btn collapsed" href="#" data-toggle="collapse" data-target="#post-list"
                    aria-expanded="false" aria-controls="post-list">
                    <i style="color:white !important" class="bi bi-book" aria-hidden="true"></i>
                    文章管理
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
                <a style="color:white !important" class="o-collectPost_btn collapsed" href="#"
                    data-toggle="collapse" data-target="#qa-list" aria-expanded="false" aria-controls="qa-list">
                    <i style="color:white !important" class="fa fa-window-maximize" aria-hidden="true"></i>
                    問與答管理
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
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a style="color:white !important" class="o-collectPost_btn collapsed" href="#"
                    data-toggle="collapse" data-target="#invite-list" aria-expanded="false" aria-controls="invite-list">
                    <i style="color:white !important" class="fa fa-users" aria-hidden="true"></i>
                    學長姊管理
                </a>
                <div id="invite-list" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar"
                    style="">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/user/collect-user">收藏學長姐</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item active">
                <a class="o-collectPost_btn" href="{{ route('pay-product-list') }} ">
                    <i class="fa fa-asterisk" aria-hidden="true"></i>
                    付費加值
                </a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item active">
                <a class="o-collectPost_btn" href="{{ route('pay-order-list') }}">
                    <i class="fa fa-asterisk" aria-hidden="true"></i>
                    加值紀錄
                </a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item active">
                <a class="o-collectPost_btn" href="#">
                    <i class="fa fa-asterisk" aria-hidden="true"></i>
                    聯繫案件
                </a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item active">
                <a class="o-collectPost_btn" href="#">
                    <i class="fa fa-bell" aria-hidden="true"></i>
                    線上客服
                </a>
            </li>
            <hr class="sidebar-divider">

            <!-- Heading -->


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="l-collectPost__topbar navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
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

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal" onclick="event.preventDefault();
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

    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('sb-admin/js/sb-admin-2.min.js') }}"></script>

    <script src="{{ asset('vendor/laravel-ckeditor/ckeditor.js') }}"></script>

    <!-- TinyMce editor-->
    <script src="{{ asset('vendor/laravel-admin-ext/tinymce/tinymce/tinymce.min.js')  }}"></script>
    <script>
        // CKEDITOR.replace('article-ckeditor');
        tinymce.init({
            selector: '#article-ckeditor',
            language: 'zh_CN',
            "resize":false,"plugins":"advlist autolink link image lists preview code help fullscreen table autoresize ","toolbar":"undo redo | styleselect | fontsizeselect bold italic | link image blockquote removeformat | indent outdent bullist numlist code","images_upload_url":"\/api\/v1\/images"
        });
    </script>


    <script>
        $('#OpenImgUpload').click(function () {
            $('#imgInp').trigger('click');
        });


        document.getElementById('imgInp').addEventListener('change', readURL, true);

        function readURL() {
            var file = document.getElementById("imgInp").files[0];
            var reader = new FileReader();
            reader.onloadend = function () {
                document.getElementById('upload-img-div').style.backgroundImage = "url(" + reader.result + ")";
            }
            if (file) {
                reader.readAsDataURL(file);
            } else {}
        }

        // imgInp_studentProof.onchange = evt => {
        //     const [file] = imgInp_studentProof.files
        //     if (file) {
        //         blahStudentProof.src = URL.createObjectURL(file)
        //     }
        // }
    </script>

</body>

</html>