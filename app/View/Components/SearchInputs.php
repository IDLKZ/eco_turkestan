<?php

namespace App\View\Components;

use App\Models\Area;
use App\Models\Breed;
use App\Models\Category;
use App\Models\Marker;
use App\Models\Sanitary;
use App\Models\Status;
use App\Models\Type;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SearchInputs extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $areas = Area::all();
        $types = Type::all();
        $categories = Category::all();
        $breeds = Breed::all();
        $sanitaries = Sanitary::all();
        $statuses = Status::all();
        return view('components.search-inputs', compact('areas', 'types', 'categories', 'breeds', 'sanitaries', 'statuses'));
    }
}
