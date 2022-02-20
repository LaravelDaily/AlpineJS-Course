<?php

namespace App\Http\Livewire;

use App\Models\Rating;
use Livewire\Component;

class Rate extends Component
{
    public $postId;
    public $rating = NULL;
    public $ratings;
    public $currentRating = '-';

    public $designTemplate = 'tailwind';

    public function mount()
    {
        $this->ratings = Rating::where('post_id', $this->postId)->get();
        if ($this->ratings->count()) {
            $this->currentRating = round($this->ratings->sum('rating') / $this->ratings->count(), 2) . ' / 5 (' . $this->ratings->count() . ' votes)';
        }
    }

    public function render()
    {
        return view('livewire.'.$this->designTemplate.'.rate');
    }

    public function rate($rating)
    {
        if (in_array($rating, [1,2,3,4,5])) {
            Rating::create(['post_id' => $this->postId, 'rating' => $rating]);
            $this->rating = $rating;
            $this->currentRating = round(($this->ratings->sum('rating') + $rating) / ($this->ratings->count() + 1), 2) . ' / 5 (' . ($this->ratings->count() + 1) . ' votes)';
        }
    }
}
