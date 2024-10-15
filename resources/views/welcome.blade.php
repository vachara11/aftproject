<!DOCTYPE html>
<html lang="en">
@include('layouts.font_end.header')
<!-- Masthead-->
<header class="masthead text-white text-center jumbotron">
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Avatar Image-->
        <img class="masthead-avatar mb-5" src="{{ asset('font_end/image/aft_logo.png') }}">
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0"><span id="type">อวท.วิทยาลัยเทคโนโลยีพงษ์สวัสดิ์</span></h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0">ASSOCIATION OF FUTURE THAI PROFESSIONAL PONGSAWADI
            TECHNOLOGICAL COLLEGE</p>
    </div>
</header>
<section class="page-section text-white mb-0 colors">
    <div class="container">
        <h2 class="text-center">ข่าวประชาสัมพันธ์</h2> <br><br>

        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">

            <div class="carousel-inner">

                @foreach ($pr as $p)
                    @if ($p->status == 0)
                        <div class="carousel-item active" data-bs-interval="2000">
                            <img src="{{ asset('back_end/image/pr/resize/' . $p->file) }}" class="d-block w-100"
                                alt="...">
                        </div>
                    @endif
                @endforeach

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>
</section>
<!-- Portfolio Section-->
<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">เมนู</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Portfolio Grid Items-->
        <div class="row justify-content-center">
            <!-- Portfolio Item 1-->
            <div class="col-md-6 col-lg-4 mb-5">
                <a href="{{ route('show.fontend') }}" style="text-decoration:none">
                    <img class="img-fluid" src="{{ asset('font_end/image/register.png') }}" alt="..." />
                    <h4><br>
                        <center>
                            กรอกใบสมัครสมาชิก
                        </center>
                    </h4>
                </a>
            </div>
            <!-- Portfolio Item 2-->
            <div class="col-md-6 col-lg-4 mb-5">
                <a href="{{ route('team.show2') }}" style="text-decoration:none">
                    <img class="img-fluid" src="{{ asset('font_end/image/organization.png') }}" alt="..." />
                    <h4><br>
                        <center>คณะกรรมการบริหาร อวท.</center>
                    </h4>
                </a>
            </div>
            <div class="col-md-6 col-lg-4 mb-5">
                <a href="{{ route('team.show') }}" style="text-decoration:none">
                    <img class="img-fluid" src="{{ asset('font_end/image/organization.png') }}" alt="..." />
                    <h4><br>
                        <center>คณะกรรมการดำเนินงาน อวท.</center>
                    </h4>
                </a>
            </div>
            <!-- Portfolio Item 3-->
            <div class="col-md-6 col-lg-4 mb-5">
                <a href="{{ route('team.show1') }}" style="text-decoration:none">
                    <img class="img-fluid" src="{{ asset('font_end/image/organization.png') }}" alt="..." />
                    <h4><br>
                        <center>ครูที่ปรึกษาชมรมวิชาชีพ</center>
                    </h4>
                </a>
            </div>
            <!-- Portfolio Item 4-->
            <div class="col-md-6 col-lg-4 mb-5">
                <a href="{{ url('dowload/dowload') }}" style="text-decoration:none">
                    <img class="img-fluid" src="{{ asset('font_end/image/download.png') }}" alt="..." />
                    <h4><br>
                        <center>ดาวโหลดเอกสาร</center>
                    </h4>
                </a>
            </div>
             <!--Portfolio Item 5 -->
             <div class="col-md-6 col-lg-4 mb-5">
            <a href="{{ route('up.index') }}" style="text-decoration:none">
                   <img class="img-fluid" src="{{ asset('font_end/image/upload.png') }}" alt="..." />
                   <h4><br>
                      <center>ส่งเอกสารคำร้องขอซ่อมกิจกรรม</center>
                   </h4>
                </a>
            </div>
            <!--Portfolio Item 6 -->
             <div class="col-md-6 col-lg-4 mb-5">
                <a href="{{ route('re.index') }}" style="text-decoration:none">
                    <img class="img-fluid" src="{{ asset('font_end/image/folders.png') }}" alt="..." />
                    <h4><br>
                        <center>ส่งรายงานซ่อมกิจกรรม</center>
                    </h4>
                </a>
            </div>
             <!--Portfolio Item 7-->
            <div class="col-md-6 col-lg-4 mb-5">
                <a href="{{ route('status') }}" style="text-decoration:none">
                    <img class="img-fluid" src="{{ asset('font_end/image/web-security.png') }}" alt="..." />
                    <h4><br>
                        <center>ตรวจสอบสถานะเอกสาร</center>
                    </h4>
                </a>
            </div>
            <div class="col-md-6 col-lg-4 mb-5">
                <a href="{{ route('comment') }}" style="text-decoration:none">
                    <img class="img-fluid" src="{{ asset('font_end/image/comment.png') }}" alt="..." />
                    <h4><br>
                        <center>กล่องรับแสดงความคิดเห็น</center>
                    </h4>
                </a>
            </div>
            <div class="col-md-6 col-lg-4 mb-5">
                <a href="{{ route('complaint') }}" style="text-decoration:none">
                    <img class="img-fluid" src="{{ asset('font_end/image/loudspeaker.png') }}" alt="..." />
                    <h4><br>
                        <center>ร้องเรียนปัญหาภายในวิทยาลัย</center>
                    </h4>
                </a>
            </div>
            <div class="col-md-6 col-lg-4 mb-5">
                <a href="{{ route('happyhome.index') }}" style="text-decoration:none">
                    <img class="img-fluid" src="{{ asset('font_end/image/report.png') }}" alt="..." />
                    <h4><br>
                        <center>ส่งรายงานกิจกรรม PSC Happy Home</center>
                    </h4>
                </a>
            </div>
            <div class="col-md-6 col-lg-4 mb-5">
                <a href="{{ url('projectpage/index') }}" style="text-decoration:none">
                    <img class="img-fluid" src="{{ asset('font_end/image/projectbook.png') }}" alt="..." />
                    <h4><br>
                        <center>เล่มโครงการ</center>
                    </h4>
                </a>
            </div>
        </div>
</section>
<!-- About Section-->
<section class="page-section text-white mb-0 colors" id="about">
    <div class="container">
        <!-- About Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-white">ประวัติโดยย่อ</h2>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- About Section Content-->
        <div class="row">
            <div class="col-lg-4 ms-auto">
                <p class="lead fontgoogle ">
                    องค์การนักวิชาชีพในอนาคตแห่งประเทศไทย วิทยาลัยเทคโนโลยีพงษ์สวัสดิ์ ประกาศจัดตั้งเมื่อวันที่ ๕
                    มิถุนายน ๒๕๖๐
                    โดยท่านผู้อำนวยการ วรลักษณ์ ไชยเดชะ ประธานคณะกรรมการบริหารองค์การนักวิชาชีพในอนาคตแห่งประเทศไทย
                    วิทยาลัยเทคโนโลยีพงษ์สวัสดิ์ ในขณะนั้น
                    ลงนามประกาศจัดตั้ง ปัจจุบัน ดร.กัณฐชา จารุจินดา
                    ดำรงตำแหน่งประธานคณะกรรมการบริหารองค์การนักวิชาชีพในอนาคตแห่งประเทศไทย วิทยาลัยเทคโนโลยีพงษ์สวัสดิ์
                    จัดกิจกรรมภายใต้ การพัฒนาสมาชิกให้เป็นคนดีและมีความสุข และ การพัฒนาสมาชิกให้เป็นคนเก่งและมีความสุข
                </p>
            </div>
            <div class="col-lg-4 me-auto">
                <p class="lead fontgoogle ">
                    ซึ่งประกอบด้วยชมรมวิชาชีพ ๘ ชมรม ได้แก่ ชมรมวิชาชีพการบัญชี ชมรมวิชาชีพการตลาด
                    ชมรมวิชาชีพการจัดประชุุมและนิทรรศการ ชมรมวิชาชีพเทคโนโลยีสารสนเทศ ชมรมวิชาชีพคอมพิวเตอร์กราฟิก
                    ชมรมวิชาชีพดิจิทัลกราฟิก
                    ชมรมวิชาชีพการท่องเที่ยว และชมรมวิชาชีพอาหารและโภชนาการ
                     <h6 class="mt-2">รายชื่อนายกองค์การฯ ตั้งแต่ปีการศึกษา ๒๕๖๒-ปัจจุบันดังนี้ :</h6>
                    <ul class="list-style-one clearfix">
                        <li>ปีการศึกษา ๒๕๖๒ : นายชฏิล  ชื่นชูจิตร์</li>
                        <li>ปีการศึกษา ๒๕๖๓ : นายสิรภพ  ปานโชติ</li>
                        <li>ปีการศึกษา ๒๕๖๔ : นางสาวเดียร์  บุญญฐิติพันธ์</li>
                        <li>ปีการศึกษา ๒๕๖๕ : นางสาวมัณฑนา  ปั่นสุข</li>
                        <li>ปีการศึกษา ๒๕๖๖ : นางสาวปาริชาติ  ปานมี</li>
                        <li>ปีการศึกษา ๒๕๖๗ : นายวสุรัตน์  ครุฑสุวรรณ</li>
                    </ul>
                </p>
            </div>
        </div>
        <!-- About Section Button-->
        <div class="text-center mt-4">
            <a class="btn btn-xl btn-outline-light fontgoogle" href="{{ asset('font_end/aft/AFT01.pdf') }}"
                target="_blank">
                <i class="fas fa-download me-2"></i>
                Download แบบอวท.๐๑/๑
            </a>
        </div>
    </div>
</section>
<!-- Contact Section-->
<!--<section class="page-section" id="contact">-->
<!--    <div class="container">-->
        <!-- Contact Section Heading-->
<!--        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Contact Me</h2>-->
        <!-- Icon Divider-->
<!--        <div class="divider-custom">-->
<!--            <div class="divider-custom-line"></div>-->
<!--            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>-->
<!--            <div class="divider-custom-line"></div>-->
<!--        </div>-->
        <!-- Contact Section Form-->
<!--        <div class="row justify-content-center fontgoogle">-->
<!--            <div class="col-lg-8 col-xl-7">-->
                <!-- * * * * * * * * * * * * * * *-->
                <!-- * * SB Forms Contact Form * *-->
                <!-- * * * * * * * * * * * * * * *-->
                <!-- This form is pre-integrated with SB Forms.-->
                <!-- To make this form functional, sign up at-->
                <!-- https://startbootstrap.com/solution/contact-forms-->
                <!-- to get an API token!-->
<!--                <form action="{{ route('contact.insert') }}" method="POST">-->
<!--                    @csrf-->
                    <!-- Name input-->
<!--                    <div class="form-floating mb-3">-->
<!--                        <input class="form-control" name="name" type="text" placeholder="Enter your name...">-->
<!--                        <label for="name">Full name</label>-->
<!--                    </div>-->
<!--                    @error('name')-->
<!--                        <span class="text-danger">{{ $message }}</span>-->
<!--                    @enderror-->
                    <!-- Email address input-->
<!--                    <div class="form-floating mb-3">-->
<!--                        <input class="form-control" name="email" type="email" placeholder="name@example.com">-->
<!--                        <label for="email">Email address</label>-->
<!--                    </div>-->
<!--                    @error('email')-->
<!--                        <span class="text-danger">{{ $message }}</span>-->
<!--                    @enderror-->
                    <!-- Phone number input-->
<!--                    <div class="form-floating mb-3">-->
<!--                        <input class="form-control" name="phone" type="tel" placeholder="09x-xxx-xxxx">-->
<!--                        <label for="phone">Phone number</label>-->
<!--                    </div>-->
<!--                    @error('phone')-->
<!--                        <span class="text-danger">{{ $message }}</span>-->
<!--                    @enderror-->
                    <!-- Message input-->
<!--                    <div class="form-floating mb-3">-->
<!--                        <textarea class="form-control" name="message" type="text" placeholder="Enter your message here..."-->
<!--                            style="height: 10rem"></textarea>-->
<!--                        <label for="message">Message</label>-->
<!--                    </div>-->
<!--                    @error('message')-->
<!--                        <span class="text-danger">{{ $message }}</span>-->
<!--                    @enderror-->
                    <!-- Submit Button--> <br> <br>
<!--                    <button class="btn btn-primary" type="submit">Send</button>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="fb-customerchat" page_id="110410107089433"></div>-->
<!--</section>-->
@include('layouts.font_end.footer')
@if (session()->has('status'))
    <script>
        swal("<?php echo session()->get('status'); ?>", "", "success");
    </script>
@endif

<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId: '1029344700940662',
            autoLogAppEvents: true,
            xfbml: true,
            version: 'v12.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.11"></script>
<script>
    var typed = new Typed('#type', {
        // Waits 1000ms after typing "First"
        strings: ['AFT.PSC', 'อวท.วิทยาลัยเทคโนโลยีพงษ์สวัสดิ์'],
        smartBackspace: true,
        loop: true,
        typeSpeed: 100,
        backSpeed: 100,
        fadeOut: true,
    });
</script>


</html>
