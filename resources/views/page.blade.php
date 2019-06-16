@extends('layouts.app')

@section('content')
  <header class="masthead" style="background-image: url('/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>{{$page->title}}</h1>
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
        {!!$page->body!!}
    </div>
  </div>
</div>

@endsection
