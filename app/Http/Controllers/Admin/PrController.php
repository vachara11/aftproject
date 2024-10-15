<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Pr;
use File;
use Image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PrController extends Controller
{
    public function index()
    {
        $pr = Pr::paginate(5);
        $pr = Pr::orderBy('id', 'desc')->paginate(5);
        return view('admin.pr.index', compact('pr'));
    }
    public function create()
    {
        return view('admin.pr.insert');
    }
    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'file' => 'image|nullable|mimes:jpeg,jpg,png',

        ], [
            'name.required' => 'กรุณากรอกชื่อกิจกรรม',
            'file.required' => 'กรุณาเลือกรูปภาพ (ไฟล์ภาพต้องเป็นนามสกุล .png, .jpg, และ .jpeg เท่านั้น)',

        ]);

        $pr = new Pr();

        if ($request->hasFile('file')) {
            $filename = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path() . '/back_end/image/pr/', $filename);
            Image::make(public_path() . '/back_end/image/pr/' . $filename)->resize(2500, 1309)->save(public_path() . '/back_end/image/pr/resize/' . $filename);
            $pr->file = $filename;
        } else {
            $pr->file = 'no_image.jpg';
        }

        $pr->name = $request->name;
        $pr->date = $request->date;

        $pr->save();
        return redirect('/admin/pr/index')->with('status', 'บันทึกข้อมูลสำเร็จ');
    }

    public function edit($id)
    {
        $pr = Pr::find($id);
        return view('admin.pr.edit', compact('pr'));
    }

    public function update(Request $request, $id)
    {
        $pr = Pr::find($id);
        $pr->name = $request->name;
        $pr->date = $request->date;
        if ($request->hasFile('file')) {
            if ($pr->file != 'no_image.jpg') {
                File::delete(public_path() . '/back_end/image/pr/' . $pr->file);
                File::delete(public_path() . '/back_end/image/pr/resize/' . $pr->file);
            }
            $filename = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path() . '/back_end/image/pr/', $filename);
            Image::make(public_path() . '/back_end/image/pr/' . $filename)->resize(2500, 1309)->save(public_path() . '/back_end/image/pr/resize/' . $filename);
            $pr->file = $filename;
        }
        $pr->update();
        return redirect('/admin/pr/index')->with('status', 'แก้ไขข้อมูลสำเร็จ');
    }

    public function delete($id)
    {
        $pr = Pr::find($id);
      
            if ($pr->file != 'no_image.jpg') {
                File::delete(public_path() . '/back_end/image/pr/' . $pr->file);
                File::delete(public_path() . '/back_end/image/pr/resize/' . $pr->file);
            }
            $pr->delete();
            return redirect('/admin/pr/index')->with('status', 'ลบข้อมูลสำเร็จ'); 
    }

    public function open(Request $request, $id){
        $pr = Pr::find($id);
        $pr->status = $request->edit;
        $pr->save();
        return redirect('/admin/pr/index')->with('status','ปิดการประชาสัมพันธ์แล้ว');
    }
    public function end(Request $request, $id){
        $pr = Pr::find($id);
        $pr->status = $request->edit;
        $pr->save();
        return redirect('/admin/pr/index')->with('status','เปิดการประชาสัมพันธ์แล้ว');
    }
}
