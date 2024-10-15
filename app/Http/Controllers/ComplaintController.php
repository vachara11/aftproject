<?php

namespace App\Http\Controllers;

use App\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index(){
        return view('font_end.complaint.index');
    }

    public function show(){
        $complaint = Complaint::orderBy('id', 'desc')->paginate(30);
        return view('admin.complaint.index',compact('complaint'));
    }

    public function create(Request $request){
        $validated = $request->validate(
            [
                'name' => 'required',
                'major' => 'required',
                'tel' => 'required',
                'complaint' => 'required',
            ],
            [
                'name.required' => 'กรุณากรอกชื่อ-นามสกุล',
                'major.required' => 'กรุณาเลือกสาขาวิชา',
                'tel.required' => 'กรุณากรอกเบอร์โทรศัพท์',
                'complaint.required' => 'กรุณากรอกเรื่องที่ร้องเรียน',
            ]
        );
        $complaint = new Complaint();
        $complaint->name = $request->name;
        $complaint->major = $request->major;
        $complaint->tel = $request->tel;
        $complaint->complaint = $request->complaint;

        // // $sToken = "1acsyNFntvhiG3twxhLfTqTsEnuAecxTxkUoww1BBUs";
        $sToken = "twk1HIAGjWDY5ZT5dIe7XKJhnjwEIvULFlAvGQItpPg";
        $sMessage = "เรื่องร้องเรียนภายในวิทยาลัยฯ. \n";
        $sMessage .= "ชื่อ-นามสกุล: " . $request->name . "\n";
        $sMessage .= "สาขาวิชา : " . $request->major . "\n";
        $sMessage .= "เบอร์โทรศัพท์ : " . $request->tel . "\n";
        $sMessage .= "เรื่องที่ร้องเรียน : " . $request->complaint . "\n";

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

        $complaint->save();
        return redirect()->back()->with('status','อวท.ได้รับเรื่องร้องเรียนของท่านแล้ว');
    }

    public function delete($id){
        $complaint = Complaint::find($id);
        $complaint->delete();
        return redirect()->back()->with('status','ลบข้อมูลสำเร็จ');
    }


}
