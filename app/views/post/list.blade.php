@if (!empty($posts))
    <script>var latestPostTime = new Date('{{$posts[0]->updated_at}}')</script>
@endif
@foreach ($posts as $post)
    @include('post.post')
@endforeach