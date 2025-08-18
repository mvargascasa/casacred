<?php

namespace App\View\Components\News;

use App\Models\Post;
use Illuminate\View\Component;

class ArticleGrid extends Component
{
    public $posts;

    public function __construct()
    {
        // Movemos la lógica aquí para asegurar que se ejecute
        $this->posts = Post::where('status', 1)
                          ->orderBy('created_at', 'desc')
                          ->paginate(6);
    }

    public function render()
    {
        return view('components.news.article-grid');
    }
}