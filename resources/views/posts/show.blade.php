@extends('layout')

@section('meta-title',$post->title )
@section('meta-description',$post->excerpt)
@section('content')
<article class="post container">
  @if ($post->photos->count()===1)
        <figure><img src="{{url('storage/'.$post->photos->first()->url) }}" alt="" class="img-responsive"></figure>
  @elseif ($post->photos->count()>1 )
        @include('posts.carousel')
  @elseif($post->iframe)
      <div class="video">
            {!! $post->iframe !!}
      </div>
  @endif

    <div class="content-post">
      <header class="container-flex space-between">
        <div class="date">
          <span class="c-gris">{{$post->published_at->format('M d')}}</span>
        </div>
        <div class="post-category">
          <span class="category">{{$post->category->name}}</span>
        </div>
      </header>
      <h1>{{$post->title}}</h1>
        <div class="divider"></div>
        <div class="image-w-text">
          {!!$post->body!!}
        </div>

        <footer class="container-flex space-between">
          @include('partials.social-links',['description'=>$post->title])
          <div class="tags container-flex">
            @foreach ($post->tags as $tag)
					<span class="tag c-gray-1 text-capitalize">#{{$tag->name}}</span>
			@endforeach
          </div>
      </footer>
      <div class="comments">
      <div class="divider"></div>
      <div id="disqus_thread"></div>
      @include('partials.disqus-scripts')
      </div><!-- .comments -->
    </div>
  </article>

@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="/css/twitter-bootstrap.css">
    <link href="//cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
@endpush
@push('scripts')
    <script id="dsq-count-scr" src="//zendero.disqus.com/count.js" async></script>
    <script src="//cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="//code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous">
    </script>
    <script src="/js/twitter-bootstrap.js"></script>
@endpush
