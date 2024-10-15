<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;
use App\Report;
use App\Upload;

class FileController extends Controller
{
    public function upindex(){
        $statusup = Upload::paginate(50);
        $statusup = Upload::orderBy('id','desc')->paginate(50);
        $count = Upload::count();
        return view('admin.upload.index',compact('statusup','count'));
    }

    public function createup(){
        return view('admin.upload.create');
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
            'file.required'=> 'กรุณาเลือไฟล์นามสกุล pdf',

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
        $upload->save();
        return redirect()->route('adminup')->with('status','บันทึกเอกสารเรียบร้อยแล้ว');
    }

    public function editup($id)
    {
    $statusup = Upload::findOrFail($id);
    return view('admin.upload.editup',compact('statusup'));
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
            'file.required'=> 'กรุณาเลือไฟล์นามสกุล pdf',

        ]);
        $statusup = Upload::find($id);
        $statusup->std_id = $request->std_id;
        $statusup->name = $request->name;
        $statusup->phone = $request->phone;
        $statusup->department = $request->department;
        $statusup->class = $request->class;
        $statusup->room = $request->room;
        if($request->hasFile('file')){
            if($statusup->file){
                File::delete(public_path().'/font_end/upload/'. $statusup->file);
            }
            $filename = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path() . '/font_end/upload/', $filename);
            $statusup->file = $filename;
        }

            $statusup->save();
            return redirect()->route('adminup')->with('status','แก้ไขข้อมูลสำเร็จ');
    }

    public function delup($id){
        $upload = Upload::find($id);
        if($upload->file){
            if($upload->file){File::delete(public_path().'/font_end/upload/'. $upload->file);
        }
        $upload->delete();
        return redirect()->route('adminup')->with('status','ลบข้อมูลสำเร็จ');
        }
    }

    public function insertpass(Request $request,$id){
        $statusup = Upload::find($id);
        $statusup->status = $request->status;
        $statusup->save();
        return redirect()->route('adminup')->with('status','บันทึกข้อมูลสำเร็จ');
    }

    public function admincom($id){
        $status = Upload::find($id);
        return view('admin.upload.admincom',compact('status'));
    }

    public function insertcom(Request $request,$id){
        $statusup = Upload::find($id);
        $statusup->comment = $request->comment;
        $statusup->save();
        return redirect()->route('adminup')->with('status','บันทึกข้อมูลสำเร็จ');
    }


    //รายงาน

    public function reindex(){
        $statusre = Report::paginate(50);
        $statusre = Report::orderBy('id','desc')->paginate(50);
        $count = Report::count();
        return view('admin.report.index',compact('statusre','count'));
    }

    public function createre(){
        return view('admin.report.create');
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
            'file.required'=> 'กรุณาเลือไฟล์นามสกุล pdf',

        ]);

        $upload = new Report();
        $upload->std_id = $request->std_id;
        $upload->name = $request->name;
        $upload->phone = $request->phone;
        $upload->department = $request->department;
        $upload->class = $request->class;
        $upload->room = $request->room;
        if ($request->hasFile('file')) {
            $filename = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path() . '/font_end/report/', $filename);
            $upload->file = $filename;
            } else {
            $upload->file = 'ไม่พบไฟล์';
            }
        $upload->save();
        return redirect()->route('adminre')->with('status','บันทึกเอกสารเรียบร้อยแล้ว');
    }

    public function editre($id)
    {
    $statusre = Report::findOrFail($id);
    return view('admin.report.editup',compact('statusre'));
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
            'file.required'=> 'กรุณาเลือไฟล์นามสกุล pdf',

        ]);
        $statusre = Report::find($id);
        $statusre->std_id = $request->std_id;
        $statusre->name = $request->name;
        $statusre->phone = $request->phone;
        $statusre->department = $request->department;
        $statusre->class = $request->class;
        $statusre->room = $request->room;
        if($request->hasFile('file')){
            if($statusre->file){
                File::delete(public_path().'/font_end/report/'. $statusre->file);
            }
            $filename = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path() . '/font_end/report/', $filename);
            $statusre->file = $filename;
        }

            $statusre->save();
            return redirect()->route('adminre')->with('status','แก้ไขข้อมูลสำเร็จ');
    }

    public function delre($id){
        $upload = Report::find($id);
        if($upload->file){
            if($upload->file){File::delete(public_path().'/font_end/report/'. $upload->file);
        }
        $upload->delete();
        return redirect()->route('adminre')->with('status','ลบข้อมูลสำเร็จ');
        }
    }

    public function insertpassre(Request $request,$id){
        $statusre = Report::find($id);
        $statusre->status = $request->status;
        $statusre->save();
        return redirect()->route('adminre')->with('status','บันทึกข้อมูลสำเร็จ');
    }

    public function admincomre($id){
        $status = Report::find($id);
        return view('admin.report.admincom',compact('status'));
    }

    public function insertcomre(Request $request,$id){
        $statusre = Report::find($id);
        $statusre->comment = $request->comment;
        $statusre->save();
        return redirect()->route('adminre')->with('status','บันทึกข้อมูลสำเร็จ');
    }

        public function open(Request $request, $id){
        $status = Upload::find($id);
        $status->edit = $request->edit;
        $status->save();
        return redirect()->route('adminup')->with('status','ปิดปุ่มแก้ไขแล้ว');
    }
    public function end(Request $request, $id){
        $status = Upload::find($id);
        $status->edit = $request->edit;
        $status->save();
        return redirect()->route('adminup')->with('status','เปิดปุ่มแก้ไขแล้ว');
    }

    public function openre(Request $request, $id){
        $report = Report::find($id);
        $report->edit = $request->edit;
        $report->save();
        return redirect()->route('adminre')->with('status','ปิดปุ่มแก้ไขแล้ว');
    }
    public function endre(Request $request, $id){
        $report = Report::find($id);
        $report->edit = $request->edit;
        $report->save();
        return redirect()->route('adminre')->with('status','เปิดปุ่มแก้ไขแล้ว');
    }
}
