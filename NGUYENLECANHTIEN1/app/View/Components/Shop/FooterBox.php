<?php

namespace App\View\Components\Shop;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Page;

class FooterBox extends Component
{
    public $links;
    public function __construct($position)
    {
        $this->links = Page::select('title', 'slug')->where('position', $position)->get();
    }


    public function render(): View|Closure|string
    {
        return view('components.shop.footer-box', ['links' => $this->links]);
    }
}
