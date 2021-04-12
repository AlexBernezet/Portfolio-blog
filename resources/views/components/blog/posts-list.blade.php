<div>
{{--    {{die(var_dump($posts))}}--}}
    @if(!empty($posts))
        <div class="blog__list">
            @foreach($posts as $post)
                <x-blog.posts-list-item :post="$post"/>
            @endforeach
        </div>
    @else
        <p>Pas d'article dans le blog</p>
    @endif
</div>
