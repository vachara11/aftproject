<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หนังสือขออนุมัติจัดทำโครงการ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css" />

    <style>
        body {
            font-family: 'examplefont', sans-serif;
            font-size: 16pt;
        }

        a {
            line-height: 30px;
            vertical-align: middle;
            border-bottom-width: 1px;
            border-bottom-style: dashed;
            text-decoration: none;
            padding-bottom: 20px;
            color: #000000;
        }

        @page {
            header: page-header;
            footer: page-footer;
        }
        .my_space {
        line-height: 25px;
    }
    </style>
</head>

<body>
    <htmlpageheader name="page-header">
        <div class="container">
            <table class="table table-bordered border-primary">
                <tr class="border-bottom">
                    <td class="text-center">
                        
                        <img src="{{base_path('public/images/psclogo.png')}}" alt=""><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <b>Pongsawadi Technological College <br>
                            บันทึกภายใน <br>
                            ROUTING SLIP <br></b>
                    </td>
                    <td class="border-start"> <br>
                        <p>&nbsp;&nbsp;<b>ถึง</b> &nbsp;ผู้อำนวยการวิทยาลัยเทคโนโลยีพงษ์สวัสดิ์ <br></p>
                        <p>&nbsp;&nbsp;<b>จาก</b> องค์การนักวิชาชีพในอนาคตแห่งประเทศไทย <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วิทยาลัยเทคโนโลยีพงษ์สวัสดิ์ <br></p>
                        <p>&nbsp;&nbsp;<b>วันที่</b>&nbsp;{{ $allow->datewr1 }} <br></p>
                        <p>&nbsp;&nbsp;<b>เลขที่</b> {{ $allow->number1 }}</p>
                    </td>
                </tr>
            </table>
            <div class="mx-3">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; เพื่อทราบ
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  เพื่ออนุมัติ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  เพื่อพิจารณา
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  เพื่อดำเนินการต่อไป &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  อื่น ๆ <br>
            </div>
            <div class="mx-5">

                <b>เรื่อง</b>
                ขออนุมัติจัดทำ{{ $allow->name }} <br>

                <b>สิ่งที่แนบมาด้วย</b> แบบเสนอ{{ $allow->name }}  <br>
                <p style="text-align:justify;" class="my_space">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ด้วยองค์การนักวิชาชีพในอนาคตแห่งประเทศไทยวิทยาลัยเทคโนโลยีพงษ์สวัสดิ์ได้กำหนดจัดทำ {{ $allow->name." ".$allow->date." ".$allow->location." ".$allow->activity." ".$allow->objective}}  <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ดังนั้นองค์การนักวิชาชีพในอนาคตแห่งประเทศไทยวิทยาลัยเทคโนโลยีพงษ์สวัสดิ์จึงขออนุมัติจัดทำ {{ $allow->name }} รายละเอียดดังเอกสารที่แนบมานี้ <br>
               <div class="mt-2">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จึงเรียนมาเพื่อโปรดทราบและพิจารณาอนุมัติ
               </div>
                </p>
                <div class="mt-2 my_space">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ลงชื่อ....................................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ลงชื่อ........................................................ <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( นางสาวมัณฑนา  ปั่นสุข )&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( นายวัชระ   เกตุแก้ว ) <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;นายกองค์การฯ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ครูที่ปรึกษาองค์การนักวิชาชีพฯ 
                </div>

                <div class="mt-2 my_space">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ลงชื่อ....................................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ลงชื่อ....................................................... <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( นายณัฏฐพงษ์   พานิชย์ )&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( นางสุภัททา  สำลีพันธ์ ) <br> 
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หัวหน้างานกิจกรรมนักเรียน  นักศึกษา&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รองผู้อำนวยการฝ่ายแผนงานและทรัพยากรบุคคล
                </div>
                          
               <div class="mt-2 my_space">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ลงชื่อ....................................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ลงชื่อ....................................................... <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( นางนุสรา  เง่อเขียว )&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( นางสาวจิรพร  วิทยกิจพิพัฒน์ ) <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รองผู้อำนวยการฝ่ายวิชาการ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รองผู้อำนวยการฝ่ายกิจการนักศึกษา
               </div>

<div class="text-center mt-2 my_space">
    ลงชื่อ.................................................... <br>
(ดร.กัณฐชา  จารุจินดา) <br>
ผู้อำนวยการวิทยาลัยเทคโนโลยีพงษ์สวัสดิ์
</div>

            </div>



        </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html>
