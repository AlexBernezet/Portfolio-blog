@if(!empty($posts))
<ul>
    @foreach($posts as $post)
        <li>{{$post->title}}</li>
    @endforeach
</ul>
@else
    <p>Pas d'article dans le blog</p>
@endif
