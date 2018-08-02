@extends('layouts.app') 
@section('content')
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="card">
                <h4 class="card-header">Dashboard</h4>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <h3>Your Podcast Episodes</h3>
                    <a href="/episodes/create" class="btn btn-primary">Create Episode</a><br><br>
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th>Id</th>
                                <th>Download Url</th>
                                <th>title</th>
                                <th>Description</th>
                                <th>Episode Number</th>
                                <th></th>
                                <th></th>

                            </tr>
                            @if(count($episodes) > 0) @foreach($episodes as $episode)
                            <tr>
                                <td>
                                    <?php echo $episode->id; ?> </td>
                                <td>
                                    <?php echo $episode->download_url; ?> </td>
                                <td>
                                    <?php echo $episode->title; ?> </td>
                                <td>
                                    <?php echo $episode->description; ?> </td>
                                <td>
                                    <?php echo $episode->episode_number; ?> </td>

                                @if (!Auth::guest()) @if(Auth::user()->id == $episode->user_id)
                                <td><a class="btn btn-success" href="/episodes/{{$episode->id}}/edit">Edit</a></td>
                                <td> {!!Form::open(['action' => ['EpisodeController@destroy', $episode->id], 'method' => 'POST',
                                    'class' => 'pull-right'])!!} {{Form::hidden('_method', 'DELETE')}} {{Form::submit('Delete',['class'=>'btn
                                    btn-danger'])}} {!!Form::close()!!}</td>
                                @else
                                <td></td>
                                <td></td>
                                @endif @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div><br><br>
<div class="pagination justify-content-center">
    {{$episodes->links()}}
</div>
@else
<p>No posts found</p>
@endif
@endsection