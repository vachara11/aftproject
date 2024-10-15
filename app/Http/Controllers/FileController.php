<?php

namespace App\Http\Controllers;

use App\Report;
use App\Upload;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;
class FileController extends Controller
{
    public function upindex(){
        return view('font_end.upload.upload');
    }

    public function reindex(){
        return view('font_end.upload.report');
    }

    public function storeup(Request $request)
    {
        $validated = $request->validate([
            'std_id' => 'required|unique:uploads',
            'name' => 'required',
            'phone' => 'required',
            'department' => 'required',
            'class' => 'required',
            'room' => 'required',
            'file' => 'mimes:pdf',
        ],
        [
            'std_id.required'=> 'กรุณากรอกรหัสนักเรียน นักศึกษา',
            'std_id.unique'=> 'มีรหัสนักเรียน นักศึกษานี้อยู่ในฐานข้อมูลแล้ว',
            'name.required'=> 'กรุณากรอกชื่อ-นามสกุล',
            'phone.required'=> 'กรุณาเบอร์โทรศัพท์',
            'department.required'=> 'กรุณาเลือกสาขา',
            'class.required'=> 'กรุณาเลือกระดับชั้น',
            'room.required'=> 'กรุณาเลือกห้อง',
            'file.required'=> 'กรุณาเลือกไฟล์นามสกุล pdf',

        ]);

        $upload = new Upload();
        $upload->std_id = $request->std_id;
        $upload->name = $request->name;
        $upload->phone = $request->phone;
        $upload->department = $request->department;
        $upload->class = $request->class;
        $upload->room = $request->room;
        if ($request->hasFile('file')) {
            $filename = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path() . '/font_end/upload/', $filename);
            $upload->file = $filename;
            } else {
            $upload->file = 'ไม่พบไฟล์';
            }

        //แจ้งเตือนไปยังไลน์
        $sToken = "1acsyNFntvhiG3twxhLfTqTsEnuAecxTxkUoww1BBUs";
        $sMessage = "ข้อความจากสมาชิก อวท. \n";
        $sMessage .= "ชื่อ-นามสกุล : " . $request->name . "\n";
        $sMessage .= "เบอร์โทรศัพท์ : " . $request->phone . "\n";
        $sMessage .= "สาขา : " . $request->department . "\n";
        $sMessage .= "ระดับชั้น/ห้อง : " . $request->class."/". $request->room . "\n";
        $sMessage .= "ได้ส่งเอกสารคำร้องขอซ่อมกิจกรรมเข้ามาในเว็บไซต์แล้ว \n";

        $chOne = curl_init();
        curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
        curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($chOne, CURLOPT_POST, 1);
        curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=" . $sMessage);
        $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $sToken . '',);
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($chOne);

        //Result error
        if (curl_error($chOne)) {
            echo 'error:' . curl_error($chOne);
        } else {
            $result_ = json_decode($result, true);
            echo "status : " . $result_['status'];
            echo "message : " . $result_['message'];
        }
        curl_close($chOne);

        $upload->save();
        return redirect()->route('statusup')->with('status','เอกสารถูกส่งแล้ว');
    }

    public function storere(Request $request)
    {
        $validated = $request->validate([
            'std_id' => 'required|unique:reports',
            'name' => 'required',
            'phone' => 'required',
            'department' => 'required',
            'class' => 'required',
            'room' => 'required',
            'file' => 'mimes:pdf',
        ],
        [
            'std_id.required'=> 'กรุณากรอกรหัสนักเรียน นักศึกษา',
            'std_id.unique'=> 'มีรหัสนักเรียน นักศึกษานี้อยู่ในฐานข้อมูลแล้ว',
            'name.required'=> 'กรุณากรอกชื่อ-นามสกุล',
            'phone.required'=> 'กรุณาเบอร์โทรศัพท์',
            'department.required'=> 'กรุณาเลือกสาขา',
            'class.required'=> 'กรุณาเลือกระดับชั้น',
            'room.required'=> 'กรุณาเลือกห้อง',
            'file.required'=> 'กรุณาเลือกไฟล์นามสกุล pdf',

        ]);

        $report = new Report();
        $report->std_id = $request->std_id;
        $report->name = $request->name;
        $report->phone = $request->phone;
        $report->department = $request->department;
        $report->class = $request->class;
        $report->room = $request->room;
        if ($request->hasFile('file')) {
            $filename = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path() . '/font_end/report/', $filename);
            $report->file = $filename;
            } else {
            $report->file = 'ไม่พบไฟล์';
            }

        //แจ้งเตือนไปยังไลน์
        $sToken = "1acsyNFntvhiG3twxhLfTqTsEnuAecxTxkUoww1BBUs";
        $sMessage = "ข้อความจากสมาชิก อวท. \n";
        $sMessage .= "ชื่อ-นามสกุล : " . $request->name . "\n";
        $sMessage .= "เบอร์โทรศัพท์ : " . $request->phone . "\n";
        $sMessage .= "สาขา : " . $request->department . "\n";
        $sMessage .= "ระดับชั้น/ห้อง : " . $request->class."/". $request->room . "\n";
        $sMessage .= "ได้ส่งรายงานการซ่อมกิจกรรมเข้ามาในเว็บไซต์แล้ว \n";

        $chOne = curl_init();
        curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
        curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($chOne, CURLOPT_POST, 1);
        curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=" . $sMessage);
        $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $sToken . '',);
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($chOne);

        //Result error
        if (curl_error($chOne)) {
            echo 'error:' . curl_error($chOne);
        } else {
            $result_ = json_decode($result, true);
            echo "status : " . $result_['status'];
            echo "message : " . $result_['message'];
        }
        curl_close($chOne);

        $report->save();
        return redirect()->route('statusre')->with('status','เอกสารถูกส่งแล้ว');
    }

    public function status(){
        return view('font_end.upload.status');
    }

    public function statusup(){
        $statusup = Upload::paginate(50);
        $statusup = Upload::orderBy('id','desc')->paginate(50);
        $count = Upload::count();
        return view('font_end.upload.statusup',compact('statusup','count'));
    }
    public function statusre(){
        $statusre = Report::paginate(50);
        $statusre = Report::orderBy('id','desc')->paginate(50);
        $count = Report::count();
        return view('font_end.upload.statusre',compact('statusre','count'));
    }

    public function editup($id)
    {
    $statusup = Upload::findOrFail($id);
    return view('font_end.upload.editup',compact('statusup'));
    }
    public function editre($id)
    {
    $statusre = Report::findOrFail($id);
    return view('font_end.upload.editre',compact('statusre'));
    }

    public function updateup(Request $request,$id){
        $validated = $request->validate([
            'std_id' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'department' => 'required',
            'class' => 'required',
            'room' => 'required',
            'file' => 'mimes:pdf',
        ],
        [
            'std_id.required'=> 'กรุณากรอกรหัสนักเรียน นักศึกษา',
            'department.required'=> 'กรุณาเลือกสาขา',
            'phone.required'=> 'กรุณาเบอร์โทรศัพท์',
            'class.required'=> 'กรุณาเลือกระดับชั้น',
            'room.required'=> 'กรุณาเลือกห้อง',
            'file.required'=> 'กรุณาเลือกไฟล์นามสกุล pdf',

        ]);
        $statusup = Upload::find($id);
        $statusup->std_id = $request->std_id;
        $statusup->name = $request->name;
        $statusup->phone = $request->phone;
        $statusup->department = $request->department;
        $statusup->class = $request->class;
        $statusup->room = $request->room;
        $statusup->status = "รอตรวจสอบเอกสาร";
        if($request->hasFile('file')){
            if($statusup->file){
                File::delete(public_path().'/font_end/upload/'. $statusup->file);
            }
            $filename = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path() . '/font_end/upload/', $filename);
            $statusup->file = $filename;
        }

         //แจ้งเตือนไปยังไลน์
         $sToken = "1acsyNFntvhiG3twxhLfTqTsEnuAecxTxkUoww1BBUs";
         $sMessage = "ข้อความจากสมาชิก อวท. \n";
         $sMessage .= "ชื่อ-นามสกุล : " . $request->name . "\n";
         $sMessage .= "เบอร์โทรศัพท์ : " . $request->phone . "\n";
         $sMessage .= "สาขา : " . $request->department . "\n";
         $sMessage .= "ระดับชั้น/ห้อง : " . $request->class."/". $request->room . "\n";
         $sMessage .= "แก้ไขเอกสารคำร้องขอซ่อมกิจกรรมเข้ามาในเว็บไซต์แล้วให้ตรวจใหม่อีกครั้ง \n";

         $chOne = curl_init();
         curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
         curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
         curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
         curl_setopt($chOne, CURLOPT_POST, 1);
         curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=" . $sMessage);
         $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $sToken . '',);
         curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
         curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
         $result = curl_exec($chOne);

         //Result error
         if (curl_error($chOne)) {
             echo 'error:' . curl_error($chOne);
         } else {
             $result_ = json_decode($result, true);
             echo "status : " . $result_['status'];
             echo "message : " . $result_['message'];
         }
         curl_close($chOne);


            $statusup->save();
            return redirect('status/upload')->with('status','แก้ไขข้อมูลสำเร็จ');
    }
    public function updatere(Request $request,$id){
        $validated = $request->validate([
            'std_id' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'department' => 'required',
            'class' => 'required',
            'room' => 'required',
            'file' => 'mimes:pdf',
        ],
        [
            'std_id.required'=> 'กรุณากรอกรหัสนักเรียน นักศึกษา',
            'department.required'=> 'กรุณาเลือกสาขา',
            'phone.required'=> 'กรุณาเบอร์โทรศัพท์',
            'class.required'=> 'กรุณาเลือกระดับชั้น',
            'room.required'=> 'กรุณาเลือกห้อง',
            'file.required'=> 'กรุณาเลือกไฟล์นามสกุล pdf',

        ]);
        $statusre = Report::find($id);
        $statusre->std_id = $request->std_id;
        $statusre->name = $request->name;
        $statusre->phone = $request->phone;
        $statusre->department = $request->department;
        $statusre->class = $request->class;
        $statusre->room = $request->room;
        $statusre->status = "รอตรวจสอบเอกสาร";
        if($request->hasFile('file')){
            if($statusre->file){
                File::delete(public_path().'/font_end/report/'. $statusre->file);
            }
            $filename = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path() . '/font_end/report/', $filename);
            $statusre->file = $filename;
        }

         //แจ้งเตือนไปยังไลน์
         $sToken = "1acsyNFntvhiG3twxhLfTqTsEnuAecxTxkUoww1BBUs";
         $sMessage = "ข้อความจากสมาชิก อวท. \n";
         $sMessage .= "ชื่อ-นามสกุล : " . $request->name . "\n";
         $sMessage .= "เบอร์โทรศัพท์ : " . $request->phone . "\n";
         $sMessage .= "สาขา : " . $request->department . "\n";
         $sMessage .= "ระดับชั้น/ห้อง : " . $request->class."/". $request->room . "\n";
         $sMessage .= "แก้ไขรายงานการซ่อมกิจกรรมเข้ามาในเว็บไซต์แล้วให้ตรวจใหม่อีกครั้ง \n";

         $chOne = curl_init();
         curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
         curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
         curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
         curl_setopt($chOne, CURLOPT_POST, 1);
         curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=" . $sMessage);
         $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $sToken . '',);
         curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
         curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
         $result = curl_exec($chOne);

         //Result error
         if (curl_error($chOne)) {
             echo 'error:' . curl_error($chOne);
         } else {
             $result_ = json_decode($result, true);
             echo "status : " . $result_['status'];
             echo "message : " . $result_['message'];
         }
         curl_close($chOne);

            $statusre->save();
            return redirect('status/report')->with('status','แก้ไขข้อมูลสำเร็จ');
    }
}
