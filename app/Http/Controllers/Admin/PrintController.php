<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Prints;
use Illuminate\Http\Request;
use PDF;

class PrintController extends Controller
{
    public function index(){
        $prints = Prints::orderBy('id','desc')->paginate(50);
        return view('admin.print.index',compact('prints'));
    }

    public function create(){
        return view('admin.print.insert');
    }

    public function insert(Request $request){
        $validated = $request->validate([
            'year' => 'required',
            'name' => 'required',
            'count' => 'required',
            'type' => 'required',
            'fname' => 'required',

        ],
        [
            'year.required'=> 'กรุณาเลือกภาคเรียนและปีการศึกษา',
            'name.required'=> 'กรุณากรอกชื่อเอกสาร',
            'count.required'=> 'กรุณากรอกจำนวนหน้าที่สั่งปริ้น',
            'type.required'=> 'กรุณาเลือกประเภทเอกสาร',
            'fname.required'=> 'กรุณาเลือกชื่อผู้สั่งปริ้น',

        ]);

        $prints = new Prints();
        $prints->year = $request->year;
        $prints->name = $request->name;
        $prints->count = $request->count;
        $prints->type = $request->type;
        $prints->fname = $request->fname;
        $prints->save();
        return redirect()->route('print')->with('status','บันทึกข้อมูลสำเร็จ');
    }

    public function edit($id){
        $prints = Prints::find($id);
        return view('admin.print.edit',compact('prints'));
    }

    public function update(Request $request,$id){
        $validated = $request->validate([
            'year' => 'required',
            'name' => 'required',
            'count' => 'required',
            'type' => 'required',
            'fname' => 'required',

        ],
        [
            'year.required'=> 'กรุณาเลือกภาคเรียนและปีการศึกษา',
            'name.required'=> 'กรุณากรอกชื่อเอกสาร',
            'count.required'=> 'กรุณากรอกจำนวนหน้าที่สั่งปริ้น',
            'type.required'=> 'กรุณาเลือกประเภทเอกสาร',
            'fname.required'=> 'กรุณาเลือกชื่อผู้สั่งปริ้น',

        ]);

        $prints = Prints::find($id);
        $prints->year = $request->year;
        $prints->name = $request->name;
        $prints->count = $request->count;
        $prints->type = $request->type;
        $prints->fname = $request->fname;
        $prints->save();
        return redirect()->route('print')->with('status','อัพเดทข้อมูลสำเร็จ');
    }

    public function delete($id){
        $prints = Prints::find($id);
        $prints->delete();
        return redirect()->route('print')->with('status','ลบข้อมูลสำเร็จ');
    }
    
    public function pdf()
    {
        $print = Prints::all();
        $pdf = PDF::loadView('admin.print.pdf', ['print' => $print]);
        return $pdf->stream('AFT_PSC_Print.pdf');
    }
}
