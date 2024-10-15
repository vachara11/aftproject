<?php

namespace App\Http\Controllers\Admin;

use App\Bank;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index(){
        $bank = Bank::orderBy('date','ASC')->paginate(200);
        return view('admin.bank.index',compact('bank'));
    }

    public function create(){
        return view('admin.bank.create');
    }

    public function insert(Request $request){
        $request->validate([
            'date' => 'required',
            'name' => 'required',
        ], [
            'date.required' => 'กรุณากรอกวัน เดือน ปี ที่ทำรายการ',
            'name.required' => 'กรุณากรอกรายการบัญชี',
        ]);
        $bank = new Bank();
        $bank->date = $request->date;
        $bank->name = $request->name;
        $bank->in = $request->in;
        $bank->out = $request->out;
        $bank->total = $bank->in - $request->out;
        $bank->save();
        return redirect('/admin/bank/index')->with('status','บันทึกข้อมูลสำเร็จ');
    }

    public function edit($id){
        $bank = Bank::find($id);
        return view('admin.bank.edit',compact('bank'));
    }

    public function update(Request $request, $id){
        $bank = Bank::find($id);
        $bank->date = $request->date;
        $bank->name = $request->name;
        $bank->in = $request->in;
        $bank->out = $request->out;
        $bank->total = $bank->in - $request->out;
        $bank->save();
        return redirect('/admin/bank/index')->with('status','แก้ไขข้อมูลสำเร็จ');
    }

    public function delete($id){
        $bank = Bank::find($id);
        $bank->delete();
        return redirect('/admin/bank/index')->with('status','ลบข้อมูลสำเร็จ');
    }

}
