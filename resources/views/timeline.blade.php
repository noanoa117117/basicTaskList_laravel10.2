<x-app-layout>
    <div class="con-sm-offset-2 col-sm-8">
        @auth <div class="panel panel-default">
                <div class="panel-heading">
                    ToDo-Listにtaskを追加してください
                </div>

                <div class="panel-body">

                    <!--new task form エスケープ無効-->
                    <!--<form action="{{ url('/timeline') }}" method="POST" class="form-horizontal">-->
                    {!! Form::open(['route' => 'timeline', 'method' => 'POST']) !!}
                    {{ csrf_field() }}
                    <!--content body-->
                    <div class="form-group">

                        <!--<label for="task-name" class="col-sm-3 control-label">Content Body</label> -->
                        {{ Form::label('subtitle', null, ['class' => 'col-sm-3 control-label']) }}
                        <div class="col-sm-6">
                            <!--<input type="text" name="name" value="@{{ old('name') }}" id="tweet_body"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                class="form-control" /> -->
                            {{ Form::text('subtitle', null, ['class' => 'form-control', 'size' => '50']) }}
                            @if ($errors->has('subtitle'))
                                <p class="alert alert-danger">{{ $errors->first('subtitle') }}
                            @endif
                        </div>

                        <!--Add lanch Button -->
                        <div class="form-group">
                            <div class="row mb-0">
                                {{-- <button type="submit" class="btn btn-default"> --}}
                                {{ Form::submit('タスクリストに追加!', ['class' => 'bg-orange-300 font-semibold text-white py-2 px-4 rounded']) }}
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
                        My Timeline
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
                                                    class="rounded bg-sky-400 py-2 px-4 font-semibold text-white">詳細</a>
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
</x-app-layout>
