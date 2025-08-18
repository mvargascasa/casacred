<?php

namespace App\View\Components;

use App\Models\Post;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class ArticleCard extends Component
{
    public Post $post;
    
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function render(): View
    {
        return view('components.article-card');
    }
}
