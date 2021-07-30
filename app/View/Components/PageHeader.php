<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageHeader extends Component
{
    public $title;
    public $subtitle;
    public $buttonText;
    public $buttonIcon;
    public $isViewButton;

    /**
     * Create a new component instance.
     *
     * @param string $title
     * @param string $subtitle
     * @param null $buttonText
     * @param string $buttonIcon
     * @param bool $isViewButton
     */
    public function __construct(
        $title = "No Title Added",
        $subtitle = "",
        $buttonText = null,
        $buttonIcon = 'fa fa-plus',
        $isViewButton = false
    )
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->buttonText = $buttonText;
        $this->buttonIcon = $buttonIcon;
        $this->isViewButton = $isViewButton;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.page-header');
    }
}
