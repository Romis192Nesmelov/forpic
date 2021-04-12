<?php

namespace App\Http\Controllers;

class SettingsController extends Controller
{
    use HelperTrait;
    
    private $settings;

    public function __construct()
    {
        $this->settings = simplexml_load_file(base_path(env('SETTINGS_XML')));
    }

    // Seo
    public function getSeoTags()
    {
        $tags = [];
        foreach ($this->metas as $meta => $params) {
            $tags[$meta] = (string)$this->settings->seo->$meta;
        }
        return $tags;
    }

    public function getSettings()
    {
        return $this->settings->settings;
    }

//    private function save()
//    {
//        $this->settings->asXML(Config::get('app.settings_xml'));
//    }
}
