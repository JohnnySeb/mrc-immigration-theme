<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class Tabs extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return $this->view('components.tabs');
    }
}
