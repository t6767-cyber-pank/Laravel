<?php

namespace App\Widgets;

use App\Service;
use App\Vacancy;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class Vacancies extends AbstractWidget
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
        $count = Vacancy::count();
        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-paw',
            'title'  => "Всего вакансий",
            'text'   => "<h3><span style='padding-top: 1px; padding-bottom: 1px; padding-left: 11px; padding-right: 11px; background: azure; border-radius: 20px;'>{$count}</span></h3>",
            'button' => [
                'text' => __('Все вакансии'),
                'link' => route('voyager.vacancies.index'),
            ],
            'image' => '/storage/40960-video-igra_orujie_razrushenie.jpg',
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
