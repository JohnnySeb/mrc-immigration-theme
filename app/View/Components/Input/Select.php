<?php

namespace App\View\Components\Input;

use Roots\Acorn\View\Component;

class Select extends Component
{
    /**
     * The select's options.
     *
     * @var array
     */
    public $options = [];

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return $this->view('components.input.select');
    }
}
