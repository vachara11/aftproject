<?php

namespace App\Http\Controllers\Admin;

use App\Allow;
use PDF;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AllowsController extends Controller
{
    public function index(){
        return view('admin.allows.index')
        ->with("allow", Allow::all());
    }

    public function insert(){
        return view('admin.allows.insert');
    }

    public function create(Request $request){
        $validated = $request->validate([
            'datewr' => 'required',
            'datewr1' => 'required',
            'number' => 'required',
            'number1' => 'required',
            'name' => 'required',
            'objective' => 'required',
          
        ],
        [
            'datewr.required' => 'กรุณากรอกวันที่เขียนขออนุญาต',
            'datewr1.required' => 'กรุณากรอกวันที่เขียนขออนุมัติ',
            'number.required' => 'กรุณากรอกเลขที่หนังสือขออนุญาต',
            'number1.required' => 'กรุณากรอกเลขที่หนังสือขออนุมัติ',
            'name.required' => 'กรุณากรอกชื่อโครงการ',
            'objective.required' => 'กรุณากรอกวัตถุประสงค์ของโครงการ',
          

        ]);
        $allow = new Allow();
        $allow->datewr = $request->datewr;
        $allow->datewr1 = $request->datewr1;
        $allow->number = $request->number;
        $allow->number1 = $request->number1;
        $allow->name = $request->name;
        $allow->activity = $request->activity;
        $allow->date = $request->date;
        $allow->location = $request->location;
        $allow->objective = $request->objective;

        $allow->save();
        return redirect()->route('allows.index')->with('status','บันทึกข้อมูลสำเร็จ');

    }

    public function delete($id){
        $allow = Allow::find($id);
        $allow->delete();
        return redirect()->route('allows.index')->with('status','ลบข้อมูลสำเร็จ');
    }

    public function edit($id){
        $allow = Allow::find($id);
        return view('admin.allows.edit',compact('allow'));
    }

    public function update(Request $request, $id){
        $allow = Allow::find($id);
        $allow->datewr = $request->datewr;
        $allow->datewr1 = $request->datewr1;
        $allow->number = $request->number;
        $allow->number1 = $request->number1;
        $allow->name = $request->name;
        $allow->activity = $request->activity;
        $allow->date = $request->date;
        $allow->location = $request->location;
        $allow->objective = $request->objective;
        $allow->update();
        return redirect()->route('allows.index')->with('status','แก้ไขข้อมูลสำเร็จ');
    }

    public function reportallow($id){
        $allow = Allow::find($id);
        $pdf = PDF::loadView('admin.allows.reportallow',['allow' => $allow]);
        return $pdf->stream('หนังสือขอนุญาตจัดทำโครงการ');
    }
    public function reportexcuseme($id){
        $allow = Allow::find($id);
        $pdf = PDF::loadView('admin.allows.reportexcuseme',['allow' => $allow]);
        return $pdf->stream('หนังสือขออนุมัติจัดทำโครงการ');
    }
}
