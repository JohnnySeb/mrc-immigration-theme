<?php

namespace App\View\Components\Input;

use Roots\Acorn\View\Component;

class Checkbox extends Component
{
    /**
     * The radio input's legend.
     *
     * @var string
     */
    public $legend;

    /**
     * The radio input's options.
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
        return $this->view('components.input.checkbox');
    }
}
