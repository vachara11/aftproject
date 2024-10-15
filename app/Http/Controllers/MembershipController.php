<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Memberships;

class MembershipController extends Controller
{
    public function show(){
        $memberships = Memberships::orderBy('id','desc')->paginate(100);
        return view('admin.membership.index',compact('memberships'));
    }

    public function insert(){
        return view('admin.membership.insert');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'days' => 'required',
            'months' => 'required',
            'years' => 'required',
            'name' => 'required',
            'classroom' => 'required',
            'student_id' => 'required|unique:memberships',
            'department' => 'required',
            'major_works' => 'required',
            'day' => 'required',
            'month' => 'required',
            'year' => 'required',
            'house_number' => 'required',
            'district' => 'required',
            'county' => 'required',
            'province' => 'required',
            'zip_code' => 'required',
            'phone' => 'required',
            'father' => 'required',
            'mother' => 'required',
            'professional' => 'required',
            'parent' => 'required',
        ],
        [
            'days.required'=>'กรุณาป้อนวันที่สมัคร',
            'months.required'=>'กรุณาป้อนเดือนที่สมัคร',
            'years.required'=>'กรุณาป้อนปีพ.ศ.ที่สมัคร',
            'name.required'=>'กรุณาป้อนชื่อ-นามสกุล',
            'classroom.required'=>'กรุณาป้อนระดับชั้น',
            'student_id.required'=>'กรุณาป้อนรหัสนักเรียน นักศึกษา',
            'student_id.unique'=>'มีรหัสนักเรียน นักศึกษานี้อยู่ในฐานข้อมูลแล้ว',
            'department.required'=>'กรุณาป้อนสาขาวิชา',
            'major_works.required'=>'กรุณาป้อนสาขางาน',
            'day.required'=>'กรุณาป้อนวันที่เกิด',
            'month.required'=>'กรุณาป้อนเดือนที่เกิด',
            'year.required'=>'กรุณาป้อนปี พ.ศ. ที่เกิด',
            'house_number.required'=>'กรุณาป้อนบ้านเลขที่',
            'district.required'=>'กรุณาป้อนแขวง/ตำบล',
            'county.required'=>'กรุณาป้อนเขต/อำเภอ',
            'province.required'=>'กรุณาป้อนจังหวัด',
            'zip_code.required'=>'กรุณาป้อนรหัสไปรษณีย์',
            'phone.required'=>'กรุณาป้อนเบอร์โทรศัพท์',
            'father.required'=>'กรุณาป้อนชื่อบิดา',
            'mother.required'=>'กรุณาป้อนชื่อมารดา',
            'professional.required'=>'กรุณาป้อนชมรมวิชาชีพ',
            'parent.required'=>'กรุณาป้อนชื่อผู้ปกครอง',

        ]);
        $membership = new Memberships();
        $membership->days = $request->days;
        $membership->months = $request->months;
        $membership->years = $request->years;
        $membership->name = $request->name;
        $membership->classroom = $request->classroom;
        $membership->student_id = $request->student_id;
        $membership->department = $request->department;
        $membership->major_works = $request->major_works;
        $membership->day = $request->day;
        $membership->month = $request->month;
        $membership->year = $request->year;
        $membership->house_number = $request->house_number;
        $membership->alley = $request->alley;
        $membership->road = $request->road;
        $membership->district = $request->district;
        $membership->county = $request->county;
        $membership->province = $request->province;
        $membership->zip_code = $request->zip_code;
        $membership->phone = $request->phone;
        $membership->father = $request->father;
        $membership->mother = $request->mother;
        $membership->professional = $request->professional;
        $membership->parent = $request->parent;
        $membership->save();
        return Redirect()->route('all.membership')->with('status','บันทึกข้อมูลสำเร็จ');
    }

    public function edit($id){
        $membership = Memberships::find($id);
        return view('admin.membership.edit',compact('membership'));
    }

    public function update(Request $request ,$id){
        $validated = $request->validate([
            'days' => 'required',
            'months' => 'required',
            'years' => 'required',
            'name' => 'required',
            'classroom' => 'required',
            'student_id' => 'required',
            'student_id' => 'required',
            'department' => 'required',
            'major_works' => 'required',
            'day' => 'required',
            'month' => 'required',
            'year' => 'required',
            'house_number' => 'required',
            'alley' => 'required',
            'road' => 'required',
            'district' => 'required',
            'county' => 'required',
            'province' => 'required',
            'zip_code' => 'required',
            'phone' => 'required',
            'father' => 'required',
            'mother' => 'required',
            'professional' => 'required',
            'parent' => 'required',
        ],
        [
            'days.required'=>'กรุณาป้อนวันที่สมัคร',
            'months.required'=>'กรุณาป้อนเดือนที่สมัคร',
            'years.required'=>'กรุณาป้อนปีพ.ศ.ที่สมัคร',
            'name.required'=>'กรุณาป้อนชื่อ-นามสกุล',
            'classroom.required'=>'กรุณาป้อนระดับชั้น',
            'student_id.required'=>'กรุณาป้อนรหัสนักเรียน นักศึกษา',
            'department.required'=>'กรุณาป้อนสาขาวิชา',
            'major_works.required'=>'กรุณาป้อนสาขางาน',
            'day.required'=>'กรุณาป้อนวันที่เกิด',
            'month.required'=>'กรุณาป้อนเดือนที่เกิด',
            'year.required'=>'กรุณาป้อนปี พ.ศ. ที่เกิด',
            'house_number.required'=>'กรุณาป้อนบ้านเลขที่',
            'alley.required'=>'กรุณาป้อนตรอก/ซอย',
            'road.required'=>'กรุณาป้อนถนน/หมูที่',
            'district.required'=>'กรุณาป้อนแขวง/ตำบล',
            'county.required'=>'กรุณาป้อนเขต/อำเภอ',
            'province.required'=>'กรุณาป้อนจังหวัด',
            'zip_code.required'=>'กรุณาป้อนรหัสไปรษณีย์',
            'phone.required'=>'กรุณาป้อนเบอร์โทรศัพท์',
            'father.required'=>'กรุณาป้อนชื่อบิดา',
            'mother.required'=>'กรุณาป้อนชื่อมารดา',
            'professional.required'=>'กรุณาป้อนชมรมวิชาชีพ',
            'parent.required'=>'กรุณาป้อนชื่อผู้ปกครอง',

        ]);
        $update = Memberships::find($id)->update([
        'days' => $request->days,
        'months' => $request->months,
        'years' => $request->years,
        'name' => $request->name,
        'classroom' => $request->classroom,
        'student_id' => $request->student_id,
        'department' => $request->department,
        'major_works' => $request->major_works,
        'day' => $request->day,
        'month' => $request->month,
        'year' => $request->year,
        'house_number' => $request->house_number,
        'alley' => $request->alley,
        'road' => $request->road,
        'district' => $request->district,
        'county' => $request->county,
        'province' => $request->province,
        'zip_code' => $request->zip_code,
        'phone' => $request->phone,
        'father' => $request->father,
        'mother' => $request->mother,
        'professional' => $request->professional,
        'parent' => $request->parent,
        ]);
        return Redirect()->route('all.membership')->with('status','แก้ไขข้อมูลสำเร็จ');
    }

    public function delete($id){
        $delete = Memberships::find($id)->Delete();
        return Redirect()->route('all.membership');
    }

    public function pdfreport($id){
        $membership = Memberships::find($id);
        $pdf = PDF::loadView('admin.membership.exportpdf',['membership' => $membership]);
        return $pdf->stream('แบบอวท.๐๖.pdf');
    }

    public function pdfaft($id){
        $membership = Memberships::find($id);
        $pdf = PDF::loadView('admin.membership.exportpdfaft',['membership' => $membership]);
        return $pdf->stream('แบบอวท.๑๐.pdf');
    }

    public function showfontend(){
        return view('font_end.member.membership');
    }

    public function storefontend(Request $request){
        $validated = $request->validate([
            'days' => 'required',
            'months' => 'required',
            'years' => 'required',
            'name' => 'required',
            'classroom' => 'required',
            'student_id' => 'required|unique:memberships',
            'department' => 'required',
            'major_works' => 'required',
            'day' => 'required',
            'month' => 'required',
            'year' => 'required',
            'house_number' => 'required',
            'alley' => 'required',
            'road' => 'required',
            'district' => 'required',
            'county' => 'required',
            'province' => 'required',
            'zip_code' => 'required',
            'phone' => 'required',
            'father' => 'required',
            'mother' => 'required',
            'professional' => 'required',
            'parent' => 'required',
        ],
        [
            'days.required'=>'กรุณาป้อนวันที่สมัคร',
            'months.required'=>'กรุณาป้อนเดือนที่สมัคร',
            'years.required'=>'กรุณาป้อนปีพ.ศ.ที่สมัคร',
            'name.required'=>'กรุณาป้อนชื่อ-นามสกุล',
            'classroom.required'=>'กรุณาป้อนระดับชั้น',
            'student_id.required'=>'กรุณาป้อนรหัสนักเรียน นักศึกษา',
            'student_id.unique'=>'มีรหัสนักเรียน นักศึกษานี้อยู่ในระบบแล้วกรุณาลองใหม่',
            'department.required'=>'กรุณาป้อนสาขาวิชา',
            'major_works.required'=>'กรุณาป้อนสาขางาน',
            'day.required'=>'กรุณาป้อนวันที่เกิด',
            'month.required'=>'กรุณาป้อนเดือนที่เกิด',
            'year.required'=>'กรุณาป้อนปี พ.ศ. ที่เกิด',
            'house_number.required'=>'กรุณาป้อนบ้านเลขที่',
            'alley.required'=>'กรุณาป้อนตรอก/ซอย',
            'road.required'=>'กรุณาป้อนถนน/หมูที่',
            'district.required'=>'กรุณาป้อนแขวง/ตำบล',
            'county.required'=>'กรุณาป้อนเขต/อำเภอ',
            'province.required'=>'กรุณาป้อนจังหวัด',
            'zip_code.required'=>'กรุณาป้อนรหัสไปรษณีย์',
            'phone.required'=>'กรุณาป้อนเบอร์โทรศัพท์',
            'father.required'=>'กรุณาป้อนชื่อบิดา',
            'mother.required'=>'กรุณาป้อนชื่อมารดา',
            'professional.required'=>'กรุณาป้อนชมรมวิชาชีพ',
            'parent.required'=>'กรุณาป้อนชื่อผู้ปกครอง',

        ]);
        $membership = new Memberships();
        $membership->days = $request->days;
        $membership->months = $request->months;
        $membership->years = $request->years;
        $membership->name = $request->name;
        $membership->classroom = $request->classroom;
        $membership->student_id = $request->student_id;
        $membership->department = $request->department;
        $membership->major_works = $request->major_works;
        $membership->day = $request->day;
        $membership->month = $request->month;
        $membership->year = $request->year;
        $membership->house_number = $request->house_number;
        $membership->alley = $request->alley;
        $membership->road = $request->road;
        $membership->district = $request->district;
        $membership->county = $request->county;
        $membership->province = $request->province;
        $membership->zip_code = $request->zip_code;
        $membership->phone = $request->phone;
        $membership->father = $request->father;
        $membership->mother = $request->mother;
        $membership->professional = $request->professional;
        $membership->parent = $request->parent;
        $membership->save();
        return Redirect()->route('datasearch.fontend')->with('status','บันทึกข้อมูลสำเร็จ');
    }

    public function search(Request $request){
        $name=$request->search;
        $membership=Memberships::where('department',"LIKE","%{$name}%")->paginate(1000);
        return view("admin.membership.index")
        ->with("memberships",$membership);
    }

    public function datasearchfontend(){
        $memberships = Memberships::all();
        return view("font_end.member.searchdata",compact('memberships'));
    }

    public function fontendsearch(Request $request){
        $name=$request->search;
        if($name != ''){
            $membership=Memberships::where('student_id',"=",$name)->paginate(1);
        }else{
            return redirect()->back()->with('err','คุณยังไม่ได้กรอกข้อมูล');
        }
        return view("font_end.member.datasearch")->with("memberships",$membership);
    }
    public function editfontend($id){
        $membership = Memberships::find($id);
        return view('font_end.member.edit',compact('membership'));
    }

    public function fontendupdate(Request $request ,$id){
        $validated = $request->validate([
            'days' => 'required',
            'months' => 'required',
            'years' => 'required',
            'name' => 'required',
            'classroom' => 'required',
            'student_id' => 'required',
            'department' => 'required',
            'major_works' => 'required',
            'day' => 'required',
            'month' => 'required',
            'year' => 'required',
            'house_number' => 'required',
            'alley' => 'required',
            'road' => 'required',
            'district' => 'required',
            'county' => 'required',
            'province' => 'required',
            'zip_code' => 'required',
            'phone' => 'required',
            'father' => 'required',
            'mother' => 'required',
            'professional' => 'required',
            'parent' => 'required',
        ],
        [
            'days.required'=>'กรุณาป้อนวันที่สมัคร',
            'months.required'=>'กรุณาป้อนเดือนที่สมัคร',
            'years.required'=>'กรุณาป้อนปีพ.ศ.ที่สมัคร',
            'name.required'=>'กรุณาป้อนชื่อ-นามสกุล',
            'classroom.required'=>'กรุณาป้อนระดับชั้น',
            'student_id.required'=>'กรุณาป้อนรหัสนักเรียน นักศึกษา',
            'department.required'=>'กรุณาป้อนสาขาวิชา',
            'major_works.required'=>'กรุณาป้อนสาขางาน',
            'day.required'=>'กรุณาป้อนวันที่เกิด',
            'month.required'=>'กรุณาป้อนเดือนที่เกิด',
            'year.required'=>'กรุณาป้อนปี พ.ศ. ที่เกิด',
            'house_number.required'=>'กรุณาป้อนบ้านเลขที่',
            'alley.required'=>'กรุณาป้อนตรอก/ซอย',
            'road.required'=>'กรุณาป้อนถนน/หมูที่',
            'district.required'=>'กรุณาป้อนแขวง/ตำบล',
            'county.required'=>'กรุณาป้อนเขต/อำเภอ',
            'province.required'=>'กรุณาป้อนจังหวัด',
            'zip_code.required'=>'กรุณาป้อนรหัสไปรษณีย์',
            'phone.required'=>'กรุณาป้อนเบอร์โทรศัพท์',
            'father.required'=>'กรุณาป้อนชื่อบิดา',
            'mother.required'=>'กรุณาป้อนชื่อมารดา',
            'professional.required'=>'กรุณาป้อนชมรมวิชาชีพ',
            'parent.required'=>'กรุณาป้อนชื่อผู้ปกครอง',

        ]);
        $update = Memberships::find($id)->update([
        'days' => $request->days,
        'months' => $request->months,
        'years' => $request->years,
        'name' => $request->name,
        'classroom' => $request->classroom,
        'student_id' => $request->student_id,
        'department' => $request->department,
        'major_works' => $request->major_works,
        'day' => $request->day,
        'month' => $request->month,
        'year' => $request->year,
        'house_number' => $request->house_number,
        'alley' => $request->alley,
        'road' => $request->road,
        'district' => $request->district,
        'county' => $request->county,
        'province' => $request->province,
        'zip_code' => $request->zip_code,
        'phone' => $request->phone,
        'father' => $request->father,
        'mother' => $request->mother,
        'professional' => $request->professional,
        'parent' => $request->parent,
        ]);
        return Redirect()->route('datasearch.fontend')->with('status','แก้ไขข้อมูลสำเร็จ');
    }



}
