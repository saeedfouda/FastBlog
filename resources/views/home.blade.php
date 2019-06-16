@extends('layouts.app')

@section('content')

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>{{setting('site.title')}}</h1>
            <span class="subheading">{{setting('site.description')}}</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">

      @foreach ($posts as $post )

      <div class="post-preview">
        <a href="{{url('/post/'.$post->id.trim(str_replace(' ' , '-' , $post->title)))}}">
          <h2 class="post-title">
            {{ $post->title }}
          </h2>
          <h3 class="post-subtitle">
            {{$post->excerpt}}
          </h3>
        </a>
        <p class="post-meta">Posted by<a href="#">
          {{ \App\User::find($post->author_id)->name }}
        </a>
          {{$post->created_at}}</p>
      </div>
      <hr>

      @endforeach
      <!-- Pager -->
      <div class="clearfix">
        <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
      </div>
    </div>
  </div>
</div>


@endsection
