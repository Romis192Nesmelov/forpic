<?php

namespace App\Http\Controllers;
use App\Document;
use App\Calculator;
use App\Brand;
use App\Question;
use App\Action;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Settings;

class StaticController extends Controller
{
    use HelperTrait;

    protected $data = [];

    public function index()
    {
        $this->data['calculator'] = Calculator::all();
        $this->data['documents'] = Document::where('active',1)->get();
        $this->data['brands'] = Brand::all();
        $this->data['questions'] = Question::where('active',1)->get();
        $this->data['actions'] = Action::where('active',1)->get();
        return $this->showView('home');
    }

    protected function showView($view)
    {
        $mainMenu = [
            ['data_scroll' => 'calculator', 'name' => trans('menu.calculator')],
            ['data_scroll' => 'about_us', 'name' => trans('menu.about_us')],
            ['data_scroll' => 'documents', 'name' => trans('menu.documents')],
            ['data_scroll' => 'prices', 'name' => trans('menu.works_spares'), 'submenu' => [
                    trans('menu.works_price') => 'works',
                    trans('menu.spares_price') => 'spares'
                ]
            ],
            ['data_scroll' => 'actions', 'name' => trans('menu.actions')],
            ['data_scroll' => 'faq', 'name' => trans('menu.questions')],
            ['data_scroll' => 'contacts', 'name' => trans('menu.contacts')]
        ];

        return view($view, [
            'mainMenu' => $mainMenu,
            'seo' => Settings::getSeoTags(),
            'metas' => $this->metas,
            'data' => $this->data
        ]);
    }
}
