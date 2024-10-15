<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use File;
use Illuminate\Support\Str;
use App\Certificate;
use Facade\Ignition\DumpRecorder\Dump;

class CertificateController extends Controller
{
    public function index(){
        $certificate = Certificate::orderBy('created_at','desc')->paginate(100);
        return view('admin.certificate.index',compact('certificate'));
    }

    public function create(){
        return view('admin.certificate.create');
    }

    public function insert(Request $request){
        $validated = $request->validate([
            'startnumber' => 'required|unique:certificates',
            'endnumber' => 'required',
            'date' => 'required',
            'year' => 'required',
            'name' => 'required',
            'file' => 'mimes:pdf',
        ],
        [
            'startnumber.required' => 'กรุณากรอกเลขที่เกียรติบัตร',
            'startnumber.unique' => 'มีเลขทะเบียนเลขที่นี้อยู่ในฐานข้อมูลแล้ว',
            'endnumber.required' => 'กรุณากรอกชื่อ-นามสกุล',
            'date.required' => 'กรุณากรอกวันที่ให้',
            'year.required' => 'กรุณากรอกปีการศึกษา',
            'name.required' => 'กรุณากรอกชื่อเกียรติบัตร',
            'file.mimes' => 'กรุณาเลือกไฟล์นามสกุล pdf เท่านั้น',

        ]);
        $certificate = new Certificate();
        $certificate->startnumber = $request->startnumber;
        $certificate->endnumber = $request->endnumber;
        $certificate->date = $request->date;
        $certificate->year = $request->year;
        $certificate->name = $request->name;
        $certificate->note = $request->note;
        if ($request->hasFile('file')) {
        $filename = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
        $request->file('file')->move(public_path() . '/certificate/', $filename);
        $certificate->file = $filename;
        } else {
        $certificate->file =  'ไม่พบไฟล์PDF';
        }
        $certificate->save();
        return redirect('admin/certificate/index')->with('status','บันทึกข้อมูลสำเร็จ');
    }

    public function delete($id){
        $certificate = Certificate::find($id);
        if($certificate->file){
            if($certificate->file){File::delete(public_path().'/certificate/'. $certificate->file);
        }
        $certificate->delete();
        return redirect('admin/certificate/index')->with('status','ลบข้อมูลสำเร็จ');
    }
}

    public function edit($id){
        return view('admin.certificate.edit')
        ->with('certificate',Certificate::find($id));
    }

    public function update(Request $request,$id){
        $validated = $request->validate([
            'startnumber' => 'required',
            'endnumber' => 'required',
            'date' => 'required',
            'year' => 'required',
            'name' => 'required',
            'file' => 'mimes:pdf',
        ],
        [
            'startnumber.required' => 'กรุณากรอกเลขที่เกียรติบัตร',
            'endnumber.required' => 'กรุณากรอกชื่อ-นามสกุล',
            'date.required' => 'กรุณากรอกวันที่ให้',
            'year.required' => 'กรุณากรอกปีการศึกษา',
            'name.required' => 'กรุณากรอกชื่อเกียรติบัตร',
            'file.mimes' => 'กรุณาเลือกไฟล์นามสกุล pdf เท่านั้น',

        ]);
            $certificate = Certificate::find($id);
            $certificate->startnumber = $request->startnumber;
            $certificate->endnumber = $request->endnumber;
            $certificate->date = $request->date;
            $certificate->year = $request->year;
            $certificate->name = $request->name;
            $certificate->note = $request->note;

            if($request->hasFile('file')){
                if($certificate->file){
                    File::delete(public_path().'/certificate/'. $certificate->file);
                }
                $filename = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
                $request->file('file')->move(public_path() . '/certificate/', $filename);
                $certificate->file = $filename;
            }

                $certificate->save();
                return redirect('admin/certificate/index')->with('status','แก้ไขข้อมูลสำเร็จ');
    }

}
