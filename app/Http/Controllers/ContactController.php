<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contactme;

class ContactController extends Controller
{
    public function show()
    {
        $contact = Contactme::orderBy('id', 'desc')->paginate(30);
        return view('admin.contact.index', compact('contact'));
    }

    public function insert(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'message' => 'required',
            ],
            [
                'name.required' => 'กรุณาป้อนข้อมูลชื่อ-นามสกุล',
                'email.required' => 'กรุณาป้อนข้อมูลอีเมล์',
                'phone.required' => 'กรุณาป้อนข้อมูลโทรศัพท์',
                'message.required' => 'กรุณาป้อนข้อมูลข้อความ',

            ]
        );
        $contact = new Contactme();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
         $sToken = "1acsyNFntvhiG3twxhLfTqTsEnuAecxTxkUoww1BBUs";
        $sMessage = "ข้อความจากสมาชิก อวท. \n";
        $sMessage .= "Name : " . $request->name . "\n";
        $sMessage .= "Email : " . $request->email . "\n";
        $sMessage .= "Phone : " . $request->phone . "\n";
        $sMessage .= "Message : " . $request->message . "\n";

        $chOne = curl_init();
        curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
        curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($chOne, CURLOPT_POST, 1);
        curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=" . $sMessage);
        $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $sToken . '',);
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($chOne);

        //Result error
        if (curl_error($chOne)) {
            echo 'error:' . curl_error($chOne);
        } else {
            $result_ = json_decode($result, true);
            echo "status : " . $result_['status'];
            echo "message : " . $result_['message'];
        }
        curl_close($chOne);
        $contact->save();
        return Redirect()->back()->with('status', 'ข้อความของคุณได้ถูกส่งถึง อวท. เรียบร้อยแล้ว');
    }

    public function delete($id)
    {
        $delete = Contactme::find($id)->Delete();
        return redirect()->route('contact.show')->with('status', 'ลบข้อมูลถาวรเรียบร้อยแล้ว');
    }

    public function search(Request $request){
        $name=$request->search;
        $contacts=Contactme::where('name',"LIKE","%{$name}%")->paginate(3);
        return view("admin.contact.index")
        ->with("contact",$contacts);
    }

    public function insert1(Request $request ,$id){
        $contact = Contactme::find($id);
        $contact->status = $request->status;
        $contact->save();
        return redirect('/contact/index')->with('status','บันทึกข้อมูลแล้ว');

    }
    public function delete1(Request $request,$id)
    {
        $delete = Contactme::find($id);
        $delete->status = $request->status;
        $delete->save();
        return redirect('/contact/index')->with('status', 'ยกเลิกข้อความดำเนินการแล้ว');
    }
}
