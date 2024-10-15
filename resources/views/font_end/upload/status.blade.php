<!DOCTYPE html>
<html lang="en">
@include('layouts.font_end.header')
<br><br><br><br><br><br><br>

<!-- DataTables -->
<link rel="stylesheet" href="{{asset('back_end/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('back_end/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('back_end/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<!-- ปิด DataTables -->
<style>
        .colors {
            background-color: #8b0000;
            color: #ffffff;
        }

        .fontgoogle {
            font-family: "K2D", sans-serif;
            font-size: 16px;
        }
    </style>
<div class="container">
<div class="text-center">
        <img src="{{asset('back_end/image/aft_logo_m.png')}}" alt="">
    </div>
<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">ตรวจสอบสถานะเอกสาร</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Portfolio Grid Items-->
        <div class="row justify-content-center">
            <!-- Portfolio Item 1-->
            <div class="col-md-4 col-lg-4 mb-4">
                <a href="{{route('statusup')}}" style="text-decoration:none">
                    <img class="img-fluid" src="{{asset('font_end/image/upload.png')}}" alt="..." />
                    <h4><br>
                        <center>
                            ตรวจสอบสถานะเอกสารคำร้องขอซ่อมกิจกรรม
                        </center>
                    </h4>
                </a>
            </div>
        
            <!-- Portfolio Item 2-->
            <div class="col-md-4 col-lg-4 mb-4">
                <a href="{{route('statusre')}}" style="text-decoration:none">
                    <img class="img-fluid" src="{{asset('font_end/image/folders.png')}}" alt="..." />
                    <h4><br>
                        <center>ตรวจสอบสถานะเอกสารรายงานการซ่อมกิจกรรม</center>
                    </h4>
                </a>
            </div>
            <div class="col-md-4 col-lg-4 mb-4">
                <a href="{{url('happyhome/status')}}" style="text-decoration:none">
                    <img class="img-fluid" src="{{asset('font_end/image/document.png')}}" alt="..." />
                    <h4><br>
                        <center>ตรวจสอบสถานะเอกสารกิจกรรม<br>จิตอาสา PSC Happy Home</center>
                    </h4>
                </a>
            </div>


        </div>
</section>

</div>




<br><br><br>
@include('layouts.font_end.footer')
<!-- DataTables  & Plugins -->
<script src="{{asset('back_end/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('back_end/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('back_end/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('back_end/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('back_end/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('back_end/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('back_end/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('back_end/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('back_end/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('back_end/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('back_end/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('back_end/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('back_end/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
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

    $(function() {
        bsCustomFileInput.init();
    });
</script>
<!-- ปิด DataTables  & Plugins -->

</html>
