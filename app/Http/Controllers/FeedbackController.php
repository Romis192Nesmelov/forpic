<?php

namespace App\Http\Controllers;
use App\Action;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    use HelperTrait, GoogleCaptchaTrait;

    public function callback(Request $request)
    {
        $this->validate($request, [
            'phone' => 'required|'.$this->validationPhone,
//            'g-recaptcha-response' => 'required|string',
            'i_agree' => 'required|accepted',
        ]);
//        if (!$this->reCapchaRequest($request->input('g-recaptcha-response'))) return response()->json(['error' => trans('validation.captcha-error')], 404);

        $fields = $this->processingFields($request);
        return $this->sendMail('callback',$fields);
    }

    public function action(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer|exists:actions,id',
            'user_name' => 'max:50',
            'phone' => 'required|'.$this->validationPhone,
//            'g-recaptcha-response' => 'required|string',
            'i_agree' => 'required|accepted',
        ]);

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
    }
}
