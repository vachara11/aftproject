<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | AFT PSC </title>

    <!-- Google Font: Source Sans Pro -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=K2D:wght@400;600;700&display=swap"> -->
    <link href="https://cdn.lazywasabi.net/fonts/ChulabhornLikit/ChulabhornLikitText.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('back_end/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('back_end/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('back_end/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('back_end/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('back_end/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('back_end/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('back_end/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('back_end/plugins/summernote/summernote-bs4.min.css') }}">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('back_end/plugins/select2/css/select2.min.css') }}">
    <!-- ปิด Select2 -->

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('back_end/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('back_end/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back_end/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- ปิด DataTables -->
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('baxk_end/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('baxk_end/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet"
        href="{{ asset('baxk_end/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('baxk_end/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('baxk_end/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('baxk_end/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('baxk_end/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{ asset('baxk_end/plugins/bs-stepper/css/bs-stepper.min.css') }}">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{ asset('baxk_end/plugins/dropzone/min/dropzone.min.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('back_end/plugins/fontawesome-free/css/all.min.css') }}">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        .colors {
            background-color: #8b0000;
            color: #ffffff;
        }

        .fontgoogle {
            font-family: 'Chulabhorn Likit Text', sans-serif;
            font-size: 16px;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed fontgoogle">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('back_end/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo"
                height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <button type="submit" class="btn btn-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </button>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary">
            <!-- Brand Logo -->
            <a href="{{ url('/home') }}" class="brand-link colors">
                <img src="{{ asset('back_end/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light"> <strong>
                        <font color="#ffffff"> AFT PSC </font>
                    </strong> </span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <Strong>สวัสดีคุณ : {{ Auth()->user()->name }}</Strong>
                    </div>
                </div>




                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        {{-- superadmin --}}
                        @if (Auth::user()->checkisAdmin() == 1)
                            <li class="nav-item">
                                <a href="{{ route('uindex') }}" class="nav-link">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>
                                        ผู้ใช้
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('comment.show') }}" class="nav-link">
                                    <i class="nav-icon fas fa-comment"></i>
                                    <p>
                                        ความคิดเห็น
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('complaint.show') }}" class="nav-link">
                                    <i class="nav-icon fas fa-comment"></i>
                                    <p>
                                        ร้องเรียน
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('contact.show') }}" class="nav-link">
                                    <i class="nav-icon fas fa-envelope-open-text"></i>
                                    <p>
                                        ข้อความ
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/admin/projectbook/index') }}" class="nav-link">
                                    <i class="nav-icon far fa fa-book" aria-hidden="true"></i>
                                    <p>
                                        แสกนโครงการอวท.
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/admin/bookdepartment/index') }}" class="nav-link">
                                    <i class="nav-icon far fa fa-book" aria-hidden="true"></i>
                                    <p>
                                        แสกนโครงการชมรม
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('admin/Book') }}" class="nav-link">
                                    <i class="nav-icon far fa-paper-plane"></i>
                                    <p>
                                        เลขที่หนังสือส่ง
                                    </p>
                                </a>
                            </li>
                            
                             <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="nav-icon far fa fa-book" aria-hidden="true"></i>
                                    <p>
                                        เลขที่หนังสือส่งชมรม
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                       <a href="{{ url('admin/Accnumber') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>เลขที่หนังสือส่งACC</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('admin/Mjnumber') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>เลขที่หนังสือส่งMJ</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('admin/Itnumber') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>เลขที่หนังสือส่งIT</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('admin/Dmdnumber') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>เลขที่หนังสือส่งDMD</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('admin/Tournumber') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>เลขที่หนังสือส่งTOUR</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                         <a href="{{ url('admin/Foodnumber') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>เลขที่หนังสือส่งFOOD</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('admin/Micenumber') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>เลขที่หนังสือส่งMICE</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                         <a href="{{ url('admin/Dbtnumber') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>เลขที่หนังสือส่งDBT</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            

                            <li class="nav-item">
                                <a href="{{ route('admin.certificate') }}" class="nav-link">
                                    <i class="nav-icon far fa-file"></i>
                                    <p>
                                        ทะเบียนคุมเกียรติบัตร
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.parcel') }}" class="nav-link">
                                    <i class="nav-icon fas fa-box"></i>
                                    <p>
                                        เบิกพัสดุ
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('bank') }}" class="nav-link">
                                    <i class="nav-icon fas fa-university"></i>
                                    <p>
                                        บันทึกรายรับ-รายจ่าย
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('index.dowload') }}" class="nav-link">
                                    <i class="nav-icon fas fa-upload"></i>
                                    <p>
                                        อัพโหลดเอกสาร
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('print') }}" class="nav-link">
                                    <i class="nav-icon fas fa-print"></i>
                                    <p>
                                        บันทึกการปริ้นเอกสาร
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('all.membership') }}" class="nav-link ">
                                    <i class="nav-icon far fa-address-card"></i>
                                    <p>
                                        สมัครสมาชิก
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.pr') }}" class="nav-link">
                                    <i class="nav-icon fas fa-image"></i>
                                    <p>
                                        ประชาสัมพันธ์
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon far fa fa-book" aria-hidden="true"></i>
                                    <p>
                                        สรุปเล่มโครงการ
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('allows.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>ขอนุญาตและอนุมัติ</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon far fa fa-wrench" aria-hidden="true"></i>
                                    <p>
                                        ซ่อมกิจกรรม
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('adminup') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>เอกสารคำร้อง</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('adminre') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>เอกสารรายงาน</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.happyhome') }}" class="nav-link">
                                    <i class="nav-icon fas fa-print"></i>
                                    <p>
                                        Happy Home
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('admin/project/index') }}" class="nav-link">
                                    <i class="nav-icon fas fa-check"></i>
                                    <p>
                                        สถานะเล่มโครงการ
                                    </p>
                                </a>
                            </li>
                    </ul>
                    </li>
                    {{-- พัฒนาวินัย --}}
                @elseif(Auth::user()->checkisAdmin() == 2)
                    <li class="nav-item">
                        <a href="{{ route('admin.happyhome') }}" class="nav-link">
                            <i class="nav-icon fas fa-print"></i>
                            <p>
                                Happy Home
                            </p>
                        </a>
                    </li>
                    {{-- ครูที่ปรึกษาชมรม --}}
                @elseif(Auth::user()->checkisAdmin() == 3)
                    <li class="nav-item">
                        <a href="{{ route('all.membership') }}" class="nav-link ">
                            <i class="nav-icon far fa-address-card"></i>
                            <p>
                                สมัครสมาชิก
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa fa-book" aria-hidden="true"></i>
                            <p>
                                สรุปเล่มโครงการ
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('allows.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>ขอนุญาตและอนุมัติ</p>
                                </a>
                            </li>
                            <!--<li class="nav-item">-->
                            <!--    <a href="{{ route('appoint.index') }}" class="nav-link">-->
                            <!--        <i class="far fa-circle nav-icon"></i>-->
                            <!--        <p>คำสั่งแต่งตั้ง</p>-->
                            <!--    </a>-->
                            <!--</li>-->
                        </ul>
                    </li>
                    {{-- นายกองค์การฯ / รองนายกฯ --}}
                @elseif(Auth::user()->checkisAdmin() == 4)
                    <li class="nav-item">
                        <a href="{{ route('comment.show') }}" class="nav-link">
                            <i class="nav-icon fas fa-comment"></i>
                            <p>
                                ความคิดเห็น
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('contact.show') }}" class="nav-link">
                            <i class="nav-icon fas fa-envelope-open-text"></i>
                            <p>
                                ข้อความ
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('admin/Book') }}" class="nav-link">
                            <i class="nav-icon far fa-paper-plane"></i>
                            <p>
                                เลขที่หนังสือส่ง
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                                <a href="{{ url('/admin/projectbook/index') }}" class="nav-link">
                                    <i class="nav-icon far fa fa-book" aria-hidden="true"></i>
                                    <p>
                                        อัพเล่มแสกนโครงการ
                                    </p>
                                </a>
                            </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.certificate') }}" class="nav-link">
                            <i class="nav-icon far fa-file"></i>
                            <p>
                                ทะเบียนคุมเกียรติบัตร
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.parcel') }}" class="nav-link">
                            <i class="nav-icon fas fa-box"></i>
                            <p>
                                เบิกพัสดุ
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('bank') }}" class="nav-link">
                            <i class="nav-icon fas fa-university"></i>
                            <p>
                                บันทึกรายรับ-รายจ่าย
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('print') }}" class="nav-link">
                            <i class="nav-icon fas fa-print"></i>
                            <p>
                                บันทึกการปริ้นเอกสาร
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('all.membership') }}" class="nav-link ">
                            <i class="nav-icon far fa-address-card"></i>
                            <p>
                                สมัครสมาชิก
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.pr') }}" class="nav-link">
                            <i class="nav-icon fas fa-image"></i>
                            <p>
                                ประชาสัมพันธ์
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa fa-book" aria-hidden="true"></i>
                            <p>
                                สรุปเล่มโครงการ
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('allows.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>ขอนุญาตและอนุมัติ</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                     <li class="nav-item">
                                <a href="{{ url('admin/project/index') }}" class="nav-link">
                                    <i class="nav-icon fas fa-check"></i>
                                    <p>
                                        สถานะเล่มโครงการ
                                    </p>
                                </a>
                            </li>
                            
                             <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="nav-icon far fa fa-book" aria-hidden="true"></i>
                                    <p>
                                        เลขที่หนังสือส่งชมรม
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                       <a href="{{ url('admin/Accnumber') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>เลขที่หนังสือส่งACC</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('admin/Mjnumber') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>เลขที่หนังสือส่งMJ</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('admin/Itnumber') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>เลขที่หนังสือส่งIT</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('admin/Dmdnumber') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>เลขที่หนังสือส่งDMD</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('admin/Tournumber') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>เลขที่หนังสือส่งTOUR</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                         <a href="{{ url('admin/Foodnumber') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>เลขที่หนังสือส่งFOOD</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('admin/Micenumber') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>เลขที่หนังสือส่งMICE</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                         <a href="{{ url('admin/Dbtnumber') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>เลขที่หนังสือส่งDBT</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                                
                            </li>
                   {{-- เลขานุการ --}}
                    @elseif(Auth::user()->checkisAdmin() == 5)
                    <li class="nav-item">
                        <a href="{{ url('admin/Book') }}" class="nav-link">
                            <i class="nav-icon far fa-paper-plane"></i>
                            <p>
                                เลขที่หนังสือส่ง
                            </p>
                        </a>
                    </li>
                     <li class="nav-item">
                                <a href="{{ route('print') }}" class="nav-link">
                                    <i class="nav-icon fas fa-print"></i>
                                    <p>
                                        บันทึกการปริ้นเอกสาร
                                    </p>
                                </a>
                            </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa fa-book" aria-hidden="true"></i>
                            <p>
                                สรุปเล่มโครงการ
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('allows.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>ขอนุญาตและอนุมัติ</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                     <li class="nav-item">
                                <a href="{{ url('admin/project/index') }}" class="nav-link">
                                    <i class="nav-icon fas fa-check"></i>
                                    <p>
                                        สถานะเล่มโครงการ
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.certificate') }}" class="nav-link">
                                    <i class="nav-icon far fa-file"></i>
                                    <p>
                                        ทะเบียนคุมเกียรติบัตร
                                    </p>
                                </a>
                            </li>
                    {{-- นายทะเบียน --}}
                    @elseif(Auth::user()->checkisAdmin() == 6)
                    
                    <li class="nav-item">
                        <a href="{{ route('admin.certificate') }}" class="nav-link">
                            <i class="nav-icon far fa-file"></i>
                            <p>
                                ทะเบียนคุมเกียรติบัตร
                            </p>
                        </a>
                    </li>
                     <li class="nav-item">
                                <a href="{{ route('print') }}" class="nav-link">
                                    <i class="nav-icon fas fa-print"></i>
                                    <p>
                                        บันทึกการปริ้นเอกสาร
                                    </p>
                                </a>
                            </li>
                    <li class="nav-item">
                                <a href="{{ url('admin/Book') }}" class="nav-link">
                                    <i class="nav-icon far fa-paper-plane"></i>
                                    <p>
                                        เลขที่หนังสือส่ง
                                    </p>
                                </a>
                    </li>
                     <li class="nav-item">
                                        <a href="{{ url('admin/Tournumber') }}" class="nav-link">
                                             <i class="nav-icon far fa fa-book" aria-hidden="true"></i>
                                            <p>
                                                เลขที่หนังสือส่งTOUR
                                            </p>
                                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('all.membership') }}" class="nav-link ">
                            <i class="nav-icon far fa-address-card"></i>
                            <p>
                                สมัครสมาชิก
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa fa-book" aria-hidden="true"></i>
                            <p>
                                สรุปเล่มโครงการ
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('allows.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>ขอนุญาตและอนุมัติ</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- เหรัญญิก --}}
                    @elseif(Auth::user()->checkisAdmin() == 7)
                    <li class="nav-item">
                        <a href="{{ url('admin/Book') }}" class="nav-link">
                            <i class="nav-icon far fa-paper-plane"></i>
                            <p>
                                เลขที่หนังสือส่ง
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('print') }}" class="nav-link">
                            <i class="nav-icon fas fa-print"></i>
                            <p>
                                บันทึกการปริ้นเอกสาร
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                                <a href="{{ url('/admin/projectbook/index') }}" class="nav-link">
                                    <i class="nav-icon far fa fa-book" aria-hidden="true"></i>
                                    <p>
                                        อัพเล่มแสกนโครงการ
                                    </p>
                                </a>
                            </li>

                        <li class="nav-item">
                                <a href="{{ route('admin.parcel') }}" class="nav-link">
                                    <i class="nav-icon fas fa-box"></i>
                                    <p>
                                        เบิกพัสดุ
                                    </p>
                                </a>
                            </li>
                    <li class="nav-item">
                        <a href="{{ route('bank') }}" class="nav-link">
                            <i class="nav-icon fas fa-university"></i>
                            <p>
                                บันทึกรายรับ-รายจ่าย
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa fa-book" aria-hidden="true"></i>
                            <p>
                                สรุปเล่มโครงการ
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('allows.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>ขอนุญาตและอนุมัติ</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                     <li class="nav-item">
                                <a href="{{ url('admin/project/index') }}" class="nav-link">
                                    <i class="nav-icon fas fa-check"></i>
                                    <p>
                                        สถานะเล่มโครงการ
                                    </p>
                                </a>
                            </li>
                    {{-- ปฏิคม --}}
                    @elseif(Auth::user()->checkisAdmin() == 8)
      
                    <li class="nav-item">
                        <a href="{{ route('admin.parcel') }}" class="nav-link">
                            <i class="nav-icon fas fa-box"></i>
                            <p>
                                เบิกพัสดุ
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('print') }}" class="nav-link">
                            <i class="nav-icon fas fa-print"></i>
                            <p>
                                บันทึกการปริ้นเอกสาร
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa fa-book" aria-hidden="true"></i>
                            <p>
                                สรุปเล่มโครงการ
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('allows.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>ขอนุญาตและอนุมัติ</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                     <li class="nav-item">
                                <a href="{{ url('admin/project/index') }}" class="nav-link">
                                    <i class="nav-icon fas fa-check"></i>
                                    <p>
                                        สถานะเล่มโครงการ
                                    </p>
                                </a>
                     </li>
                    {{-- ประชาสัมพันธ์ --}}
                    @elseif(Auth::user()->checkisAdmin() == 9)
                    <li class="nav-item">
                        <a href="{{ route('admin.pr') }}" class="nav-link">
                            <i class="nav-icon fas fa-image"></i>
                            <p>
                                ประชาสัมพันธ์
                            </p>
                        </a>
                    </li>
                     <li class="nav-item">
                                <a href="{{ route('print') }}" class="nav-link">
                                    <i class="nav-icon fas fa-print"></i>
                                    <p>
                                        บันทึกการปริ้นเอกสาร
                                    </p>
                                </a>
                            </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa fa-book" aria-hidden="true"></i>
                            <p>
                                สรุปเล่มโครงการ
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('allows.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>ขอนุญาตและอนุมัติ</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    {{-- กรรมการ --}}
                    @elseif(Auth::user()->checkisAdmin() == 10)
                    
                     <li class="nav-item">
                                <a href="{{ route('print') }}" class="nav-link">
                                    <i class="nav-icon fas fa-print"></i>
                                    <p>
                                        บันทึกการปริ้นเอกสาร
                                    </p>
                                </a>
                            </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa fa-book" aria-hidden="true"></i>
                            <p>
                                สรุปเล่มโครงการ
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('allows.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>ขอนุญาตและอนุมัติ</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @elseif(Auth::user()->checkisAdmin() == 11)
                    <li class="nav-item">
                        <a href="{{ url('admin/Book') }}" class="nav-link">
                            <i class="nav-icon far fa-paper-plane"></i>
                            <p>
                                เลขที่หนังสือส่ง
                            </p>
                        </a>
                    </li>
 
                    
                    <!--ชมรมวิชาชีพการบัญชี-->
                    @elseif(Auth::user()->checkisAdmin() == 12)
                    
                    <li class="nav-item">
                        <a href="{{ route('all.membership') }}" class="nav-link ">
                            <i class="nav-icon far fa-address-card"></i>
                            <p>
                                สมัครสมาชิก
                            </p>
                        </a>
                    </li>
                    
                     <li class="nav-item">
                        <a href="{{ url('admin/Accnumber') }}" class="nav-link">
                            <i class="nav-icon far fa fa-book" aria-hidden="true"></i>
                            <p>
                                เลขที่หนังสือส่งACC
                            </p>
                        </a>
                    </li>  

                     
                     <!--ชมรมวิชาชีพการตลาด-->
                     @elseif(Auth::user()->checkisAdmin() == 13)
                     
                        <li class="nav-item">
                            <a href="{{ route('all.membership') }}" class="nav-link ">
                                <i class="nav-icon far fa-address-card"></i>
                                <p>
                                สมัครสมาชิก
                                </p>
                            </a>
                        </li>
                           
                         <li class="nav-item">
                           <a href="{{ url('admin/Mjnumber') }}" class="nav-link">
                               <i class="nav-icon far fa fa-book" aria-hidden="true"></i>
                                <p>
                                    เลขที่หนังสือส่งME
                                </p>
                            </a>
                        </li>
                                    

                             
                    <!--ชมรมวิชาชีพเทคโนโลยีสารสนเทศ-->
                     @elseif(Auth::user()->checkisAdmin() == 14)
                     
                        <li class="nav-item">
                            <a href="{{ route('all.membership') }}" class="nav-link ">
                                <i class="nav-icon far fa-address-card"></i>
                                <p>
                                    สมัครสมาชิก
                                </p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{ url('admin/Itnumber') }}" class="nav-link">
                                <i class="nav-icon far fa fa-book" aria-hidden="true"></i>
                                <p>
                                    เลขที่หนังสือส่งIT
                                </p>
                            </a>
                        </li>
         
         
                    <!--ชมรมวิชาชีพดิจิทัลกราฟิก-->
                     @elseif(Auth::user()->checkisAdmin() == 15)
                     
                        <li class="nav-item">
                            <a href="{{ route('all.membership') }}" class="nav-link ">
                                <i class="nav-icon far fa-address-card"></i>
                                <p>
                                    สมัครสมาชิก
                                </p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{ url('admin/Dmdnumber') }}" class="nav-link">
                                <i class="nav-icon far fa fa-book" aria-hidden="true"></i>
                                <p>
                                    เลขที่หนังสือส่งDMD
                                </p>
                            </a>
                        </li>
                     
 
                           
                     <!--ชมรมวิชาชีพการท่องเที่ยว-->
                     @elseif(Auth::user()->checkisAdmin() == 16)
                     
                        <li class="nav-item">
                            <a href="{{ route('all.membership') }}" class="nav-link ">
                                <i class="nav-icon far fa-address-card"></i>
                                <p>
                                    สมัครสมาชิก
                                </p>
                            </a>
                        </li>
                            
                        <li class="nav-item">
                            <a href="{{ url('admin/Tournumber') }}" class="nav-link">
                                <i class="nav-icon far fa fa-book" aria-hidden="true"></i>
                                <p>
                                    เลขที่หนังสือส่งTOUR
                                </p>
                            </a>
                        </li>
                                    
   
                    
                   <!--ชมรมวิชาชีพอาหารและโภชนาการ-->
                     @elseif(Auth::user()->checkisAdmin() == 17)
                     
                        <li class="nav-item">
                            <a href="{{ route('all.membership') }}" class="nav-link ">
                                <i class="nav-icon far fa-address-card"></i>
                                <p>
                                    สมัครสมาชิก
                                </p>
                            </a>
                        </li>
                            
                        <li class="nav-item">
                            <a href="{{ url('admin/Foodnumber') }}" class="nav-link">
                                <i class="nav-icon far fa fa-book" aria-hidden="true"></i>
                                <p>
                                    เลขที่หนังสือส่งFOOD
                                </p>
                            </a>
                        </li>

                               
                    <!--ชมรมวิชาชีพไมซ์และอีเว้นต์-->
                     @elseif(Auth::user()->checkisAdmin() == 18)
                     
                        <li class="nav-item">
                            <a href="{{ route('all.membership') }}" class="nav-link ">
                                <i class="nav-icon far fa-address-card"></i>
                                <p>
                                    สมัครสมาชิก
                                </p>
                            </a>
                        </li>
                       
                        <li class="nav-item">
                            <a href="{{ url('admin/Micenumber') }}" class="nav-link">
                                <i class="nav-icon far fa fa-book" aria-hidden="true"></i>
                                <p>
                                    เลขที่หนังสือส่งMICE
                                </p>
                            </a>
                        </li>

                             
                    <!--ชมรมวิชาชีพเทคโนโลยีธุรกิจดิจิทัล-->
                     @elseif(Auth::user()->checkisAdmin() == 19)
                     
                        <li class="nav-item">
                            <a href="{{ route('all.membership') }}" class="nav-link ">
                                <i class="nav-icon far fa-address-card"></i>
                                <p>
                                    สมัครสมาชิก
                                </p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{ url('admin/Dbtnumber') }}" class="nav-link">
                                <i class="nav-icon far fa fa-book" aria-hidden="true"></i>
                                <p>
                                    เลขที่หนังสือส่งDBT
                                </p>
                            </a>
                        </li>
                    @endif
                    
                    
                    
                </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">

                    <!-- เนื้อหา -->
                    @yield('contents')
                    <!-- ปิดเนื้อหา -->


                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 2.2.0
            </div>
            <strong>Copyright &copy; 2022 By T.Watchara</strong> IT@PSC
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('back_end/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('back_end/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('back_end/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('back_end/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('back_end/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('back_end/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('back_end/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('back_end/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('back_end/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('back_end/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('back_end/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('back_end/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('back_end/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('back_end/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('back_end/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('back_end/dist/js/pages/dashboard.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('back_end/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('back_end/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('back_end/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('back_end/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('back_end/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('back_end/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('back_end/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('back_end/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('back_end/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('back_end/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('back_end/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('back_end/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('back_end/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": false,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <!-- ปิด DataTables  & Plugins -->
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
</body>

</html>
