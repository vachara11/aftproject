<?php

use App\Pr;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome')
    ->with("pr", Pr::all());
});

Auth::routes();

Route::middleware(['auth','verifyIsAdmin'])->group(function(){

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/index','Admin\BookaftController@useradmin')->name('uindex');

//Admin Professional club membership
//Route::get('user/from', 'AftController@create')->name('from');
Route::get('membership/Professional/index','MembershipController@show')->name('all.membership');
Route::get('membership/Professional/insert','MembershipController@insert')->name('show.membership');
Route::post('membership/Professional/store','MembershipController@store')->name('store.membership');
Route::get('membership/Professional/edit/{id}','MembershipController@edit');
Route::post('membership/update/{id}','MembershipController@update');
Route::get('membership/delete/{id}','MembershipController@delete');
Route::get('membership/search/','MembershipController@search');

//เลขที่หนังสือออก อวท.
Route::get('admin/createBook', 'Admin\BookaftController@create')->name('BookForm');
Route::post('admin/createBook', 'Admin\BookaftController@store');
Route::get('admin/editBook/{id}', 'Admin\BookaftController@edit');
Route::post('admin/updateBook/{id}', 'Admin\BookaftController@update');
Route::get('admin/delete/{id}', 'Admin\BookaftController@delete');
Route::get('admin/Book', 'Admin\BookaftController@index');
Route::get('admin/pdfreport', 'Admin\BookaftController@pdfreport');

//เลขที่หนังสือออก ชมรมวิชาชีพการบัญชี
Route::get('admin/createAccnumber', 'Admin\BookdepartmentController@create')->name('BookAccnumber');
Route::post('admin/createAccnumber', 'Admin\BookdepartmentController@store');
Route::get('admin/editAccnumber/{id}', 'Admin\BookdepartmentController@edit');
Route::post('admin/updateAccnumber/{id}', 'Admin\BookdepartmentController@update');
Route::get('admin/deleteAccnumber/{id}', 'Admin\BookdepartmentController@delete');
Route::get('admin/Accnumber', 'Admin\BookdepartmentController@index');

//เลขที่หนังสือออก ชมรมวิชาชีพการตลาด
Route::get('admin/createMjnumber', 'Admin\BookdepartmentController@createmj')->name('BookMjnumber');
Route::post('admin/createMjnumber', 'Admin\BookdepartmentController@storemj');
Route::get('admin/editMjnumber/{id}', 'Admin\BookdepartmentController@editmj');
Route::post('admin/updateMjnumber/{id}', 'Admin\BookdepartmentController@updatemj');
Route::get('admin/deleteMjnumber/{id}', 'Admin\BookdepartmentController@deletemj');
Route::get('admin/Mjnumber', 'Admin\BookdepartmentController@indexmj');

//เลขที่หนังสือออก ชมรมวิชาชีพเทคโนโลยีสารสนเทศ
Route::get('admin/createItnumber', 'Admin\BookdepartmentController@createit')->name('BookItnumber');
Route::post('admin/createItnumber', 'Admin\BookdepartmentController@storeit');
Route::get('admin/editItnumber/{id}', 'Admin\BookdepartmentController@editit');
Route::post('admin/updateItnumber/{id}', 'Admin\BookdepartmentController@updateit');
Route::get('admin/deleteItnumber/{id}', 'Admin\BookdepartmentController@deleteit');
Route::get('admin/Itnumber', 'Admin\BookdepartmentController@indexit');

//เลขที่หนังสือออก ชมรมวิชาชีพดิจิทัลกราฟิก
Route::get('admin/createDmdnumber', 'Admin\BookdepartmentController@createdmd')->name('BookDmdnumber');
Route::post('admin/createDmdnumber', 'Admin\BookdepartmentController@storedmd');
Route::get('admin/editDmdnumber/{id}', 'Admin\BookdepartmentController@editdmd');
Route::post('admin/updateDmdnumber/{id}', 'Admin\BookdepartmentController@updatedmd');
Route::get('admin/deleteDmdnumber/{id}', 'Admin\BookdepartmentController@deletedmd');
Route::get('admin/Dmdnumber', 'Admin\BookdepartmentController@indexdmd');

//เลขที่หนังสือออก ชมรมวิชาชีพการท่องเที่ยว
Route::get('admin/createTournumber', 'Admin\BookdepartmentController@createdtour')->name('BookTournumber');
Route::post('admin/createTournumber', 'Admin\BookdepartmentController@storetour');
Route::get('admin/editTournumber/{id}', 'Admin\BookdepartmentController@editdtour');
Route::post('admin/updateTournumber/{id}', 'Admin\BookdepartmentController@updatetour');
Route::get('admin/deleteTournumber/{id}', 'Admin\BookdepartmentController@deletetour');
Route::get('admin/Tournumber', 'Admin\BookdepartmentController@indextour');

//เลขที่หนังสือออก ชมรมวิชาชีพอาหารและโภชนาการ
Route::get('admin/createFoodnumber', 'Admin\BookdepartmentController@createdfood')->name('BookFoodnumber');
Route::post('admin/createFoodnumber', 'Admin\BookdepartmentController@storefood');
Route::get('admin/editFoodnumber/{id}', 'Admin\BookdepartmentController@editdfood');
Route::post('admin/updateFoodnumber/{id}', 'Admin\BookdepartmentController@updatefood');
Route::get('admin/deleteFoodnumber/{id}', 'Admin\BookdepartmentController@deletefood');
Route::get('admin/Foodnumber', 'Admin\BookdepartmentController@indexfood');

//เลขที่หนังสือออก ชมรมวิชาชีพไมซ์และอีเว้นต์
Route::get('admin/createMicenumber', 'Admin\BookdepartmentController@createdmice')->name('BookMicenumber');
Route::post('admin/createMicenumber', 'Admin\BookdepartmentController@storemice');
Route::get('admin/editMicenumber/{id}', 'Admin\BookdepartmentController@editmice');
Route::post('admin/updateMicenumber/{id}', 'Admin\BookdepartmentController@updatemice');
Route::get('admin/deleteMicenumber/{id}', 'Admin\BookdepartmentController@deletedmice');
Route::get('admin/Micenumber', 'Admin\BookdepartmentController@indexmice');

//เลขที่หนังสือออก ชมรมวิชาชีพเทคโนโลยีธุรกิจดิจิทัล
Route::get('admin/createDbtnumber', 'Admin\BookdepartmentController@createddbt')->name('BookDbtnumber');
Route::post('admin/createDbtnumber', 'Admin\BookdepartmentController@storedbt');
Route::get('admin/editDbtnumber/{id}', 'Admin\BookdepartmentController@editdbt');
Route::post('admin/updateDbtnumber/{id}', 'Admin\BookdepartmentController@updatedbt');
Route::get('admin/deleteDbtnumber/{id}', 'Admin\BookdepartmentController@deletedbt');
Route::get('admin/Dbtnumber', 'Admin\BookdepartmentController@indexdbt');


//ดาวโหลดเอกสาร
Route::get('dowload/delete/{id}', 'Admin\DowloadController@delete');
Route::get('dowload/admindowload', 'Admin\DowloadController@index')->name('index.dowload');
Route::get('dowload/create', 'Admin\DowloadController@create');
Route::post('dowload/create', 'Admin\DowloadController@store');
Route::get('dowload/edit/{id}', 'Admin\DowloadController@edit');
Route::post('dowload/update/{id}', 'Admin\DowloadController@update');


//ตรวจเอกสารหลังบ้าน
Route::get('admin/upload/index','Admin\FileController@upindex')->name('adminup');
Route::get('admin/upload/createup','Admin\FileController@createup')->name('createup');
Route::post('admin/upload/storeup','Admin\FileController@storeup')->name('adminstoreup');
Route::get('admin/status/upload/editup/{id}','Admin\FileController@editup');
Route::post('admin/status/upload/uploadup/{id}','Admin\FileController@updateup');
Route::get('admin/status/upload/deleteup/{id}','Admin\FileController@delup');
Route::post('admin/status/pass/{id}','Admin\FileController@insertpass');
Route::get('admin/status/comment/{id}','Admin\FileController@admincom');
Route::post('admin/status/insetcom/{id}','Admin\FileController@insertcom');
Route::post('/admin/upload/open/{id}','Admin\FileController@open');
Route::post('/admin/upload/end/{id}','Admin\FileController@end');
Route::post('/admin/report/open/{id}','Admin\FileController@openre');
Route::post('/admin/report/end/{id}','Admin\FileController@endre');

//ส่งรายงาน
Route::get('admin/report/index','Admin\FileController@reindex')->name('adminre');
Route::get('admin/report/createre','Admin\FileController@createre')->name('createre');
Route::post('admin/report/storere','Admin\FileController@storere')->name('adminstorere');
Route::get('admin/status/report/editre/{id}','Admin\FileController@editre');
Route::post('admin/status/report/reportre/{id}','Admin\FileController@updatere');
Route::get('admin/status/report/deletere/{id}','Admin\FileController@delre');
Route::post('admin/status/passre/{id}','Admin\FileController@insertpassre');
Route::get('admin/status/commentre/{id}','Admin\FileController@admincomre');
Route::post('admin/status/insetcomre/{id}','Admin\FileController@insertcomre');

//รายการปริ้นเอกสาร
Route::get('admin/print/index','Admin\PrintController@index')->name('print');
Route::get('admin/print/create','Admin\PrintController@create')->name('printcreate');
Route::post('admin/print/insert','Admin\PrintController@insert')->name('printinsert');
Route::get('admin/print/edit/{id}','Admin\PrintController@edit');
Route::post('admin/print/update/{id}','Admin\PrintController@update');
Route::get('admin/print/delete/{id}','Admin\PrintController@delete');
Route::get('admin/print/PDF','Admin\PrintController@pdf')->name('p.pdf');

//หนังอนุญาตและอนุมัติโครงการ
Route::get('admin/allows/index','Admin\AllowsController@index')->name('allows.index');
Route::get('admin/allows/insert','Admin\AllowsController@insert')->name('allows.insert');
Route::post('admin/allows/create','Admin\AllowsController@create')->name('allows.create');
Route::post('admin/allow/update/{id}','Admin\AllowsController@update');
Route::get('admin/allows/delete/{id}','Admin\AllowsController@delete');
Route::get('admin/allows/edit/{id}','Admin\AllowsController@edit');
Route::get('admin/allows/reportpdf/{id}','Admin\AllowsController@reportallow');
Route::get('admin/excuseme/reportpdf/{id}','Admin\AllowsController@reportexcuseme');

//หนังสือคำสั่งแต่งตั้ง
Route::get('admin/appoint/index','Admin\AppointController@index')->name('appoint.index');
Route::get('admin/appoint/insert','Admin\AppointController@insert')->name('appoint.insert');
Route::post('admin/appoint/create','Admin\AppointController@create')->name('admin.create');
Route::get('admin/appoint/edit/{id}','Admin\AppointController@edit');
Route::post('admin/appoint/update/{id}','Admin\AppointController@update');
Route::get('admin/appoint/delete/{id}','Admin\AppointController@delete');
Route::get('admin/appoint/reportpdf/{id}','Admin\AppointController@reportpdf');

//ทะเบียนคุมเกียรติบัตร
Route::get('admin/certificate/index','Admin\CertificateController@index')->name('admin.certificate');
Route::get('admin/certificate/create','Admin\CertificateController@create');
Route::post('admin/certificate/insert','Admin\CertificateController@insert');
Route::get('admin/certificate/delete/{id}','Admin\CertificateController@delete');
Route::get('admin/certificate/edit/{id}','Admin\CertificateController@edit');
Route::post('admin/certificate/update/{id}','Admin\CertificateController@update');

//เบิกพัสดุ
Route::get('admin/parcel/index','Admin\ParcelController@index')->name('admin.parcel');
Route::get('admin/parcel/create','Admin\ParcelController@create');
Route::get('admin/parcel/delete/{id}','Admin\ParcelController@delete');
Route::get('admin/parcel/edit/{id}','Admin\ParcelController@edit');
Route::post('admin/parcel/insert','Admin\ParcelController@insert');
Route::post('admin/parcel/update/{id}','Admin\ParcelController@update');


//กล่องแสดงความคิดเห็น
Route::get('/comment/show','CommenController@show')->name('comment.show');
Route::get('/comment/delete/{id}','CommenController@delete');

//เรื่องร้องเรียน
Route::get('/complaint/show','ComplaintController@show')->name('complaint.show');
Route::get('/complaint/delete/{id}','ComplaintController@delete');

//ส่งรายงานกิจกรรม Happy Home
Route::get('/admin/happyhome/index','HappyhomeController@show')->name('admin.happyhome');
Route::get('/admin/haapyhome/edit/{id}','HappyhomeController@edit');
Route::get('/admin/haapyhome/delete/{id}','HappyhomeController@delete');
Route::post('/admin/happyhome/insertcomment/{id}','HappyhomeController@insertcomment');
Route::post('/admin/happyhome/pass/{id}','HappyhomeController@pass');
Route::get('/admin/happyhome/comment/{id}','HappyhomeController@comment');
Route::post('/admin/happyhome/update/{id}','HappyhomeController@update');
Route::post('/admin/happyhome/open/{id}','HappyhomeController@open');
Route::post('/admin/happyhome/end/{id}','HappyhomeController@end');
Route::get('/happyhome/PDF/{id}','HappyhomeController@pdfreport');
});


//Font_end Membership
Route::get('membership/font-end/index','MembershipController@showfontend')->name('show.fontend');
Route::post('membership/font-end/store','MembershipController@storefontend')->name('store.fontend');
Route::get('membership/font-end/searchdata','MembershipController@datasearchfontend')->name('datasearch.fontend');
Route::get('membership/font-end/search/','MembershipController@fontendsearch');
Route::get('membership/Professional/font_end/edit/{id}','MembershipController@editfontend');
Route::post('membership/font_end/update/{id}','MembershipController@fontendupdate');
Route::get('membership/PDF/{id}','MembershipController@pdfreport');
Route::get('membership/PDF/AFT/{id}','MembershipController@pdfaft');

//Font_end Teams
Route::get('Teams/index','TeamsController@show')->name('team.show');
Route::get('Teams/teacher/index','TeamsController@show1')->name('team.show1');
Route::get('Teams/manage/index','TeamsController@show2')->name('team.show2');

//contact
Route::get('contact/index','ContactController@show')->name('contact.show');
Route::post('contact/insert','ContactController@insert')->name('contact.insert');
Route::post('contact/insert/status/{id}','ContactController@insert1');
Route::post('contact/delete/status/{id}','ContactController@delete1');
Route::get('contact/delete/{id}','ContactController@delete');
Route::get('contact/search','ContactController@search');

//ดาวโหลดเอกสาร
Route::get('dowload/dowload', 'Admin\DowloadController@index1');


//เอกสารหน้าบ้าน
Route::get('upload/index','FileController@upindex')->name('up.index');
Route::get('report/index','FileController@reindex')->name('re.index');
Route::post('upload/storeup','FileController@storeup')->name('storeup');
Route::post('upload/storere','FileController@storere')->name('storere');
Route::get('status/index','FileController@status')->name('status');
Route::get('status/upload','FileController@statusup')->name('statusup');
Route::get('status/report','FileController@statusre')->name('statusre');
Route::get('status/upload/editup/{id}','FileController@editup');
Route::get('status/upload/editre/{id}','FileController@editre');
Route::post('status/upload/uploadup/{id}','FileController@updateup');
Route::post('status/upload/uploadre/{id}','FileController@updatere');

//กล่องแสดงความคิดเห็น
Route::get('/comment/index','CommenController@index')->name('comment');
Route::post('/comment/create','CommenController@create')->name('comment.create');

//ร้องเรียนปัญหา
Route::get('/complaint/index','ComplaintController@index')->name('complaint');
Route::post('/complaint/create','ComplaintController@create')->name('complaint.create');


//ส่งรายงานกิจกรรม Happy Home
Route::get('/happyhome/index','HappyhomeController@index')->name('happyhome.index');
Route::get('/happyhome/status','HappyhomeController@status');
Route::get('/status/happyhome/statusedit/{id}','HappyhomeController@statusedit');
Route::post('/status/happyhome/statusupdate/{id}','HappyhomeController@statusupdate');
Route::post('/happyhome/create','HappyhomeController@create');


//ประชาสัมพันธ์กิจกรรม
Route::get('/admin/pr/index','Admin\PrController@index')->name('admin.pr');
Route::get('/admin/pr/create','Admin\PrController@create')->name('pr.create');
Route::post('/admin/pr/insert','Admin\PrController@insert');
Route::get('/admin/pr/edit/{id}','Admin\PrController@edit');
Route::post('/admin/pr/update/{id}','Admin\PrController@update');
Route::get('/admin/pr/delete/{id}','Admin\PrController@delete');
Route::post('/admin/pr/open/{id}','Admin\PrController@open');
Route::post('/admin/pr/end/{id}','Admin\PrController@end');


//รายรับ-รายจ่าย
Route::get('/admin/bank/index','Admin\BankController@index')->name('bank');
Route::get('/admin/bank/create','Admin\BankController@create');
Route::post('/admin/bank/insert','Admin\BankController@insert');
Route::post('/admin/bank/update/{id}','Admin\BankController@update');
Route::get('/admin/bank/edit/{id}','Admin\BankController@edit');
Route::get('/admin/bank/delete/{id}','Admin\BankController@delete');

//สถานะเอกสารเล่มโครงการ
Route::get('/admin/project/index','Admin\ProjectController@index');
Route::get('/admin/project/insert','Admin\ProjectController@insert');
Route::post('/admin/project/create','Admin\ProjectController@create');
Route::get('/admin/project/edit/{id}','Admin\ProjectController@edit');
Route::post('/admin/project/update/{id}','Admin\ProjectController@update');
Route::get('/admin/project/delete/{id}','Admin\ProjectController@delete');
Route::post('/admin/project/pass/{id}','Admin\ProjectController@pass');

//อัพเล่มโครงการvวท. หลังบ้าน
Route::get('/admin/projectbook/index','Admin\ProjcetbookController@index');
Route::get('/admin/projectbook/insert','Admin\ProjcetbookController@insert');
Route::post('admin/projectbook/create','Admin\ProjcetbookController@create');
Route::get('admin/projectbook/edit/{id}','Admin\ProjcetbookController@edit');
Route::post('admin/projectbook/update/{id}','Admin\ProjcetbookController@update');
Route::get('admin/projectbook/delete/{id}','Admin\ProjcetbookController@delete');

// อัพเล่มโครงการอวท. หน้าบ้าน
Route::get('projectpage/index','ProjectController@index');

//อัพเล่มโครงการชมรมวิชาชีพ หลังบ้าน
Route::get('/admin/bookdepartment/index','Admin\BookdepartmemtController@index');
Route::get('/admin/bookdepartment/insert','Admin\BookdepartmemtController@insert');
Route::post('admin/bookdepartment/create','Admin\BookdepartmemtController@create');
Route::get('admin/bookdepartment/edit/{id}','Admin\BookdepartmemtController@edit');
Route::post('admin/bookdepartment/update/{id}','Admin\BookdepartmemtController@update');
Route::get('admin/bookdepartment/delete/{id}','Admin\BookdepartmemtController@delete');

// อัพเล่มโครงการชมรมวิชาชีพ หน้าบ้าน
Route::get('bookdepartment/academic','ProjectController@academic');
Route::get('bookdepartment/activity','ProjectController@activity');

