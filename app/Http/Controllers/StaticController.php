<?php

namespace App\Http\Controllers;
use App\Document;
use App\Price;
use App\Action;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Settings;

class StaticController extends Controller
{
    use HelperTrait;

    protected $data = [];

    public function index(Request $request)
    {
        $this->data['calculator'] = [
            'diagnostics' => 2000,
            'replace_front_brake_pads' => 5000,
            'replace_back_brake_pads' => 5000,
            'replace_front_brake_disks' => 10000,
            'replace_back_brake_disks' => 10000,
            'replace_friction' => 20000,
            'replace_oil_filter' => 3000,
            'replace_air_filter_engine' => 2000,
            'replace_air_filter_salon' => 1500,
            'replace_oil_engine' => 15000,
            'replace_oil_gear_box' => 25000,
            'replace_brake_fluid' => 18000,
            'replace_antifreeze' => 16000,
            'replace_lamp' => 6000,
            'headlight_adjustment' => 2000,
            'tire_fitting' => 3000,
            'charge_air_condition' => 8000,
            'antibacterial_treatment' => 5000,
        ];
        $this->data['documents'] = Document::where('active',1)->get();
        $this->data['price'] = Price::all();
        $this->data['actions'] = Action::where('active',1)->get();
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
            'metas' => $this->metas,
            'data' => $this->data
        ]);
    }
}
