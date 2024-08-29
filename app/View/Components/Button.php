<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class Button extends Component
{
    /**
     * The button type.
     *
     * @var string
     */
    public $type;

    /**
     * The alert types.
     *
     * @var array
     */
    public $types = [
        'default' => 'px-4 py-2 bg-neutral-300 text-neutral-900 rounded hover:bg-neutral-400',
        'primary' => 'px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700',
    ];

    /**
     * Create the component instance.
     *
     * @param  string  $type
     * @param  string  $message
     * @return void
     */
    public function __construct($type = 'default')
    {
        $this->type = $this->types[$type] ?? $this->types['default'];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return $this->view('components.button');
    }
}
