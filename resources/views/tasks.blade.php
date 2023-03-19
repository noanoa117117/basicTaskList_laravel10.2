@extends('layouts.app')
<!--親ページへ-->
@section('content')
    <!--ここからendsecまでの内容が挿入-->
    <div class="con-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                New Task
            </div>

            <div class="panel-body">
                <!--Display Validation Errors入力値エラーを統一して遷移-->
                @include('common.errors')

                <!--new task form-->

                <form action="{{ url('task') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}

                    <!--task Name-->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Content</label>
                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name"class="form-control">
                        </div>
                    </div>

                    <!--Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="subit" class="btn btn-default">
                                <i class="fa fa-btn fa-plus">tweet</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--current tasks-->
        @if (count($tasks) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    Current Tasks
                </div>

                <div class="panel-body">
                    <table class="table-striped task-table table">
                        <thead>
                            <th>Task</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td class="table-text">
                                        <div>{{ $task->name }}</div>
                                    </td>
                                <tr>
                                    <!--Task Name-->


                                    <!--Delete Button-->
                                    <td>
                                        <form action="{{ url('task/' . $task->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <!--と同じ<input type="hidden" name="_method" value="DELETE">-->

                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-trash"></i> Delete
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
