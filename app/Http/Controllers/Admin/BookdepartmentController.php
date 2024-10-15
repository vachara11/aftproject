<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PDF;
use App\Accnumber;
use App\Mjnumber;
use App\Itnumber;
use App\Dmdnumber;
use App\Tournumber;
use App\Foodnumber;
use App\Micenumber;
use App\Dbtnumber;
use App\User;
use File;

class BookdepartmentController extends Controller
{
    //ชมรมวิชาชีพการบัญชี
    public function index(){
        //$book = Book::all();
        $books = Accnumber::paginate(50);
        $books = Accnumber::orderBy('number','desc')->paginate(700);
        $count = Accnumber::count();
        //$books = Book::paginate(5);
        return view('admin.Accnumber.Book',[
            'book' => $books,
            'count' => $count
        ]);

    }
    public function store(Request $request)
        {
            $validated = $request->validate([
                'number' => 'required|unique:accnumbers',
                'date' => 'required',
                'go' => 'required',
                'to' => 'required',
                'content' => 'required',
                'file' => 'mimes:pdf',
            ],
            [
                'number.required' => 'กรุณากรอกเลขทะเบียนหนังสือส่ง',
                'number.unique' => 'มีเลขทะเบียนหนังสือส่งนี้อยู่ในฐานข้อมูลแล้ว',
                'date.required' => 'กรุณากรอกวันที่ลงทะเบียน',
                'go.required' => 'กรุณากรอกข้อมูลฝ่ายที่ขอ',
                'to.required' => 'กรุณากรอกข้อมูลส่งถึงผู้อนุมัติ',
                'content.required' => 'กรุณากรอกชื่อเรื่อง',
                'file.mimes' => 'กรุณาเลือกไฟล์นามสกุล pdf เท่านั้น',

            ]);
            $books = new Accnumber();
            $books->number = $request->number;
            $books->date = $request->date;
            $books->go = $request->go;
            $books->to = $request->to;
            $books->content = $request->content;
            $books->practice = $request->practice;
            $books->note = $request->note;
            if ($request->hasFile('file')) {
            $filename = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path() . '/file/departnemt/', $filename);
            $books->file = $filename;
            } else {
            $books->file =  'ไม่พบไฟล์PDF';
            }
            $books->save();
            return redirect('admin/Accnumber/')->with('status','บันทึกข้อมูลสำเร็จ');
        }
    public function create(){
        return view('admin.Accnumber.BookForm');
    }

    public function edit($id)
    {
        return view('admin.Accnumber.edit')
        ->with('book',Accnumber::find($id));
    }

    public function update(Request $request,$id){
        $validated = $request->validate([
            'number' => 'required',
            'date' => 'required',
            'go' => 'required',
            'to' => 'required',
            'content' => 'required',
            'file' => 'mimes:pdf',
        ],
        [
            'number.required' => 'กรุณากรอกเลขทะเบียนหนังสือส่ง',
            'date.required' => 'กรุณากรอกวันที่ลงทะเบียน',
            'go.required' => 'กรุณากรอกข้อมูลฝ่ายที่ขอ',
            'to.required' => 'กรุณากรอกข้อมูลส่งถึงผู้อนุมัติ',
            'content.required' => 'กรุณากรอกชื่อเรื่อง',
            'file.mimes' => 'กรุณาเลือกไฟล์นามสกุล pdf เท่านั้น',

        ]);
            $books = Accnumber::find($id);
            $books->number = $request->number;
            $books->date = $request->date;
            $books->go = $request->go;
            $books->to = $request->to;
            $books->content = $request->content;
            $books->practice = $request->practice;
            $books->note = $request->note;

            if($request->hasFile('file')){
                if($books->file){
                    File::delete(public_path().'/file/departnemt/'. $books->file);
                }
                $filename = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
                $request->file('file')->move(public_path() . '/file/departnemt/', $filename);
                $books->file = $filename;
            }

                $books->save();
                return redirect('admin/Accnumber')->with('status','แก้ไขข้อมูลสำเร็จ');
            }

            public function delete($id){
                $books = Accnumber::find($id);
                if($books->file){
                    if($books->file){File::delete(public_path().'/file/departnemt/'. $books->file);
                }
                $books->delete();
            return redirect('admin/Accnumber')->with('status','ลบข้อมูลสำเร็จ');
            }
        }
   
       public function useradmin(){
            $user = User::all();
            return view('admin.user.index',compact('user'));
       }





     //ชมรมวิชาชีพการตลาด  
    public function indexmj(){
        //$book = Book::all();
        $books = Mjnumber::paginate(50);
        $books = Mjnumber::orderBy('number','desc')->paginate(700);
        $count = Mjnumber::count();
        //$books = Book::paginate(5);
        return view('admin.Mjnumber.Book',[
            'book' => $books,
            'count' => $count
        ]);

    }
    public function storemj(Request $request)
        {
            $validated = $request->validate([
                'number' => 'required|unique:mjnumbers',
                'date' => 'required',
                'go' => 'required',
                'to' => 'required',
                'content' => 'required',
                'file' => 'mimes:pdf',
            ],
            [
                'number.required' => 'กรุณากรอกเลขทะเบียนหนังสือส่ง',
                'number.unique' => 'มีเลขทะเบียนหนังสือส่งนี้อยู่ในฐานข้อมูลแล้ว',
                'date.required' => 'กรุณากรอกวันที่ลงทะเบียน',
                'go.required' => 'กรุณากรอกข้อมูลฝ่ายที่ขอ',
                'to.required' => 'กรุณากรอกข้อมูลส่งถึงผู้อนุมัติ',
                'content.required' => 'กรุณากรอกชื่อเรื่อง',
                'file.mimes' => 'กรุณาเลือกไฟล์นามสกุล pdf เท่านั้น',

            ]);
            $books = new Mjnumber();
            $books->number = $request->number;
            $books->date = $request->date;
            $books->go = $request->go;
            $books->to = $request->to;
            $books->content = $request->content;
            $books->practice = $request->practice;
            $books->note = $request->note;
            if ($request->hasFile('file')) {
            $filename = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path() . '/file/departnemt/', $filename);
            $books->file = $filename;
            } else {
            $books->file =  'ไม่พบไฟล์PDF';
            }
            $books->save();
            return redirect('admin/Mjnumber/')->with('status','บันทึกข้อมูลสำเร็จ');
        }
    public function createmj(){
        return view('admin.Mjnumber.BookForm');
    }

    public function editmj($id)
    {
        return view('admin.Mjnumber.edit')
        ->with('book',Mjnumber::find($id));
    }

    public function updatemj(Request $request,$id){
        $validated = $request->validate([
            'number' => 'required',
            'date' => 'required',
            'go' => 'required',
            'to' => 'required',
            'content' => 'required',
            'file' => 'mimes:pdf',
        ],
        [
            'number.required' => 'กรุณากรอกเลขทะเบียนหนังสือส่ง',
            'date.required' => 'กรุณากรอกวันที่ลงทะเบียน',
            'go.required' => 'กรุณากรอกข้อมูลฝ่ายที่ขอ',
            'to.required' => 'กรุณากรอกข้อมูลส่งถึงผู้อนุมัติ',
            'content.required' => 'กรุณากรอกชื่อเรื่อง',
            'file.mimes' => 'กรุณาเลือกไฟล์นามสกุล pdf เท่านั้น',

        ]);
            $books = Mjnumber::find($id);
            $books->number = $request->number;
            $books->date = $request->date;
            $books->go = $request->go;
            $books->to = $request->to;
            $books->content = $request->content;
            $books->practice = $request->practice;
            $books->note = $request->note;

            if($request->hasFile('file')){
                if($books->file){
                    File::delete(public_path().'/file/departnemt/'. $books->file);
                }
                $filename = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
                $request->file('file')->move(public_path() . '/file/departnemt/', $filename);
                $books->file = $filename;
            }

                $books->save();
                return redirect('admin/Mjnumber')->with('status','แก้ไขข้อมูลสำเร็จ');
            }

            public function deletemj($id){
                $books = Mjnumber::find($id);
                if($books->file){
                    if($books->file){File::delete(public_path().'/file/departnemt/'. $books->file);
                }
                $books->delete();
            return redirect('admin/Mjnumber')->with('status','ลบข้อมูลสำเร็จ');
            }
        }

       public function useradminmj(){
            $user = User::all();
            return view('admin.user.index',compact('user'));
       }


     //ชมรมวิชาชีพเทคโนโลยีสารสนเทศ  
    public function indexit(){
        //$book = Book::all();
        $books = Itnumber::paginate(50);
        $books = Itnumber::orderBy('number','desc')->paginate(700);
        $count = Itnumber::count();
        //$books = Book::paginate(5);
        return view('admin.Itnumber.Book',[
            'book' => $books,
            'count' => $count
        ]);

    }
    public function storeit(Request $request)
        {
            $validated = $request->validate([
                'number' => 'required|unique:itnumbers',
                'date' => 'required',
                'go' => 'required',
                'to' => 'required',
                'content' => 'required',
                'file' => 'mimes:pdf',
            ],
            [
                'number.required' => 'กรุณากรอกเลขทะเบียนหนังสือส่ง',
                'number.unique' => 'มีเลขทะเบียนหนังสือส่งนี้อยู่ในฐานข้อมูลแล้ว',
                'date.required' => 'กรุณากรอกวันที่ลงทะเบียน',
                'go.required' => 'กรุณากรอกข้อมูลฝ่ายที่ขอ',
                'to.required' => 'กรุณากรอกข้อมูลส่งถึงผู้อนุมัติ',
                'content.required' => 'กรุณากรอกชื่อเรื่อง',
                'file.mimes' => 'กรุณาเลือกไฟล์นามสกุล pdf เท่านั้น',

            ]);
            $books = new Itnumber();
            $books->number = $request->number;
            $books->date = $request->date;
            $books->go = $request->go;
            $books->to = $request->to;
            $books->content = $request->content;
            $books->practice = $request->practice;
            $books->note = $request->note;
            if ($request->hasFile('file')) {
            $filename = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path() . '/file/departnemt/', $filename);
            $books->file = $filename;
            } else {
            $books->file =  'ไม่พบไฟล์PDF';
            }
            $books->save();
            return redirect('admin/Itnumber/')->with('status','บันทึกข้อมูลสำเร็จ');
        }
    public function createit(){
        return view('admin.Itnumber.BookForm');
    }

    public function editit($id)
    {
        return view('admin.Itnumber.edit')
        ->with('book',Itnumber::find($id));
    }

    public function updateit(Request $request,$id){
        $validated = $request->validate([
            'number' => 'required',
            'date' => 'required',
            'go' => 'required',
            'to' => 'required',
            'content' => 'required',
            'file' => 'mimes:pdf',
        ],
        [
            'number.required' => 'กรุณากรอกเลขทะเบียนหนังสือส่ง',
            'date.required' => 'กรุณากรอกวันที่ลงทะเบียน',
            'go.required' => 'กรุณากรอกข้อมูลฝ่ายที่ขอ',
            'to.required' => 'กรุณากรอกข้อมูลส่งถึงผู้อนุมัติ',
            'content.required' => 'กรุณากรอกชื่อเรื่อง',
            'file.mimes' => 'กรุณาเลือกไฟล์นามสกุล pdf เท่านั้น',

        ]);
            $books = Itnumber::find($id);
            $books->number = $request->number;
            $books->date = $request->date;
            $books->go = $request->go;
            $books->to = $request->to;
            $books->content = $request->content;
            $books->practice = $request->practice;
            $books->note = $request->note;

            if($request->hasFile('file')){
                if($books->file){
                    File::delete(public_path().'/file/departnemt/'. $books->file);
                }
                $filename = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
                $request->file('file')->move(public_path() . '/file/departnemt/', $filename);
                $books->file = $filename;
            }

                $books->save();
                return redirect('admin/Itnumber')->with('status','แก้ไขข้อมูลสำเร็จ');
            }

            public function deleteit($id){
                $books = Itnumber::find($id);
                if($books->file){
                    if($books->file){File::delete(public_path().'/file/departnemt/'. $books->file);
                }
                $books->delete();
            return redirect('admin/Itnumber')->with('status','ลบข้อมูลสำเร็จ');
            }
        }

       public function useradminit(){
            $user = User::all();
            return view('admin.user.index',compact('user'));
       }


     //ชมรมวิชาชีพดิจิทัลกราฟิก
    public function indexdmd(){
        //$book = Book::all();
        $books = Dmdnumber::paginate(50);
        $books = Dmdnumber::orderBy('number','desc')->paginate(700);
        $count = Dmdnumber::count();
        //$books = Book::paginate(5);
        return view('admin.Dmdnumber.Book',[
            'book' => $books,
            'count' => $count
        ]);

    }
    public function storedmd(Request $request)
        {
            $validated = $request->validate([
                'number' => 'required|unique:dmdnumbers',
                'date' => 'required',
                'go' => 'required',
                'to' => 'required',
                'content' => 'required',
                'file' => 'mimes:pdf',
            ],
            [
                'number.required' => 'กรุณากรอกเลขทะเบียนหนังสือส่ง',
                'number.unique' => 'มีเลขทะเบียนหนังสือส่งนี้อยู่ในฐานข้อมูลแล้ว',
                'date.required' => 'กรุณากรอกวันที่ลงทะเบียน',
                'go.required' => 'กรุณากรอกข้อมูลฝ่ายที่ขอ',
                'to.required' => 'กรุณากรอกข้อมูลส่งถึงผู้อนุมัติ',
                'content.required' => 'กรุณากรอกชื่อเรื่อง',
                'file.mimes' => 'กรุณาเลือกไฟล์นามสกุล pdf เท่านั้น',

            ]);
            $books = new Dmdnumber();
            $books->number = $request->number;
            $books->date = $request->date;
            $books->go = $request->go;
            $books->to = $request->to;
            $books->content = $request->content;
            $books->practice = $request->practice;
            $books->note = $request->note;
            if ($request->hasFile('file')) {
            $filename = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path() . '/file/departnemt/', $filename);
            $books->file = $filename;
            } else {
            $books->file =  'ไม่พบไฟล์PDF';
            }
            $books->save();
            return redirect('admin/Dmdnumber/')->with('status','บันทึกข้อมูลสำเร็จ');
        }
    public function createdmd(){
        return view('admin.Dmdnumber.BookForm');
    }

    public function editdmd($id)
    {
        return view('admin.Dmdnumber.edit')
        ->with('book',Dmdnumber::find($id));
    }

    public function updatedmd(Request $request,$id){
        $validated = $request->validate([
            'number' => 'required',
            'date' => 'required',
            'go' => 'required',
            'to' => 'required',
            'content' => 'required',
            'file' => 'mimes:pdf',
        ],
        [
            'number.required' => 'กรุณากรอกเลขทะเบียนหนังสือส่ง',
            'date.required' => 'กรุณากรอกวันที่ลงทะเบียน',
            'go.required' => 'กรุณากรอกข้อมูลฝ่ายที่ขอ',
            'to.required' => 'กรุณากรอกข้อมูลส่งถึงผู้อนุมัติ',
            'content.required' => 'กรุณากรอกชื่อเรื่อง',
            'file.mimes' => 'กรุณาเลือกไฟล์นามสกุล pdf เท่านั้น',

        ]);
            $books = Dmdnumber::find($id);
            $books->number = $request->number;
            $books->date = $request->date;
            $books->go = $request->go;
            $books->to = $request->to;
            $books->content = $request->content;
            $books->practice = $request->practice;
            $books->note = $request->note;

            if($request->hasFile('file')){
                if($books->file){
                    File::delete(public_path().'/file/departnemt/'. $books->file);
                }
                $filename = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
                $request->file('file')->move(public_path() . '/file/departnemt/', $filename);
                $books->file = $filename;
            }

                $books->save();
                return redirect('admin/Dmdnumber')->with('status','แก้ไขข้อมูลสำเร็จ');
            }

            public function deletedmd($id){
                $books = Dmdnumber::find($id);
                if($books->file){
                    if($books->file){File::delete(public_path().'/file/departnemt/'. $books->file);
                }
                $books->delete();
            return redirect('admin/Dmdnumber')->with('status','ลบข้อมูลสำเร็จ');
            }
        }

       public function useradmindmd(){
            $user = User::all();
            return view('admin.user.index',compact('user'));
       }


     //ชมรมวิชาชีพการท่องเที่ยว
    public function indextour(){
        //$book = Book::all();
        $books = Tournumber::paginate(50);
        $books = Tournumber::orderBy('number','desc')->paginate(700);
        $count = Tournumber::count();
        //$books = Book::paginate(5);
        return view('admin.Tournumber.Book',[
            'book' => $books,
            'count' => $count
        ]);

    }
    public function storetour(Request $request)
        {
            $validated = $request->validate([
                'number' => 'required|unique:tournumbers',
                'date' => 'required',
                'go' => 'required',
                'to' => 'required',
                'content' => 'required',
                'file' => 'mimes:pdf',
            ],
            [
                'number.required' => 'กรุณากรอกเลขทะเบียนหนังสือส่ง',
                'number.unique' => 'มีเลขทะเบียนหนังสือส่งนี้อยู่ในฐานข้อมูลแล้ว',
                'date.required' => 'กรุณากรอกวันที่ลงทะเบียน',
                'go.required' => 'กรุณากรอกข้อมูลฝ่ายที่ขอ',
                'to.required' => 'กรุณากรอกข้อมูลส่งถึงผู้อนุมัติ',
                'content.required' => 'กรุณากรอกชื่อเรื่อง',
                'file.mimes' => 'กรุณาเลือกไฟล์นามสกุล pdf เท่านั้น',

            ]);
            $books = new Tournumber();
            $books->number = $request->number;
            $books->date = $request->date;
            $books->go = $request->go;
            $books->to = $request->to;
            $books->content = $request->content;
            $books->practice = $request->practice;
            $books->note = $request->note;
            if ($request->hasFile('file')) {
            $filename = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path() . '/file/departnemt/', $filename);
            $books->file = $filename;
            } else {
            $books->file =  'ไม่พบไฟล์PDF';
            }
            $books->save();
            return redirect('admin/Tournumber/')->with('status','บันทึกข้อมูลสำเร็จ');
        }
    public function createdtour(){
        return view('admin.Tournumber.BookForm');
    }

    public function editdtour($id)
    {
        return view('admin.Tournumber.edit')
        ->with('book',Tournumber::find($id));
    }

    public function updatetour(Request $request,$id){
        $validated = $request->validate([
            'number' => 'required',
            'date' => 'required',
            'go' => 'required',
            'to' => 'required',
            'content' => 'required',
            'file' => 'mimes:pdf',
        ],
        [
            'number.required' => 'กรุณากรอกเลขทะเบียนหนังสือส่ง',
            'date.required' => 'กรุณากรอกวันที่ลงทะเบียน',
            'go.required' => 'กรุณากรอกข้อมูลฝ่ายที่ขอ',
            'to.required' => 'กรุณากรอกข้อมูลส่งถึงผู้อนุมัติ',
            'content.required' => 'กรุณากรอกชื่อเรื่อง',
            'file.mimes' => 'กรุณาเลือกไฟล์นามสกุล pdf เท่านั้น',

        ]);
            $books = Tournumber::find($id);
            $books->number = $request->number;
            $books->date = $request->date;
            $books->go = $request->go;
            $books->to = $request->to;
            $books->content = $request->content;
            $books->practice = $request->practice;
            $books->note = $request->note;

            if($request->hasFile('file')){
                if($books->file){
                    File::delete(public_path().'/file/departnemt/'. $books->file);
                }
                $filename = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
                $request->file('file')->move(public_path() . '/file/departnemt/', $filename);
                $books->file = $filename;
            }

                $books->save();
                return redirect('admin/Tournumber')->with('status','แก้ไขข้อมูลสำเร็จ');
            }

            public function deletetour($id){
                $books = Tournumber::find($id);
                if($books->file){
                    if($books->file){File::delete(public_path().'/file/departnemt/'. $books->file);
                }
                $books->delete();
            return redirect('admin/Tournumber')->with('status','ลบข้อมูลสำเร็จ');
            }
        }

       public function useradmintour(){
            $user = User::all();
            return view('admin.user.index',compact('user'));
       }


     //ชมรมวิชาชีพอาหารและโภชนาการ
    public function indexfood(){
        //$book = Book::all();
        $books = Foodnumber::paginate(50);
        $books = Foodnumber::orderBy('number','desc')->paginate(700);
        $count = Foodnumber::count();
        //$books = Book::paginate(5);
        return view('admin.Foodnumber.Book',[
            'book' => $books,
            'count' => $count
        ]);

    }
    public function storefood(Request $request)
        {
            $validated = $request->validate([
                'number' => 'required|unique:foodnumbers',
                'date' => 'required',
                'go' => 'required',
                'to' => 'required',
                'content' => 'required',
                'file' => 'mimes:pdf',
            ],
            [
                'number.required' => 'กรุณากรอกเลขทะเบียนหนังสือส่ง',
                'number.unique' => 'มีเลขทะเบียนหนังสือส่งนี้อยู่ในฐานข้อมูลแล้ว',
                'date.required' => 'กรุณากรอกวันที่ลงทะเบียน',
                'go.required' => 'กรุณากรอกข้อมูลฝ่ายที่ขอ',
                'to.required' => 'กรุณากรอกข้อมูลส่งถึงผู้อนุมัติ',
                'content.required' => 'กรุณากรอกชื่อเรื่อง',
                'file.mimes' => 'กรุณาเลือกไฟล์นามสกุล pdf เท่านั้น',

            ]);
            $books = new Foodnumber();
            $books->number = $request->number;
            $books->date = $request->date;
            $books->go = $request->go;
            $books->to = $request->to;
            $books->content = $request->content;
            $books->practice = $request->practice;
            $books->note = $request->note;
            if ($request->hasFile('file')) {
            $filename = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path() . '/file/departnemt/', $filename);
            $books->file = $filename;
            } else {
            $books->file =  'ไม่พบไฟล์PDF';
            }
            $books->save();
            return redirect('admin/Foodnumber/')->with('status','บันทึกข้อมูลสำเร็จ');
        }
    public function createdfood(){
        return view('admin.Foodnumber.BookForm');
    }

    public function editdfood($id)
    {
        return view('admin.Foodnumber.edit')
        ->with('book',Foodnumber::find($id));
    }

    public function updatefood(Request $request,$id){
        $validated = $request->validate([
            'number' => 'required',
            'date' => 'required',
            'go' => 'required',
            'to' => 'required',
            'content' => 'required',
            'file' => 'mimes:pdf',
        ],
        [
            'number.required' => 'กรุณากรอกเลขทะเบียนหนังสือส่ง',
            'date.required' => 'กรุณากรอกวันที่ลงทะเบียน',
            'go.required' => 'กรุณากรอกข้อมูลฝ่ายที่ขอ',
            'to.required' => 'กรุณากรอกข้อมูลส่งถึงผู้อนุมัติ',
            'content.required' => 'กรุณากรอกชื่อเรื่อง',
            'file.mimes' => 'กรุณาเลือกไฟล์นามสกุล pdf เท่านั้น',

        ]);
            $books = Foodnumber::find($id);
            $books->number = $request->number;
            $books->date = $request->date;
            $books->go = $request->go;
            $books->to = $request->to;
            $books->content = $request->content;
            $books->practice = $request->practice;
            $books->note = $request->note;

            if($request->hasFile('file')){
                if($books->file){
                    File::delete(public_path().'/file/departnemt/'. $books->file);
                }
                $filename = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
                $request->file('file')->move(public_path() . '/file/departnemt/', $filename);
                $books->file = $filename;
            }

                $books->save();
                return redirect('admin/Foodnumber')->with('status','แก้ไขข้อมูลสำเร็จ');
            }

            public function deletefood($id){
                $books = Foodnumber::find($id);
                if($books->file){
                    if($books->file){File::delete(public_path().'/file/departnemt/'. $books->file);
                }
                $books->delete();
            return redirect('admin/Foodnumber')->with('status','ลบข้อมูลสำเร็จ');
            }
        }

       public function useradminfood(){
            $user = User::all();
            return view('admin.user.index',compact('user'));
       }


     //ชมรมวิชาชีพไมซ์และอีเว้นต์
    public function indexmice(){
        //$book = Book::all();
        $books = Micenumber::paginate(50);
        $books = Micenumber::orderBy('number','desc')->paginate(700);
        $count = Micenumber::count();
        //$books = Book::paginate(5);
        return view('admin.Micenumber.Book',[
            'book' => $books,
            'count' => $count
        ]);

    }
    public function storemice(Request $request)
        {
            $validated = $request->validate([
                'number' => 'required|unique:micenumbers',
                'date' => 'required',
                'go' => 'required',
                'to' => 'required',
                'content' => 'required',
                'file' => 'mimes:pdf',
            ],
            [
                'number.required' => 'กรุณากรอกเลขทะเบียนหนังสือส่ง',
                'number.unique' => 'มีเลขทะเบียนหนังสือส่งนี้อยู่ในฐานข้อมูลแล้ว',
                'date.required' => 'กรุณากรอกวันที่ลงทะเบียน',
                'go.required' => 'กรุณากรอกข้อมูลฝ่ายที่ขอ',
                'to.required' => 'กรุณากรอกข้อมูลส่งถึงผู้อนุมัติ',
                'content.required' => 'กรุณากรอกชื่อเรื่อง',
                'file.mimes' => 'กรุณาเลือกไฟล์นามสกุล pdf เท่านั้น',

            ]);
            $books = new Micenumber();
            $books->number = $request->number;
            $books->date = $request->date;
            $books->go = $request->go;
            $books->to = $request->to;
            $books->content = $request->content;
            $books->practice = $request->practice;
            $books->note = $request->note;
            if ($request->hasFile('file')) {
            $filename = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path() . '/file/departnemt/', $filename);
            $books->file = $filename;
            } else {
            $books->file =  'ไม่พบไฟล์PDF';
            }
            $books->save();
            return redirect('admin/Micenumber/')->with('status','บันทึกข้อมูลสำเร็จ');
        }
    public function createdmice(){
        return view('admin.Micenumber.BookForm');
    }

    public function editmice($id)
    {
        return view('admin.Micenumber.edit')
        ->with('book',Micenumber::find($id));
    }

    public function updatemice(Request $request,$id){
        $validated = $request->validate([
            'number' => 'required',
            'date' => 'required',
            'go' => 'required',
            'to' => 'required',
            'content' => 'required',
            'file' => 'mimes:pdf',
        ],
        [
            'number.required' => 'กรุณากรอกเลขทะเบียนหนังสือส่ง',
            'date.required' => 'กรุณากรอกวันที่ลงทะเบียน',
            'go.required' => 'กรุณากรอกข้อมูลฝ่ายที่ขอ',
            'to.required' => 'กรุณากรอกข้อมูลส่งถึงผู้อนุมัติ',
            'content.required' => 'กรุณากรอกชื่อเรื่อง',
            'file.mimes' => 'กรุณาเลือกไฟล์นามสกุล pdf เท่านั้น',

        ]);
            $books = Micenumber::find($id);
            $books->number = $request->number;
            $books->date = $request->date;
            $books->go = $request->go;
            $books->to = $request->to;
            $books->content = $request->content;
            $books->practice = $request->practice;
            $books->note = $request->note;

            if($request->hasFile('file')){
                if($books->file){
                    File::delete(public_path().'/file/departnemt/'. $books->file);
                }
                $filename = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
                $request->file('file')->move(public_path() . '/file/departnemt/', $filename);
                $books->file = $filename;
            }

                $books->save();
                return redirect('admin/Micenumber')->with('status','แก้ไขข้อมูลสำเร็จ');
            }

            public function deletedmice($id){
                $books = Micenumber::find($id);
                if($books->file){
                    if($books->file){File::delete(public_path().'/file/departnemt/'. $books->file);
                }
                $books->delete();
            return redirect('admin/Micenumber')->with('status','ลบข้อมูลสำเร็จ');
            }
        }

       public function useradminmice(){
            $user = User::all();
            return view('admin.user.index',compact('user'));
       }


     //ชมรมวิชาชีพเทคโนโลยีธุรกิจดิจิทัล
    public function indexdbt(){
        //$book = Book::all();
        $books = Dbtnumber::paginate(50);
        $books = Dbtnumber::orderBy('number','desc')->paginate(700);
        $count = Dbtnumber::count();
        //$books = Book::paginate(5);
        return view('admin.Dbtnumber.Book',[
            'book' => $books,
            'count' => $count
        ]);

    }
    public function storedbt(Request $request)
        {
            $validated = $request->validate([
                'number' => 'required|unique:dbtnumbers',
                'date' => 'required',
                'go' => 'required',
                'to' => 'required',
                'content' => 'required',
                'file' => 'mimes:pdf',
            ],
            [
                'number.required' => 'กรุณากรอกเลขทะเบียนหนังสือส่ง',
                'number.unique' => 'มีเลขทะเบียนหนังสือส่งนี้อยู่ในฐานข้อมูลแล้ว',
                'date.required' => 'กรุณากรอกวันที่ลงทะเบียน',
                'go.required' => 'กรุณากรอกข้อมูลฝ่ายที่ขอ',
                'to.required' => 'กรุณากรอกข้อมูลส่งถึงผู้อนุมัติ',
                'content.required' => 'กรุณากรอกชื่อเรื่อง',
                'file.mimes' => 'กรุณาเลือกไฟล์นามสกุล pdf เท่านั้น',

            ]);
            $books = new Dbtnumber();
            $books->number = $request->number;
            $books->date = $request->date;
            $books->go = $request->go;
            $books->to = $request->to;
            $books->content = $request->content;
            $books->practice = $request->practice;
            $books->note = $request->note;
            if ($request->hasFile('file')) {
            $filename = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path() . '/file/departnemt/', $filename);
            $books->file = $filename;
            } else {
            $books->file =  'ไม่พบไฟล์PDF';
            }
            $books->save();
            return redirect('admin/Dbtnumber/')->with('status','บันทึกข้อมูลสำเร็จ');
        }
    public function createddbt(){
        return view('admin.Dbtnumber.BookForm');
    }

    public function editdbt($id)
    {
        return view('admin.Dbtnumber.edit')
        ->with('book',Dbtnumber::find($id));
    }

    public function updatedbt(Request $request,$id){
        $validated = $request->validate([
            'number' => 'required',
            'date' => 'required',
            'go' => 'required',
            'to' => 'required',
            'content' => 'required',
            'file' => 'mimes:pdf',
        ],
        [
            'number.required' => 'กรุณากรอกเลขทะเบียนหนังสือส่ง',
            'date.required' => 'กรุณากรอกวันที่ลงทะเบียน',
            'go.required' => 'กรุณากรอกข้อมูลฝ่ายที่ขอ',
            'to.required' => 'กรุณากรอกข้อมูลส่งถึงผู้อนุมัติ',
            'content.required' => 'กรุณากรอกชื่อเรื่อง',
            'file.mimes' => 'กรุณาเลือกไฟล์นามสกุล pdf เท่านั้น',

        ]);
            $books = Dbtnumber::find($id);
            $books->number = $request->number;
            $books->date = $request->date;
            $books->go = $request->go;
            $books->to = $request->to;
            $books->content = $request->content;
            $books->practice = $request->practice;
            $books->note = $request->note;

            if($request->hasFile('file')){
                if($books->file){
                    File::delete(public_path().'/file/departnemt/'. $books->file);
                }
                $filename = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
                $request->file('file')->move(public_path() . '/file/departnemt/', $filename);
                $books->file = $filename;
            }

                $books->save();
                return redirect('admin/Dbtnumber')->with('status','แก้ไขข้อมูลสำเร็จ');
            }

            public function deletedbt($id){
                $books = Dbtnumber::find($id);
                if($books->file){
                    if($books->file){File::delete(public_path().'/file/departnemt/'. $books->file);
                }
                $books->delete();
            return redirect('admin/Dbtnumber')->with('status','ลบข้อมูลสำเร็จ');
            }
        }

       public function useradmindbt(){
            $user = User::all();
            return view('admin.user.index',compact('user'));
       }

       
}
