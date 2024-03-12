<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ChooseUsBlocks extends Component
{
    public $icon;
    public $title;
    public $text;
    public $delayTime;
    public function __construct($icon, $title,$text,$delayTime)
    {
        $this->icon = $icon;
        $this->title = $title;
        $this->text = $text;
        $this->delayTime = $delayTime;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.choose-us-blocks');
    }
}
