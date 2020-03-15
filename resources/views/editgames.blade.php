@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

        @if(count($errors) > 0 )
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- @if($massage = Session::get('danger'))
                <div class="alert alert-danger">
                    <strong>{{ $massage }}</strong>
                </div>
            @endif -->

            @foreach($games as $game)
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Games</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ action('GamesController@update', $game->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="form-group">
                                <label class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ $game->name }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Type</label>
                                <div class="col-md-6">
                                    <select name="type" class="form-control" value="{{ $game->type }}">
                                        <option value="None">None</option>
                                        <option value="Action">Action</option>
                                        <option value="Adventure">Adventure</option>
                                        <option value="Casual">Casual</option>
                                        <option value="Indie">Indie</option>
                                        <option value="Multiplayer">Multiplayer</option>
                                        <option value="RPG">RPG</option>
                                        <option value="Simulation">Simulation</option>
                                        <option value="Sport">Sport</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Review</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" name="review" cols="30" rows="10">{{ $game->review }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" name="description" cols="30" rows="10">{{ $game->description }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Space</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" name="space" cols="10" rows="10">{{ $game->space }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Language</label>
                                <div class="col-md-6">
                                    <select name="language" class="form-control" value="{{ $game->language }}">
                                        <option  value="English">English</option>
                                        <option value="Thai">Thai</option>
                                        <option value="Korea">Korea</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Chaina">Chaina</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        SELECT
                                    </button>
                                    <a href="{{ action('GamesController@index') }}" class="btn btn-primary">BACK</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection