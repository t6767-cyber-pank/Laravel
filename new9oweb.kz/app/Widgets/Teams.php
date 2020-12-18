<?php

namespace App\Widgets;

use App\Team;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class Teams extends AbstractWidget
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
        $count = Team::count();
        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-laptop',
            'title'  => "Всего сотрудников",
            'text'   => "<h3><span style='padding-top: 1px; padding-bottom: 1px; padding-left: 11px; padding-right: 11px; background: azure; border-radius: 20px;'>{$count}</span></h3>",
            'button' => [
                'text' => __('Вся команда'),
                'link' => route('voyager.teams.index'),
            ],
            'image' => '/storage/36285-igryi_dark_souls.jpg',
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
