<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;
use App\Dowload;
use Illuminate\Support\Carbon;

class DowloadController extends Controller
{
    public function index(){
        $dowload = Dowload::paginate(20);
        $dowload = Dowload::orderBy('id','desc')->paginate(20);
        $count = Dowload::count();
        //$dowload = dowload::paginate(5);
        return view('admin.dowload.admindowload',[
            'dowload' => $dowload,
            'count' => $count
        ]);
    }
    public function index1(){
        $dowload = Dowload::paginate(20);
        $dowload = Dowload::orderBy('id','desc')->paginate(20);
        $count = Dowload::count();
        //$dowload = dowload::paginate(5);
        return view('font_end.dowload.dowload',[
            'dowload' => $dowload,
            'count' => $count
        ]);
    }
    public function create()
    {
        return view('admin.dowload.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'title' => 'required',
            'file' => 'mimes:pdf,doc,docx,zip,rar',
        ],
        [
            'name.required'=> 'กรุณากรอกชื่อเอกสาร',
            'title.required'=> 'กรุณากรอกรายละเอียดเอกสาร',
            'file.required'=> 'กรุณาเลือไฟล์นามสกุล pdf,doc,docx,zip,rar',

        ]);

        $dowload = new Dowload();
        $dowload->name = $request->name;
        $dowload->title = $request->title;
        if ($request->hasFile('file')) {
            $filename = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path() . '/uploadfile/', $filename);
            $dowload->file = $filename;
            } else {
            $dowload->file = 'ไม่พบไฟล์';
            }
        $dowload->save();
        return redirect('dowload/admindowload')->with('status','บันทึกข้อมูลสำเร็จ');
    }

    public function delete($id){
        $dowload = Dowload::find($id);
        if($dowload->file){
            if($dowload->file){File::delete(public_path().'/uploadfile/'. $dowload->file);
        }
        $dowload->delete();
        return redirect('dowload/admindowload')->with('status','ลบข้อมูลสำเร็จ');
        }
    }

    public function edit($id)
    {
    $dowloads = Dowload::findOrFail($id);
    return view('admin.dowload.edit', ['dowload' => $dowloads]);
    }

    public function update(Request $request,$id){
        $validated = $request->validate([
            'name' => 'required',
            'title' => 'required',
            'file' => 'mimes:pdf,doc,docx,zip,rar',
        ],
        [
            'name.required'=> 'กรุณากรอกชื่อเอกสาร',
            'title.required'=> 'กรุณากรอกรายละเอียดเอกสาร',
            'file.required'=> 'กรุณาเลือไฟล์นามสกุล pdf,doc,docx,zip,rar',

        ]);
        $dowload = Dowload::find($id);
        $dowload->name = $request->name;
        $dowload->title = $request->title;
        if($request->hasFile('file')){
            if($dowload->file){
                File::delete(public_path().'/uploadfile/'. $dowload->file);
            }
            $filename = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path() . '/uploadfile/', $filename);
            $dowload->file = $filename;
        }

            $dowload->save();
            return redirect('dowload/admindowload')->with('status','แก้ไขข้อมูลสำเร็จ');
    }
}
