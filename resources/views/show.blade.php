@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="card-header">{{ $game->name }}</div>
                <div class="card-body">
                    <div class="card-body">
                        <!-- <div class="card-title">{{ $game->name }}</div> -->
                        <p class="card-text">{{ $game->type }}</p>
                        <p class="card-text">{{ $game->review }}</p>
                        <p class="card-text">{{ $game->description }}</p>
                        <p class="card-text">{{ $game->space }}</p>
                        <p class="card-text">{{ $game->language }}</p>
                        <hr />
                    </div>
                </div>
            </div>
            <form id="comment-form" method="post" action="{{ route('comments.store')}}" >
                {{ csrf_field() }}
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" >
                <input type="hidden" name="game_id" value="{{ $game->id }}">
                <div class="row" style="padding: 10px;">
                    <div class="form-group">
                        <textarea class="form-control" name="comment" placeholder="Write something from your heart..!"></textarea>
                    </div>
                </div>
                <div class="row" style="padding: 0 10px 0 10px;">
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-lg" style="width: 100%" name="submit">
                    </div>
                </div>
            </form>
            </div>
        </div>

    <div class="row">
         <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Comments</div>

                <div class="panel-body comment-container" >
                    
                    @foreach($comments as $comment)
                        <div class="well">
                            <h4>{{ Auth::user()->name }}</h4>
                            <i><b> {{ $comment->name }} </b></i>&nbsp;&nbsp;
                            <span> {{ $comment->comment }} </span>
                            <div style="margin-left:10px;">
                                <div class="reply-form">
                                                                        
                                </div>                                
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <a href="{{ action('HomeController@index') }}" class="btn btn-primary">BACK</a>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('/js/main.js') }}"></script>