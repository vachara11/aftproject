<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BookDepatmemt;
use File;
use Image;
use Illuminate\Support\Str;

class BookdepartmemtController extends Controller
{
    public function index(){
        $pro = BookDepatmemt::paginate(50);
        return view('admin.bookdepartment.index',compact('pro'));
    }

    public function insert(){
        return view('admin.bookdepartment.insert');
    }

    public function create(Request $request){
        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png',
            'file' => 'mimes:pdf',

        ], [
            'name.required' => 'กรุณากรอกชื่อกิจกรรม',
            'date.required' => 'กรุณากรอกชื่อกิจกรรม',
            'image.mimes' => 'กรุณาเลือกรูปภาพ (ไฟล์ภาพต้องเป็นนามสกุล .png, .jpg, และ .jpeg เท่านั้น)',
            'file.mimes' => 'กรุณาเลือกไฟล์นามสกุล pdf เท่านั้น',

        ]);

        $pro = new BookDepatmemt();

        if ($request->hasFile('image')) {
            $filename = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path() . '/back_end/image/bookdepartment/', $filename);
            Image::make(public_path() . '/back_end/image/bookdepartment/' . $filename);
            $pro->image = $filename;
        } else {
            $pro->image = 'noimg.jpg';
        }

        if ($request->hasFile('file')) {
            $filename = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path() . '/back_end/image/bookdepartment/pdf/', $filename);
            $pro->file = $filename;
        } else {
            $pro->file = 'ไม่พบไฟล์PDF';
        }

        $pro->year = $request->year;
        $pro->name = $request->name;
        $pro->date = $request->date;
        $pro->comnent = $request->comnent;

        $pro->save();
        return redirect('/admin/bookdepartment/index')->with('status', 'บันทึกข้อมูลสำเร็จ');
    }

    public function edit($id){
            $pro = BookDepatmemt::find($id);
            return view('admin.bookdepartment.edit',compact('pro'));
    }

    public function update($id,Request $request){
        $pro = BookDepatmemt::find($id);
        if ($request->hasFile('image')) {
            if($pro->image){
                File::delete(public_path().'/back_end/image/bookdepartment/'. $pro->image);
            }
            $filename = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path() . '/back_end/image/bookdepartment/', $filename);
            Image::make(public_path() . '/back_end/image/bookdepartment/' . $filename);
            $pro->image = $filename;
        }

        if ($request->hasFile('file')) {
            if($pro->file){
                File::delete(public_path().'/back_end/image/bookdepartment/pdf/'. $pro->file);
            }
            $filename = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path() . '/back_end/image/bookdepartment/pdf/', $filename);
            $pro->file = $filename;
        }

        $pro->year = $request->year;
        $pro->name = $request->name;
        $pro->date = $request->date;
        $pro->comnent = $request->comnent;

        $pro->save();
        return redirect('/admin/bookdepartment/index')->with('status', 'แก้ไขข้อมูลสำเร็จ');
    }

    public function delete($id){
        $pro = BookDepatmemt::find($id);

        if ($pro->image != 'noimg.jpg') {
            File::delete(public_path().'/back_end/image/bookdepartment/'. $pro->image);
        }
        if($pro->file){
            File::delete(public_path().'/back_end/image/bookdepartment/pdf/'. $pro->file);
        }
        $pro->delete();
        return redirect('/admin/bookdepartment/index')->with('status', 'ลบข้อมูลสำเร็จ');


    }

    public function indexfront(){
        $pro = BookDepatmemt::all();
        return view('font_end.bookdepartment.index', compact('pro'));
    }
}
