<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Parcel;
use Illuminate\Http\Request;

class ParcelController extends Controller
{
    public function index(){
        $parcel = Parcel::orderBy('created_at','desc')->paginate(1000);
        return view('admin.parcel.index',compact('parcel'));
    }

    public function create(){
        return view('admin.parcel.create');
    }

    public function insert(Request $request){
        $validated = $request->validate([
            'year' => 'required',
            'name' => 'required',
            'number' => 'required',
            'date' => 'required',
            'name1' => 'required',

        ],
        [
            'year.required'=> 'กรุณาเลือกปีการศึกษา',
            'name.required'=> 'กรุณากรอกชื่อพัสดุ',
            'number.required'=> 'กรุณากรอกจำนวนพัสดุที่เบิก',
            'date.required'=> 'กรุณากรอกวันที่',
            'name1.required'=> 'กรุณาเลือกชื่อผู้เบิกพัสดุ',
        
        ]);
        $parcel = new Parcel();
        $parcel->year = $request->year;
        $parcel->name = $request->name;
        $parcel->number = $request->number;
        $parcel->date = $request->date;
        $parcel->name1 = $request->name1;
        $parcel->note = $request->note;
        $parcel->save();
        return redirect()->route('admin.parcel')->with('status','บันทึกข้อมูลสำเร็จ');
    }

    public function delete($id){
        $parcel = Parcel::find($id);
        $parcel->delete();
        return redirect()->route('admin.parcel')->with('status','ลบข้อมูลสำเร็จ');
    }

    public function edit($id){
        $parcel = Parcel::find($id);
        return view('admin.parcel.edit',compact('parcel'));
    }

    public function update(Request $request, $id){
        $parcel = Parcel::find($id);
        $parcel->year = $request->year;
        $parcel->name = $request->name;
        $parcel->number = $request->number;
        $parcel->date = $request->date;
        $parcel->name1 = $request->name1;
        $parcel->note = $request->note;
        $parcel->update();
        return redirect()->route('admin.parcel')->with('status','แก้ไขข้อมูลสำเร็จ');
    }

}
