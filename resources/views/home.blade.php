@extends('layouts.app')

@section('content')

@if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                <div class="col-md-6">
                    <form action="/user/search" method="GET">
                        <div class="input-group">
                            <input type="search" name="search" class="form-control">
                            <span class="input-group-prepend">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </span>
                        </div>
                    </form>
                </div>

                @foreach($games as $game)
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $game->name }}</h5>
                                <p class="card-text">recomment</p>
                                    <a href="{{ action('HomeController@show', $game->id) }}" class="btn btn-primary">VIEW</a>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{ $games->links() }}

            </div>
        </div>
    </div>
</div>
@endsection
