@extends('dashboard')

@section('head_tag_content')
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>

<!-- Custom Stylesheet -->
<link href="{{asset('/css/style.css')}}" rel="stylesheet">
<link href="{{asset('/css/style2.css')}}" rel="stylesheet">

@endsection



@section('body_tag_content')

<!--*******************
        Preloader start
    ********************-->
{{-- <div id="preloader">
    <div class="loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
        </svg>
    </div>
</div> --}}
<!--*******************
        Preloader end
    ********************-->


<!--**********************************
        Main wrapper start
    ***********************************-->
<div id="main-wrapper">

    <!--**********************************
            Nav header start
        ***********************************-->
    <div class="nav-header">
        <div class="brand-logo">
            <a href="index.html">
                <b class="logo-abbr"><img src="images/logo.png" alt=""> </b>
                <span class="logo-compact"><img src="./images/logo-compact.png" alt=""></span>
                <span class="brand-title">KV2_HuongChu  </span>
            </a>
        </div>
    </div>
    <!--**********************************
            Nav header end
        ***********************************-->
    <div class="list-fixed ho">
        <p>DANH SÁCH ho</p>
    </div>
    <div class="list-fixed nhankhau">
        <p>DANH SÁCH nhan khau</p>
    </div>


    <!--**********************************
            Header start
        ***********************************-->
    <div class="header">
        <div class="header-content clearfix">

            <div class="nav-control">
                <div class="hamburger">
                    <span class="toggle-icon"><i class="icon-menu"></i></span>
                </div>
            </div>
            <div class="header-left">
                <div class="input-group icons">

                    <input type="search" class="form-control" placeholder="Search Dashboard" id="myInput" onkeyup="filterTable()"
                        aria-label="Search Dashboard">
                </div>

            </div>
            <div class="header-right">
                <ul class="clearfix">
                    <li class="icons dropdown">
                        <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                            <span class="activity active"></span>
                            <img src="images/user/1.png" height="40" width="40" alt="">
                        </div>
                        <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                            <div class="dropdown-content-body">
                                <ul>
                                    <li>
                                        Số hiệu CAND
                                    </li>
                                    <li>
                                        Họ và tên: Nguyễn Ngọc Minh Khôi
                                    </li>

                                    <hr class="my-2">
                                    <li>
                                        Chức vụ
                                    </li>
                                    <li>
                                        <a href="page-login.html"><i class="icon-key"></i>
                                            <span>Đăng xuất</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

    <!--**********************************
            Sidebar start
        ***********************************-->

    <!--**********************************
            Sidebar end
        ***********************************-->

    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body" >
        <script>

        </script>
        <div id="app">
            <router-view></router-view>
        </div>
    </div>
    <!--**********************************
            Content body end
        ***********************************-->


    <!--**********************************
            Footer start
        ***********************************-->
    <div class="footer">
        <div class="copyright">
            <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a>
                2018</p>
        </div>
    </div>
    <!--**********************************
            Footer end
        ***********************************-->
</div>

<!--**********************************
        Main wrapper end
    ***********************************-->

@endsection


@section('script_tags')
<!--**********************************
        Scripts
    ***********************************-->
<script src="{{asset('/plugins/common/common.min.js')}}"></script>

<script src="{{asset('/js/theme/custom.min.js')}}"></script>
<script src="{{asset('/js/theme/settings.js')}}"></script>
<script src="{{asset('/js/theme/gleek.js')}}"></script>
<script src="{{asset('/js/theme/styleSwitcher.js')}}"></script>

<script src="{{asset('/js/theme/dashboard/dashboard-1.js')}}"></script>

<script src="{{asset('/js/app.js')}}"></script>

<!--this script is for the table filter-->
<script>
function filterTable() {
    // Declare variables
    let input, filter, table, tr, tds;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    // console.log(input);
    // Loop through all table rows, and hide those who don't match the search query
    for (let i = 0; i < tr.length; i++) {
        tds = tr[i].getElementsByTagName("td");
        let txtValues =[];
        for(let j=0; j<tds.length; j++){
            txtValues.push(tds[j].textContent || tds[j].innerText);
        }
        for(let j=0; j<tds.length; j++){
            if ((txtValues[j].toUpperCase().indexOf(filter) > -1)  ) {
                tr[i].style.display = "";
                // console.log(txtValues[j]);
                // console.log(filter);
                break;
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
</script>

<!-- <script src="./js/theme/components/ExampleComponent.js"></script> -->

@endsection
