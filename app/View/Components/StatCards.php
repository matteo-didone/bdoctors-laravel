<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatCards extends Component
{
    public $reviews;
    public $messages;
    public $averageVote;
    public $totalMessagesCount;
    public $totalReviewsCount;

    public function __construct($averageVote, $reviews, $messages, $totalMessagesCount, $totalReviewsCount)
    {
        $this->averageVote = $averageVote;
        $this->reviews = $reviews;
        $this->messages = $messages;
        $this->totalMessagesCount = $totalMessagesCount;
        $this->totalReviewsCount = $totalReviewsCount;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.stats-cards');
    }
}
