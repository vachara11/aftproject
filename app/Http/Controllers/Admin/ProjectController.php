<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $project = Project::orderBy('id', 'desc')->paginate(30);
        return view('admin.project.index',compact('project'));
    }

    public function insert(){
        return view('admin.project.create');
    }

    public function create(Request $request){
        $request->validate([
            'name' => 'required',
            'date' => 'required',
            

        ], [
            'name.required' => 'กรุณากรอกชื่อกิจกรรม',
            'date.required' => 'กรุณากรอกวันที่ทำกิจกรรม',
            

        ]);
        $project = new Project();
        $project->name = $request->name;
        $project->term = $request->term;
        $project->date = $request->date;
        $project->ptotal = $request->ptotal;
        $project->pnumber = $request->pnumber;
        $project->ppercen = $request->ppercen;
        $project->knumber = $request->knumber;
        $project->kpercen = $request->kpercen;
        $project->budget = $request->budget;
        $project->jbudget = $request->jbudget;
        $project->save();
        return redirect('/admin/project/index')->with('status', 'บันทึกข้อมูลสำเร็จ');

    }

    public function edit($id){
        $pro = Project::find($id);
        return view('admin.project.edit',compact('pro'));
    }

    public function update(Request $request, $id){
        $project = Project::find($id);
        $project->name = $request->name;
        $project->term = $request->term;
        $project->date = $request->date;
        $project->ptotal = $request->ptotal;
        $project->pnumber = $request->pnumber;
        $project->ppercen = $request->ppercen;
        $project->knumber = $request->knumber;
        $project->kpercen = $request->kpercen;
        $project->budget = $request->budget;
        $project->jbudget = $request->jbudget;
        $project->update();
        return redirect('/admin/project/index')->with('status', 'แก้ไขข้อมูลสำเร็จ');
    }

    public function delete($id){
        $project = Project::find($id);
        $project->delete();
        return redirect('/admin/project/index')->with('status', 'ลบข้อมูลสำเร็จ');
    }

    public function pass(Request $request,$id){
        $pro = Project::find($id);
        $pro->status = $request->status;
        $pro->save();
        return redirect('/admin/project/index')->with('status','แก้ไขสถานะแล้ว');
    }
}
