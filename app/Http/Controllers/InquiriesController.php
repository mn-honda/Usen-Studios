<?php

namespace App\Http\Controllers;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Datetime;
class InquiriesController extends Controller
{
    public function send_inquiry(Request $request){
        $inquiry = new Inquiry();
        
        $inquiry->user_id = $request->user_id;
        $inquiry->detail = $request->detail;
        $inquiry->date = new Datetime();
        $inquiry->sale_detail_id = $request->sale_detail_id;
        $inquiry->title = $request->title;
        $inquiry->save();
        $message = "送信完了";
        
        // dd("きてる？");
        return view("user.contact.inquiry",compact("message"));
    }
}
