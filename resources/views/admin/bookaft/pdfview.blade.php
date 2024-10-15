<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>เลขทะเบียนหนังสือส่ง อวท. วิทยาลัยเทคโนโลยีพงษ์สวัสดิ์</title>
    <link rel="stylesheet" href="{{asset('css/kv-mpdf-bootstrap.css')}}">
    <style>
      body {
        font-family: 'examplefont', sans-serif;
        font-size:16pt;
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
              เลขทะเบียนหนังสือส่ง <br>
              องค์การนักวิชาชีพในอนาคตแห่งประเทศไทย วิทยาลัยเทคโนโลยีพงษ์สวัสดิ์
              </strong></p>

            </div>
            <table class="table table-bordered">
            <thead class="thead-light">
              <tr>
                  <th scope="col" class="text-center">เลขทะเบียนหนังสือส่ง</th>
                  <th scope="col" class="text-center">ลงวันที่</th>
                  <th scope="col" class="text-center">จาก</th>
                  <th scope="col" class="text-center">ถึง</th>
                  <th scope="col" class="text-center">เรื่อง</th>
                  <th scope="col" class="text-center">การปฎิบัติ</th>
                  <th scope="col" class="text-center">หมายเหตุ</th>
              </tr>
              </thead>
              @foreach ($books as $book)
              <tbody>
              <tr>
                  <td scope="row">{{$book->number}}</td>
                  <td width="130">{{$book->date}}</td>
                  <td width="200">{{$book->go}}</td>
                  <td>{{$book->to}}</td>
                  <td>{{$book->content}}</td>
                  <td>{{$book->practice}}</td>
                  <td width="80">{{$book->note}}</td>
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
