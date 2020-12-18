<?php

namespace App\Widgets;

use App\Client;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class Clients extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = Client::count();
        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-calendar',
            'title'  => "Всего партнеров",
            'text'   => "<h3><span style='padding-top: 1px; padding-bottom: 1px; padding-left: 11px; padding-right: 11px; background: azure; border-radius: 20px;'>{$count}</span></h3>",
            'button' => [
                'text' => __('Все партнеры'),
                'link' => route('voyager.clients.index'),
            ],
            'image' => '/storage/30127-kiborg_grafika_cyborg_graphics.jpg',
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', Voyager::model('User'));
    }
}
