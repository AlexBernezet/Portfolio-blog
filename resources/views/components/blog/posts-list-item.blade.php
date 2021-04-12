<div class="blog__list__item">
    <div class="blog__list__item__header">
        <h3 class="blog__list__item__header__title">
            {{ $post->title }}
        </h3>
    </div>
    <div class="blog__list__item__body">
        <p class="blog__list__item__body__content">
            {{ $post->content }}
        </p>
    </div>
    <div class="blog__list__item__footer">
        <div class="blog__list__item__footer__readTime">
            <p>
                {{ $post->read_time }} secondes de lecture
            </p>
        </div>
        <div class="blog__list__item__footer__publishedAt">
            <p>
                {{ $post->published_at }}
            </p>
        </div>
    </div>
</div>
