<div class="review">
    <div class="review__name">
        {$review->name}
    </div>
    <div class="review__date">
        {$review->date}
    </div>
    <div class="review__text">
        {raw $review->review}
    </div>
    <div class="review__response">
        {raw $review->response}
    </div>
</div>