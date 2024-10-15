<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input as Input;
use PDF;
use App\Bookaft;
use App\User;
use File;

class BookaftController extends Controller
{
    public function index(){
        //$book = Book::all();
        $books = Bookaft::paginate(50);
        $books = Bookaft::orderBy('number','desc')->paginate(700);
        $count = Bookaft::count();
        //$books = Book::paginate(5);
        return view('admin.bookaft.Book',[
            'book' => $books,
            'count' => $count
        ]);

    }
    public function store(Request $request)
        {
            $validated = $request->validate([
                'number' => 'required|unique:bookafts',
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
            $books = new Bookaft();
            $books->number = $request->number;
            $books->date = $request->date;
            $books->go = $request->go;
            $books->to = $request->to;
            $books->content = $request->content;
            $books->practice = $request->practice;
            $books->note = $request->note;
            if ($request->hasFile('file')) {
            $filename = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path() . '/file/', $filename);
            $books->file = $filename;
            } else {
            $books->file =  'ไม่พบไฟล์PDF';
            }
            $books->save();
            return redirect('/admin/Book')->with('status','บันทึกข้อมูลสำเร็จ');
        }
    public function create(){
        return view('admin.bookaft.BookForm');
    }

    public function edit($id)
    {
        return view('admin.bookaft.edit')
        ->with('book',Bookaft::find($id));
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
            $books = Bookaft::find($id);
            $books->number = $request->number;
            $books->date = $request->date;
            $books->go = $request->go;
            $books->to = $request->to;
            $books->content = $request->content;
            $books->practice = $request->practice;
            $books->note = $request->note;

            if($request->hasFile('file')){
                if($books->file){
                    File::delete(public_path().'/file/'. $books->file);
                }
                $filename = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
                $request->file('file')->move(public_path() . '/file/', $filename);
                $books->file = $filename;
            }

                $books->save();
                return redirect('admin/Book')->with('status','แก้ไขข้อมูลสำเร็จ');
            }

            public function delete($id){
                $books = Bookaft::find($id);
                if($books->file){
                    if($books->file){File::delete(public_path().'/file/'. $books->file);
                }
                $books->delete();
            return redirect('admin/Book')->with('status','ลบข้อมูลสำเร็จ');
            }
        }
       public function pdfreport(){
           $books = Bookaft::all();
           $pdf = PDF::loadView('admin.bookaft.pdfview',['books' => $books]);
           return $pdf->stream( 'AFT_PSC.pdf');
       }
       public function useradmin(){
            $user = User::all();
            return view('admin.user.index',compact('user'));
       }
}
