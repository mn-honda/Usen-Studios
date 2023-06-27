<?php

namespace App\Http\Controllers;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Datetime;
class InquiriesController extends Controller
{
    public function send_inquiry(Request $request){
        $inquiry = Inquiry::findOrFail($request);
        $inquiry->user_id = $request->user_id;
        $inquiry->detail = $request->detail;
        $inquiry->date = new Datetime();
        $inquiry-> = $request->sale_detail_id;

        $inquiry->save();
        $message = "送信完了";
        return view("user.inquiry.inquiry",compact("message"));
    }
}
