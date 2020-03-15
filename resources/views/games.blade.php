@extends('layouts.app')

@section('content')

@if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif


<div class="row">
        <div class="col-md-4">
            <h1>GNIMAG</h1>
        </div>

        <div class="col-md-4">
            <form action="/admin/search" method="GET">
                <div class="input-group">
                    <input type="search" name="search" class="form-control">
                    <span class="input-group-prepend">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </span>
                </div>
            </form>
        </div>

        <div class="col-md-2 text-right">
            <a href="{{ action('GamesController@create') }}" class="btn btn-primary">Add Games</a>
        </div>
</div>

<form method="POST">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th> <input type="checkbox" id="selectall"> </th>
                <th>Name</th>
                <th>Type</th>
                <th>Review</th>
                <th>Description</th>
                <th>Space</th>
                <th>Language</th>
                <th width="230">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($games as $game)
            <tr>
                <td> <input type="checkbox" name="ids[]" id="selectbox" value="{{ $game->id }}"></td>
                <td>{{ $game->name }}</td>
                <td>{{ $game->type }}</td>
                <td>{{ $game->review }}</td>
                <td>{{ $game->description }}</td>
                <td>{{ $game->space }}</td>
                <td>{{ $game->language }}</td>
                <td>
                    <a href="{{ action('GamesController@edit', $game->id) }}" class="btn btn-primary">EDIT</a>
                    <button formaction="{{ action('GamesController@destroy', $game->id) }}" type="submit" class="btn btn-danger">DELETE</button>
                </td>

            </tr>
            @endforeach
        </tbody>

        <tfoot>
            <th> <input type="checkbox" id="selectall2"> </th>
                <th>Name</th>
                <th>Type</th>
                <th>Review</th>
                <th>Description</th>
                <th>Space</th>
                <th>Language</th>
            <th width="230">Action</th>
        </tfoot>
    </table>
    <div class="col-md-12 text-right">
        <button formaction="/admin/deleteall" type="submit" class="btn btn-primary">Delete All</button>
    </div>
</form>

{{ $games->links() }}

<script type='text/javascript'>

    $('#selectall').click(function(){
        $('#selectbox').prop('checkbed', $(this).prop('checked'));
        $('#selectall2').prop('checkbed', $(this).prop('checked'));
    });

    $('#selectall2').click(function(){
        $('#selectbox').prop('checkbed', $(this).prop('checked'));
        $('#selectall').prop('checkbed', $(this).prop('checked'));
    });

    $('#selectbox').change(function(){
        var total = $('#selectbox').length;
        var number = $('#selectbox:checked').length;
        if(total == number){
            $('#selectall').prop('checked', true);
            $('#selectall2').prop('checked', true);
        }else{
            $('#selectall').prop('checked', false);
            $('#selectall2').prop('checked', false);
        }
    });

</script>


@endsection