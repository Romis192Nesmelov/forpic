<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Settings;

class StaticController extends Controller
{
    use HelperTrait;

    protected $data = [];

    public function index(Request $request)
    {
        return $this->showView('home');
    }

    protected function showView($view)
    {
        $mainMenu = [
            ['data_scroll' => 'calculator', 'name' => trans('menu.calculator')],
            ['data_scroll' => 'about_us', 'name' => trans('menu.about_us')],
            ['data_scroll' => 'documents', 'name' => trans('menu.documents')],
            ['data_scroll' => 'price', 'name' => trans('menu.price')],
            ['data_scroll' => 'actions', 'name' => trans('menu.actions')],
            ['data_scroll' => 'contacts', 'name' => trans('menu.contacts')]
        ];

        return view($view, [
            'mainMenu' => $mainMenu,
            'seo' => Settings::getSeoTags(),
            'metas' => $this->metas
        ]);
    }
}
