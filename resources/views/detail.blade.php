@extends('layouts.header')
@section('content')

    <head>
        <title>tweet詳細</title>
    </head>

    <body>

        <div class="header border-buttom">
            <h1 class="h2">tweets内容</h1>
        </div>
        <div class="text-right">
            <!-- 削除ボタン -->
            <form action="{{ url('timeline/' . $detail->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="btn btn-danger" type="submit" name="delete">
                    Delete</button>
            </form>
        </div>

        <!-- ユーザー詳細情報 -->
        <table class="table-striped table-bordered table-hover table">
            <tbody>

                <tr>
                    <td><strong>{{ $detail->name }}</strong>さん
                    </td>
                </tr>
                <tr>
                    <td class="table-text">
                        <div>{{ $detail->tweet }} </div>
                        <p class="text-right">{{ $detail->created_at }}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <form>
                            <!-- 更新ボタン-->

                            <label for="edit" class="col-sm-3 control-label">更新内容</label>
                            <div class="col-sm-6">
                                <input type="text" name="update" id="update" class="form-control">

                            </div>
                            <div class="text-left">
                                <form action="{{ url('timeline/' . $detail->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('UPDATE') }}
                                    <button class="btn btn-primary" type="submit" name="update">
                                        edit</button>
                                </form>
                            </div>
                    </td>
                </tr>

            </tbody>
        </table>
        <!-- ボタンエリア -->




        </div>
    @endsection