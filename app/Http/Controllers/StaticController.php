<?php

namespace App\Http\Controllers;
use App\Models\Content;
use App\Models\Reason;
use App\Models\Image;
//use App\Models\Document;
//use App\Models\Calculator;
//use App\Models\Brand;
//use App\Models\Question;
use App\Models\Action;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Settings;

class StaticController extends Controller
{
    use HelperTrait;

    protected $data = [];

    public function index()
    {
//        $this->data['calculator'] = Calculator::all();
//        $this->data['documents'] = Document::where('active',1)->get();
//        $this->data['brands'] = Brand::all();
//        $this->data['questions'] = Question::where('active',1)->get();
        $this->data['content'] = Content::find(1);
        $this->data['reasons'] = Reason::all();
        $this->data['images'] = Image::where('active',1)->get();
        $this->data['actions'] = Action::where('active',1)->get();
        $this->data['video'] = Video::all();
        return $this->showView('home');
    }

    public function getAction(Request $request)
    {
        $this->validate($request, ['id' => 'required|integer|exists:actions,id']);
        $action = Action::find($request->input('id'));
        $fields = [];
        foreach ($action->attributesToArray() as $name => $value) {
            $fields[$name] = $value;
        }
        $fields['options'] = [];
        foreach ($action->options as $option) {
            $fields['options'][] = ['id' => $option->id, 'description' => $option->description];
        }
        return response()->json(['success' => true, 'action' => $fields]);
    }

    protected function showView($view)
    {
        $mainMenu = [
//            ['data_scroll' => 'calculator', 'name' => trans('menu.calculator')],
            ['data_scroll' => 'about_us', 'name' => trans('menu.about_us')],
            ['data_scroll' => 'gallery', 'name' => trans('menu.gallery')],
//            ['data_scroll' => 'prices', 'name' => trans('menu.works_spares'), 'submenu' => [
//                    trans('menu.works_price') => 'works',
//                    trans('menu.spares_price') => 'spares'
//                ]
//            ],
            ['data_scroll' => 'actions', 'name' => trans('menu.actions')],
//            ['data_scroll' => 'faq', 'name' => trans('menu.questions')],
            ['data_scroll' => 'contacts', 'name' => trans('menu.contacts')],
            ['data_scroll' => 'driving', 'name' => trans('menu.driving_video')]
        ];

        return view($view, [
            'mainMenu' => $mainMenu,
            'seo' => Settings::getSeoTags(),
            'metas' => $this->metas,
            'data' => $this->data
        ]);
    }
}
