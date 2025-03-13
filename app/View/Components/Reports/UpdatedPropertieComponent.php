<?php

namespace App\View\Components\Reports;

use App\Models\Comment;
use App\Models\User;
use Illuminate\View\Component;
use Carbon\Carbon;

class UpdatedPropertieComponent extends Component
{

    public $comments;
    public $filter;
    public $totalComments;
    protected $users;
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
        $this->comments = $query->orderBy('created_at', 'desc')->paginate(10);

        $this->users = User::all()->keyBy('id');
        $this->mapCommentsWithUserNames();
    }

    protected function mapCommentsWithUserNames()
    {
        $this->comments->getCollection()->transform(function ($comment) {
            $comment['user_name'] = $this->users->get($comment['user_id'])->name ?? 'Usuario no encontrado';
            // Formatea la hora a Ecuador
            $comment['created_at_ec'] = Carbon::parse($comment['created_at'])->setTimezone('America/Guayaquil')->format('Y-m-d H:i:s');
            return $comment;
        });
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
