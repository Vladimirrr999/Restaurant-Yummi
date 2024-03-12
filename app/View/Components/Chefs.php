<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Chefs extends Component
{

    private $delayTime;
    private $img;
    private $alt;
    private $icon;
    private $chefName;
    private $kitchenRole;
    private $description;
    public function __construct($delayTime,$img,$alt,$icon,$chefName,$kitchenRole,$description)
    {
        $this->delayTime = $delayTime;
        $this->img = $img;
        $this->alt = $alt;
        $this->icon = $icon;
        $this->chefName = $chefName;
        $this->kitchenRole = $kitchenRole;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.chefs');
    }
}
