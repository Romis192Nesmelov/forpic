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
        var_dump(Settings::getSeoTags());
//        return $this->showView($request, 'home', $token);
    }

    protected function showView(Request $request, $view)
    {
//        $this->data['seo'] = Settings::getSeoTags();
//        $blindVer = $request->has('blind') && $request->input('blind');
//
//        $mainMenu = [
//            ['data_scroll' => 'news', 'name' => trans('menu.news')],
//            ['data_scroll' => 'events', 'name' => trans('menu.events')],
//            ['data_scroll' => 'map', 'name' => trans('menu.map')],
//            ['data_scroll' => 'trainers', 'name' => trans('menu.trainers')]
//        ];
//        
//        $areas = $this->getActiveAreas();
//        $sports = KindOfSport::where('active',1)->get();
//        $socnets = [
//            ['icon' => 'yt', 'href' => '#'],
//            ['icon' => 'fb', 'href' => '#'],
//            ['icon' => 'inst', 'href' => '#'],
//            ['icon' => 'ok', 'href' => '#'],
//            ['icon' => 'vk', 'href' => '#']
//        ]; 
//
//        return view($view, [
//            'blindVer' => $blindVer,
//            'mainMenu' => $mainMenu,
//            'areas' => $areas,
//            'sports' => $sports,
//            'socnets' => $socnets,
//            'data' => $this->data,
//            'metas' => $this->metas,
//            'token' => $token
//        ]);
    }
}
