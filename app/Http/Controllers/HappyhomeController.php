<?php

namespace App\Http\Controllers;

use App\Happyhome;
use Illuminate\Http\Request;
use Image;
use File;
use PDF;
use Illuminate\Support\Str;

class HappyhomeController extends Controller
{
    public function index()
    {
        return view('font_end.happyhome.index');
    }

    public function show()
    {
        $happyhome = Happyhome::paginate(50);
        $happyhome = Happyhome::orderBy('id', 'desc')->paginate(50);
        $count = Happyhome::count();
        return view('admin.happyhome.index', compact('happyhome', 'count'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'stu_card' => 'required',
            'name' => 'required',
            'department' => 'required',
            'class' => 'required',
            'room' => 'required',
            'activity' => 'required',
            'time' => 'required',
            'location' => 'required',
            'file' => 'image|nullable',
            'file1' => 'image|nullable',
            'file2' => 'image|nullable',
            'file3' => 'image|nullable',
            'benefit' => 'required'

        ], [
            'stu_card.required' => 'กรุณากรอกรหัสนักศึกษา',
            'name.required' => 'กรุณากรอกชื่อ-นามสกุล',
            'department.required' => 'กรุณาเลือกสาขา',
            'class.required' => 'กรุณาเลือกระดับชั้น',
            'room.required' => 'กรุณาเลือกห้อง',
            'activity.required' => 'กรุณากรอกชื่อกิจกรรม',
            'time.required' => 'กรุณาเลือกวันที่',
            'location.required' => 'กรุณากรอกสถานที่ทำกิจกรรม',
            'file.required' => 'กรุณาเลือกรูปภาพ',
            'file1.required' => 'กรุณาเลือกรูปภาพ',
            'file2.required' => 'กรุณาเลือกรูปภาพ',
            'file3.required' => 'กรุณาเลือกรูปภาพ',
            'benefit.required' => 'กรุณากรอกสิ่งที่ได้จากการทำกิจกรรม',
        ]);

        $happyhome = new Happyhome();

        if ($request->hasFile('file')) {
            $filename = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path() . '/font_end/multi/', $filename);
            $happyhome->file = $filename;
        } else {
            $happyhome->file = 'no_image.jpg';
        }
        if ($request->hasFile('file1')) {
            $filename = Str::random(10) . '.' . $request->file('file1')->getClientOriginalExtension();
            $request->file('file1')->move(public_path() . '/font_end/multi/', $filename);
            $happyhome->file1 = $filename;
        } else {
            $happyhome->file1 = 'no_image.jpg';
        }
        if ($request->hasFile('file2')) {
            $filename = Str::random(10) . '.' . $request->file('file2')->getClientOriginalExtension();
            $request->file('file2')->move(public_path() . '/font_end/multi/', $filename);
            $happyhome->file2 = $filename;
        } else {
            $happyhome->file2 = 'no_image.jpg';
        }
        if ($request->hasFile('file3')) {
            $filename = Str::random(10) . '.' . $request->file('file3')->getClientOriginalExtension();
            $request->file('file3')->move(public_path() . '/font_end/multi/', $filename);
            $happyhome->file3 = $filename;
        } else {
            $happyhome->file3 = 'no_image.jpg';
        }
        $happyhome->stu_card = $request->stu_card;
        $happyhome->name = $request->name;
        $happyhome->department = $request->department;
        $happyhome->class = $request->class;
        $happyhome->room = $request->room;
        $happyhome->activity = $request->activity;
        $happyhome->time = $request->time;
        $happyhome->location = $request->location;
        $happyhome->benefit = $request->benefit;

        //แจ้งเตือนไปยังไลน์
        $sToken = "1acsyNFntvhiG3twxhLfTqTsEnuAecxTxkUoww1BBUs";
        $sMessage = "ข้อความจากสมาชิก อวท. \n";
        $sMessage .= "ชื่อ-นามสกุล : " . $request->name . "\n";
        $sMessage .= "สาขา : " . $request->department . "\n";
        $sMessage .= "ระดับชั้น/ห้อง : " . $request->class."/". $request->room . "\n";
        $sMessage .= "ได้ส่งข้อมูลจิตอาสากิจกรรม PSC Happy Home เข้ามาในเว็บไซต์แล้ว \n";

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

        $happyhome->save();
        return redirect('/happyhome/status')->with('status', 'ข้อมูลถูกส่งแล้ว');
    }

    public function edit($id)
    {
        $happyhome = Happyhome::findOrFail($id);
        return view('admin.happyhome.edit', compact('happyhome'));
    }

    public function update(Request $request, $id)
    {

        $happyhome = Happyhome::find($id);

        if ($request->hasFile('file')) {
            if ($happyhome->file) {
                File::delete(public_path() . '/font_end/multi/' . $happyhome->file);
            }
            $filename = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path() . '/font_end/multi/', $filename);
            $happyhome->file = $filename;
        } else {
            $happyhome->file = 'no_image.jpg';
        }
        if ($request->hasFile('file1')) {
            if ($happyhome->file1) {
                File::delete(public_path() . '/font_end/multi/' . $happyhome->file1);
            }
            $filename = Str::random(10) . '.' . $request->file('file1')->getClientOriginalExtension();
            $request->file('file1')->move(public_path() . '/font_end/multi/', $filename);
            $happyhome->file1 = $filename;
        } else {
            $happyhome->file1 = 'no_image.jpg';
        }
        if ($request->hasFile('file2')) {
            if ($happyhome->file2) {
                File::delete(public_path() . '/font_end/multi/' . $happyhome->file2);
            }
            $filename = Str::random(10) . '.' . $request->file('file2')->getClientOriginalExtension();
            $request->file('file2')->move(public_path() . '/font_end/multi/', $filename);
            $happyhome->file2 = $filename;
        } else {
            $happyhome->file2 = 'no_image.jpg';
        }
        if ($request->hasFile('file3')) {
            if ($happyhome->file3) {
                File::delete(public_path() . '/font_end/multi/' . $happyhome->file3);
            }
            $filename = Str::random(10) . '.' . $request->file('file3')->getClientOriginalExtension();
            $request->file('file3')->move(public_path() . '/font_end/multi/', $filename);
            $happyhome->file3 = $filename;
        } else {
            $happyhome->file3 = 'no_image.jpg';
        }
        $happyhome->stu_card = $request->stu_card;
        $happyhome->name = $request->name;
        $happyhome->department = $request->department;
        $happyhome->class = $request->class;
        $happyhome->room = $request->room;
        $happyhome->activity = $request->activity;
        $happyhome->time = $request->time;
        $happyhome->location = $request->location;
        $happyhome->benefit = $request->benefit;
        $happyhome->save();
        return redirect()->route('admin.happyhome')->with('status', 'ข้อมูลถูกแก้ไขแล้ว');
    }

    public function delete($id)
    {
        $happyhome = Happyhome::find($id);
        if ($happyhome->file) {
            if ($happyhome->file) {
                File::delete(public_path() . '/font_end/multi/' . $happyhome->file);
            }  
        }
        if ($happyhome->file1) {
            if ($happyhome->file1) {
                File::delete(public_path() . '/font_end/multi/' . $happyhome->file1);
            }  
        }
        if ($happyhome->file2) {
            if ($happyhome->file2) {
                File::delete(public_path() . '/font_end/multi/' . $happyhome->file2);
            }  
        }
        if ($happyhome->file3) {
            if ($happyhome->file3) {
                File::delete(public_path() . '/font_end/multi/' . $happyhome->file3);
            }  
        }
        $happyhome->delete();
        return redirect()->route('admin.happyhome')->with('status','ข้อมูลถูกลบแล้ว');
    }

    public function comment($id){
        $happyhome = Happyhome::find($id);
        return view('admin.happyhome.comment',compact('happyhome'));
    }
    public function insertcomment(Request $request,$id){
        $happyhome = Happyhome::find($id);
        $happyhome->comment = $request->comment;
        $happyhome->save();
        return redirect()->route('admin.happyhome')->with('status','ใส่ข้อความแก้ไขข้อมูลแล้ว');
    }
    public function pass(Request $request,$id){
        $happyhome = Happyhome::find($id);
        $happyhome->status = $request->status;
        $happyhome->save();
        return redirect()->route('admin.happyhome')->with('status','แก้ไขสถานะแล้ว');
    }

    public function status(){
        $happyhome = Happyhome::all();
        return view('font_end.happyhome.status',compact('happyhome'));
    }

    public function statusedit($id){
        $happyhome = Happyhome::find($id);
        return view('font_end.happyhome.edit',compact('happyhome'));

    }

    public function statusupdate(Request $request,$id){
        $happyhome = Happyhome::find($id);

        if ($request->hasFile('file')) {
            if ($happyhome->file) {
                File::delete(public_path() . '/font_end/multi/' . $happyhome->file);
            }
            $filename = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path() . '/font_end/multi/', $filename);
            $happyhome->file = $filename;
        } else {
            $happyhome->file = 'no_image.jpg';
        }
        if ($request->hasFile('file1')) {
            if ($happyhome->file1) {
                File::delete(public_path() . '/font_end/multi/' . $happyhome->file1);
            }
            $filename = Str::random(10) . '.' . $request->file('file1')->getClientOriginalExtension();
            $request->file('file1')->move(public_path() . '/font_end/multi/', $filename);
            $happyhome->file1 = $filename;
        } else {
            $happyhome->file1 = 'no_image.jpg';
        }
        if ($request->hasFile('file2')) {
            if ($happyhome->file2) {
                File::delete(public_path() . '/font_end/multi/' . $happyhome->file2);
            }
            $filename = Str::random(10) . '.' . $request->file('file2')->getClientOriginalExtension();
            $request->file('file2')->move(public_path() . '/font_end/multi/', $filename);
            $happyhome->file2 = $filename;
        } else {
            $happyhome->file2 = 'no_image.jpg';
        }
        if ($request->hasFile('file3')) {
            if ($happyhome->file3) {
                File::delete(public_path() . '/font_end/multi/' . $happyhome->file3);
            }
            $filename = Str::random(10) . '.' . $request->file('file3')->getClientOriginalExtension();
            $request->file('file3')->move(public_path() . '/font_end/multi/', $filename);
            $happyhome->file3 = $filename;
        } else {
            $happyhome->file3 = 'no_image.jpg';
        }
        $happyhome->stu_card = $request->stu_card;
        $happyhome->name = $request->name;
        $happyhome->department = $request->department;
        $happyhome->class = $request->class;
        $happyhome->room = $request->room;
        $happyhome->activity = $request->activity;
        $happyhome->time = $request->time;
        $happyhome->location = $request->location;
        $happyhome->benefit = $request->benefit;
        //แจ้งเตือนไปยังไลน์
        $sToken = "1acsyNFntvhiG3twxhLfTqTsEnuAecxTxkUoww1BBUs";
        $sMessage = "ข้อความจากสมาชิก อวท. \n";
        $sMessage .= "ชื่อ-นามสกุล : " . $request->name . "\n";
        $sMessage .= "สาขา : " . $request->department . "\n";
        $sMessage .= "ระดับชั้น/ห้อง : " . $request->class."/". $request->room . "\n";
        $sMessage .= "ได้แก้ไขข้อมูลจิตอาสากิจกรรม PSC Happy Home เข้ามาในเว็บไซต์แล้ว \n";

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
        $happyhome->save();
        return redirect('/happyhome/status')->with('status', 'ข้อมูลถูกแก้ไขแล้ว');
    }

    public function open(Request $request, $id){
        $happyhome = Happyhome::find($id);
        $happyhome->edit = $request->edit;
        $happyhome->save();
        return redirect()->route('admin.happyhome')->with('status','ปิดปุ่มแก้ไขแล้ว');
    }
    public function end(Request $request, $id){
        $happyhome = Happyhome::find($id);
        $happyhome->edit = $request->edit;
        $happyhome->save();
        return redirect()->route('admin.happyhome')->with('status','เปิดปุ่มแก้ไขแล้ว');
    }

    public function pdfreport($id){
        $happyhome = Happyhome::find($id);
        $pdf = PDF::loadView('admin.happyhome.exportpdf',['happyhome' => $happyhome]);
        return $pdf->stream('รายงานจิตอาสากิจกรรม PSC Happy Home');
    }
}
