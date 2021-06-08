<?php

namespace App\Http\Controllers;
use App\Models\Action;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    use HelperTrait, GoogleCaptchaTrait;

    public function callback1(Request $request)
    {
        $this->validate($request, [
            'user_name' => 'required|min:3|max:30',
            'phone' => 'required|'.$this->validationPhone,
            'question' => 'max:2000',
            'g-recaptcha-response' => 'required|string',
            'i_agree' => 'required|accepted',
        ]);
        if (!$this->reCapchaRequest($request->input('g-recaptcha-response'))) return response()->json(['error' => trans('validation.captcha-error')], 404);

        $fields = $this->processingFields($request);
        return $this->sendMail('callback1',$fields);
    }
    
    public function callback2(Request $request)
    {
        $this->validate($request, [
            'phone' => 'required|'.$this->validationPhone,
            'g-recaptcha-response' => 'required|string',
            'i_agree' => 'required|accepted',
        ]);
        if (!$this->reCapchaRequest($request->input('g-recaptcha-response'))) return response()->json(['error' => trans('validation.captcha-error')], 404);

        $fields = $this->processingFields($request);
        return $this->sendMail('callback2',$fields);
    }

    public function action(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer|exists:actions,id',
            'user_name' => 'max:50',
            'phone' => 'required|'.$this->validationPhone,
            'g-recaptcha-response' => 'required|string',
            'i_agree' => 'required|accepted',
        ]);
        if (!$this->reCapchaRequest($request->input('g-recaptcha-response'))) return response()->json(['error' => trans('validation.captcha-error')], 404);

        $fields = $this->processingFields($request);
        $action = Action::find($request->input('id'));
        $fields['name'] = $action->name;
        if (count($action->options)) {
            $fields['options'] = [];
            foreach ($action->options as $option) {
                $fieldName = 'option_'.$option->id;
                if ($request->has($fieldName) && $request->input($fieldName) == 'on') {
                    $fields['options'][] = $option->description;
                }
            }
        }
        return $this->sendMail('action',$fields);
    }

    private function sendMail($template,$fields)
    {
        $this->sendMessage($template,$fields);
        return response()->json(['success' => true, 'message' => trans('content.thanx_message')]);
//        return redirect()->back()->with('message', trans('content.thanx_message'));
    }
}
