<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายงานจิตอาสากิจกรรม PSC Happy Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
            color:#000000;
        }

        @page {
            header: page-header;
            footer: page-footer;
        }
    </style>
</head>

<body>
    <htmlpageheader name="page-header">
    <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       
    </htmlpageheader>
    <div class="row mt-5 text-center">
        <img src="{{ asset('back_end/image/psc_logo.png') }}" width="100" alt=""> <br>
        รายงานจิตอาสา กิจกรรม PSC Happy Home
    </div> 
    <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ชื่อกิจกรรม : {{ $happyhome->activity }} <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จัดทำโดย  : {{ $happyhome->name }} <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ระดับชั้น  : {{ $happyhome->class."/".$happyhome->room }} <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;สาขาวิชา  : {{ $happyhome->department }} <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ทำกิจกรรมเมื่อวันที่ : {{ $happyhome->time }} <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;สถานที่ทำกิจกรรม : {{ $happyhome->location }} <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;สิ่งที่ได้จากการทำกิจกรรม : {{ $happyhome->benefit }} <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ภาพกิจกรรม
    <center>
        <div class="row mt-5">
            <div class="col mt-5">
                <div class="card text-center">
                    <img src="{{ asset('font_end/multi/'.$happyhome->file) }}" width="200" height="400" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">ภาพที่ 1</h5>
                    </div>
                  </div>
            </div>
            <div class="col mt-5 ">
                <div class="card text-center">
                    <img src="{{ asset('font_end/multi/'.$happyhome->file1) }}" width="200" height="400" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">ภาพที่ 2</h5>
                    </div>
                  </div>
            </div>
        </div>
    
        <div class="row mt-5">
            <div class="col mt-5">
                <div class="card text-center">
                    <img src="{{ asset('font_end/multi/'.$happyhome->file2) }}" width="200" height="400" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">ภาพที่ 3</h5>
                    </div>
                  </div>
            </div>
            <div class="col mt-5 ">
                <div class="card text-center">
                    <img src="{{ asset('font_end/multi/'.$happyhome->file3) }}" width="200" height="400" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">ภาพที่ 4</h5>
                    </div>
                  </div>
            </div>
        </div>
    
    </center>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>
