<?php

namespace App\Http\Controllers;
use App\Models\Inquiry;
use App\Models\User;
use App\Models\SaleDetail;
use Illuminate\Http\Request;
use Datetime;
use Illuminate\Support\Facades\Mail;
class InquiriesController extends Controller
{
    public function send_inquiry(Request $request){
        $match = SaleDetail::find($request->sale_detail_id);
        if($match != NULL){
            $inquiry = new Inquiry();
            
            $inquiry->user_id = $request->user_id;
            $inquiry->detail = $request->detail;
            $inquiry->date = new Datetime();
            $inquiry->sale_detail_id = $request->sale_detail_id;
            $inquiry->title = $request->title;
            $inquiry->save();
            $message = "送信完了";

            // メール送信処理
            $user = User::find($request->user_id);
            $inquiry = Inquiry::find($inquiry->id);

            $this->send_mail($user, $inquiry);
        }
        else{
            $message = "対象の注文詳細IDがありません";
        }
        return view("user.contact.inquiry",compact("message"));
    }

    private function send_mail($user, $inquiry) {
        $title = 'お問い合わせ完了のお知らせ';
        $email = $user->email;

         // メールの送信処理
        Mail::send('email.contact', [
            'user' => $user,
            'inquiry' => $inquiry,
        ], function ($message) use ($email, $title) {
            $message->to($email)->subject($title);
        });
    }

}
