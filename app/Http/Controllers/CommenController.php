<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommenController extends Controller
{
    public function index(){
        return view('font_end.comment.index');
    }

    public function show(){
        $comment = Comment::orderBy('id', 'desc')->paginate(30);
        return view('admin.comment.index',compact('comment'));
    }

    public function create(Request $request){
        $validated = $request->validate(
            [
                'title' => 'required',
                'comment' => 'required',
            ],
            [
                'title.required' => 'กรุณาป้อนหัวข้อในการแสดงความคิดเห็น',
                'comment.required' => 'กรุณาป้อนข้อความที่แสดงความคิดเห็น',

            ]
        );
        $comment = new Comment();
        $comment->title = $request->title;
        $comment->comment = $request->comment;

        $sToken = "1acsyNFntvhiG3twxhLfTqTsEnuAecxTxkUoww1BBUs";
        $sMessage = "กล่องรับแสดงความคิดเห็น. \n";
        $sMessage .= "Title: " . $request->title . "\n";
        $sMessage .= "Comment : " . $request->comment . "\n";

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

        $comment->save();
        return redirect()->back()->with('status','อวท.ได้รับความเห็นของท่านแล้ว');
    }

    public function delete($id){
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->back()->with('status','ลบข้อมูลสำเร็จ');
    }
}
