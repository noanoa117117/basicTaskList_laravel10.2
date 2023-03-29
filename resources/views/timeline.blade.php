@extends('layouts.app')
<!--親ページへ-->
@section('content')
    <!--ここからendsecまでの内容が挿入-->


    <div class="con-sm-offset-2 col-sm-8">
        @auth <div class="panel panel-default">
                <div class="panel-heading">
                    What do you want to add to Todo-list?
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
                            {{ Form::text('subtitle', null, ['class' => 'form-control']) }}
                            @if ($errors->has('subtitle'))
                                <p class="alert alert-danger">{{ $errors->first('subtitle') }}
                            @endif
                        </div>

                    </div>

                    <!--Add lanch Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <!-- <button type="subit" class="btn btn-default"> -->
                            {{ Form::submit('add TaskList!', ['class' => 'btn btn-default']) }}
                        </div>
                    </div>
                    {!! Form::close() !!}
                @endauth
            </div>
        </div>
        <!--current tasks-->
        @if (count($subtitles) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    Current TL
                </div>

                <div class="panel-body">
                    <table class="table-striped task-table table">
                        <tbody>
                            @foreach ($subtitles as $sub)
                                <tr>
                                    <td><strong>{{ $sub->name }}</strong>さん</td>
                                </tr>
                                <tr>
                                    <td class="table-text">
                                        <div>{{ $sub->subtitle }} </div>
                                        <p class="text-right">{{ $sub->created_at }}</p>
                                        @auth <a href="{{ route('detail', ['id' => $sub->id]) }}"
                                                class="btn btn-primary pull-right">詳細</a>
                                        @endauth
                                    </td>
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
