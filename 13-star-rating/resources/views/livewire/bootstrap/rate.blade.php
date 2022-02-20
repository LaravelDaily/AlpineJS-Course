<div>
    <h2>Demo Post title</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eu ullamcorper mi, eu pretium tortor. Sed
        faucibus orci sed malesuada sollicitudin. Vestibulum tristique vestibulum magna. Vestibulum in tristique
        nunc, ut consectetur nisi.</p>
    <div class="mt-4 mb-4">
        Current rating: <b>{{ $currentRating }}</b>
    </div>
    <h3>Rate the post</h3>

        <div x-data="{
            rating: 0,
            hoverRating: 0,
            ratings: [{'amount': 1, 'label': 'Very bad'}, {'amount': 2, 'label': 'Bad'}, {'amount': 3, 'label': 'Average'}, {'amount': 4, 'label': 'Good'}, {'amount': 5, 'label': 'Very good'}],

            currentLabel() {
                let r = (this.hoverRating != this.rating) ? this.hoverRating : this.rating
                let i = this.ratings.findIndex(e => e.amount == r)
                return (i >= 0) ? this.ratings[i].label : '';
            }
	    }"
             class="d-flex flex-column space-y-2">

            <div class="flex space-x-0">
                <template x-for="(star, index) in ratings" :key="index">
                    <button @click="rating = star.amount; $wire.rate(star.amount);" @mouseover="hoverRating = star.amount" @mouseleave="hoverRating = rating"
                            aria-hidden="true"
                            :title="star.label"
                            style="width: 3rem;"
                            class="p-1 m-0 text-muted rounded-sm cursor-pointer fill-current"
                            :class="{'text-muted': hoverRating >= star.amount, 'text-warning': rating >= star.amount && hoverRating >= star.amount}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    </button>

                </template>
            </div>
            <div class="p-2">
                <template x-if="rating || hoverRating">
                    <p x-text="currentLabel()"></p>
                </template>
                <template x-if="!rating && !hoverRating">
                    <p>Please Rate!</p>
                </template>
                @if (!is_null($rating))
                    You rated: {{ $rating }} / 5
                @endif
            </div>

        </div>
</div>
