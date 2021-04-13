<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    use HelperTrait;

    public function callback(Request $request)
    {
        $this->validate($request, [
            'user_name' => 'max:50',
            'phone' => 'required|'.$this->validationPhone,
            'question' => 'max:1000',
            'i_agree' => 'required|accepted',
        ]);
//        $matches = false;
//        $spamWords = SpamWord::all();
//
//        foreach ($spamWords as $word) {
//            if (preg_match('/'.$word->word.'/ui', $request->input('message'))) {
//                $matches = true;
//                break;
//            }
//        }

        $fields = $this->processingFields($request, null, 'i_agree');
//        if (!$matches && $fields['message']) {
//            Claim::create($fields);
            $this->sendMessage('callback', $fields);
//        }
        return response()->json(['success' => true, 'message' => trans('content.thanx_message')]);
    }
}
