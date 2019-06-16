@extends('layouts.app')

@section('content')

  <!-- Page Header -->
<header class="masthead" style="background-image: url('/storage/{{ $post->image }}')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>{{ $post->title }}</h1>
            <span class="subheading">{{ $post->excerpt}}</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">

        {!! $post->body !!}



    <ul>
        @foreach ($comment as $c)
        <div class="card-header">Comments</div>
            <div class="card-body">
                <h4 class="card-title">
                            {{ $c->comment }}
                </h4>
            </div>
      @endforeach
    </ul>




        <!-- Comments Form -->
        <div class="panel panel-default">
            <div class="panel-heading badge badge-primary" >Add Your Comment</div>
            <div class="panel-body">


                <form action=" {{ url('add/comment') }} " method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">

                        <textarea name="comment" class="form-control" placeholder="Enter your comment" cols="30" rows="10"></textarea>
                    </div>
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary float-left">Add Comment</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Comments Form -->

        <br><br><br><br>

          <div class="clearfix">
            <a class="btn btn-primary float-right" href="/">All Posts &rarr;</a>
          </div>
        </div>

    </div>
</div>


@endsection
