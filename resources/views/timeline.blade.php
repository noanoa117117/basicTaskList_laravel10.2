@extends('layouts.header')
<!--親ページへ-->
@section('content')
    <!--ここからendsecまでの内容が挿入-->

    <div class="con-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                What do you want to Tweet? hehehe
            </div>

            <div class="panel-body">

                <!--new task form エスケープ無効-->
                <!--<form action="{{ url('/timeline') }}" method="POST" class="form-horizontal">-->
                {!! Form::open(['route' => 'timeline', 'method' => 'POST']) !!}
                {{ csrf_field() }}
                <!--content body-->
                <div class="form-group">
                    <!--<label for="task-name" class="col-sm-3 control-label">Content Body</label> -->
                    {{ Form::label('task-name', 'Content Body', ['class' => 'col-sm-3 control-label']) }}
                    <div class="col-sm-6">
                        <!--<input type="text" name="name" value="@{{ old('name') }}" id="tweet_body"
                                                    class="form-control" /> -->
                        {{ Form::text('tweet', null, ['class' => 'form-control']) }}
                    </div>
                    @if ($errors->has('tweet'))
                        <p class="alert alert-danger">{{ $errors->first('tweet') }}
                    @endif
                </div>

                <!--Add lanch Button -->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <!-- <button type="subit" class="btn btn-default"> -->
                        {{ Form::submit('Lanch tweet!', ['class' => 'btn btn-default']) }}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <!--current tasks-->
        @if (count($tweets) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    Current TL
                </div>

                <div class="panel-body">
                    <table class="table-striped task-table table">
                        <tbody>
                            @foreach ($tweets as $tl)
                                <tr>
                                    <td class="table-text">
                                        <div>{{ $tl->tweet }}</div>
                                    </td>
                                <tr>
                                    <!--Delete Button　<a href="" class="btn btn-primary">詳細</a>　-->
                                    <td>
                                        <form action="{{ url('timeline/' . $tl->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <!--と同じ<input type="hidden" name="_method" value="DELETE">-->

                                            <button type="submit" class="btn btn-link pull-right navbar-brand">
                                                <i class="fa fa-trash">Delete</i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <td>&nbsp;</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
    </div>
@endsection
