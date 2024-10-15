<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>บันทึกการปรื้นเอกสาร อวท. วิทยาลัยเทคโนโลยีพงษ์สวัสดิ์</title>
    <link rel="stylesheet" href="{{asset('css/kv-mpdf-bootstrap.css')}}">
    <style>
      body {
        font-family: 'examplefont', sans-serif;
        font-size: 16pt;
      }
      @page {
	      header: page-header;
	      footer: page-footer;
      }
    </style>
  </head>
  <body>

    <htmlpageheader name="page-header">

    </htmlpageheader>
     <br> <br>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-center">
            <p><img src="{{asset('back_end/image/aft_logo_m.png')}}" width="8%"> </p>
              <p> <strong>
              บันทึกการปรื้นเอกสาร <br>
              องค์การนักวิชาชีพในอนาคตแห่งประเทศไทย วิทยาลัยเทคโนโลยีพงษ์สวัสดิ์
              </strong></p>
            </div>
            <table class="table table-bordered">
            <thead class="thead-light">
              <tr>
                  <th scope="col" class="text-center">ลำดับ</th>
                  <th scope="col" class="text-center">วัน/เดือน/ปี</th>
                  <th scope="col" class="text-center">ภาคเรียน/ปีการศึกษา</th>
                  <th scope="col" class="text-center">ชื่อเอกสาร</th>
                  <th scope="col" class="text-center">จำนวนหน้า</th>
                  <th scope="col" class="text-center">ประเภทเอกสาร</th>
                  <th scope="col" class="text-center">ผู้สั่งปริ้น</th>
                  <th scope="col" class="text-center">ครูที่ปรึกษา</th>
              </tr>
              </thead>
              @foreach ($print as $prints)
              <tbody>
              <tr>
                  <td scope="row">{{$prints->id}}</td>
                  <td width="130">{{$prints->created_at}}</td>
                  <td width="80">{{$prints->year}}</td>
                  <td>{{$prints->name}}</td>
                  <td>{{$prints->count}}</td>
                  <td>{{$prints->type}}</td>
                  <td width="80">{{$prints->fname}}</td>
                  <td width="80"></td>
              </tr>
              </tbody>
              @endforeach
            </table>
          </div>
        </div>
      </div>
      <htmlpagefooter name="page-footer">
	      <p class="text-right">หน้าที่ {PAGENO}</p>
      </htmlpagefooter>
  </body>
</html>
