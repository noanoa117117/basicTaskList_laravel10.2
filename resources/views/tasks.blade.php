@extends('layout.app')
<!--親ページへ-->
@section('content')
    <!--ここからendsecまでの内容が挿入-->
    <div class="con-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-headding">
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
                        <label for="task-name" class="col-sm-3 control-label">Task</label>
                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name"class="form-control">
                        </div>
                    </div>

                    <!--Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="subit" class="btn btn-default">
                                <i class="fa fa-btn fa-plus"></i>Add task
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <!--TODO:current tasks-->
        </div>
    </div>
@endsection
