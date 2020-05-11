<?php

namespace Skydiver\LaravelCheckUpdates\Services;

use Laravel\Nova\Nova;
use PHPHtmlParser\Dom;

class NovaUpdates
{
    public static function getLatest() :string
    {
        $dom = new Dom;
        $dom->loadFromUrl('https://nova.laravel.com/releases');
        $url = $dom->find('.list-reset li')[0]->find('a')[0]->getAttribute('href');
        $url_array = explode('/', $url);
        return end($url_array);
    }
}
