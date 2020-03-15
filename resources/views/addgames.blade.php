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

            <div class="panel panel-default">
                <div class="panel-heading">Add Games</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ action('GamesController@store') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" placeholder="Name's Game">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Type</label>
                            <div class="col-md-6">
                                <select name="type" class="form-control">
                                    <option  value="None">None</option>
                                    <option value="Action">Action</option>
                                    <option value="Adventure">Adventure</option>
                                    <option value="casual">Casual</option>
                                    <option value="Indie">Indie</option>
                                    <option value="Multi">Multiplayer</option>
                                    <option value="RPG">RPG</option>
                                    <option value="Simulation">Simulation</option>
                                    <option value="Sport">Sport</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Review</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="review" cols="30" rows="10"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="description" cols="30" rows="10"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Space</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="space" cols="10" rows="10"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Language</label>
                            <div class="col-md-6">
                                <select name="language" class="form-control">
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
                                    ADD
                                </button>
                                <a href="{{ action('GamesController@index') }}" class="btn btn-primary">BACK</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection