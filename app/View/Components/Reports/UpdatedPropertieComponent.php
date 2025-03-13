<?php

namespace App\View\Components\Reports;

use App\Models\Comment;
use Illuminate\Http\Client\Request;
use Illuminate\View\Component;

class UpdatedPropertieComponent extends Component
{

    public $comments;
    public $filter;
    public $totalComments;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->filter = request()->query('filter');

        $query = Comment::where('type', 'Contact');

        if ($this->filter === 'day') {
            $query->whereDate('created_at', now()->toDateString());
        } elseif ($this->filter === 'week') {
            $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
        } elseif ($this->filter === 'month') {
            $query->whereMonth('created_at', now()->month);
        }

        $this->totalComments = $query->count();

        $this->comments = $query->paginate(10);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.reports.updated-propertie-component')->with(['comments' => $this->comments, 'totalComments' => $this->totalComments]);
    }
}
