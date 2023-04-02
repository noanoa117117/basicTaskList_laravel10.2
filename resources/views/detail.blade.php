@extends('layouts.app')
@section('content')

    <head>
        <title>詳細</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>

    <body>
        <button type="button"
            class="m-5 cursor-pointer rounded-md bg-blue-500 p-3 text-base font-semibold text-white shadow-md ring-2 ring-blue-200 hover:bg-blue-700">
            テスト
        </button>


        <div class="header border-buttom">
            <h1 class="h2">詳細</h1>
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
                        <p class="text-right">{{ $detail->created_at }}</p>
                    </td>
                </tr>
                <form action="{{ url('timeline/edit/' . $detail->id) }}" method="POST">
                    <tr>
                        <td>
                            <!--投稿内容-->
                            <label for="title" class="col-md-4 col-form-label text-md-end"></label>
                            <input name="title" value="{{ $detail->subtitle }}" type="text">

                            @if ($errors->has('title'))
                                <p class="error-message">{{ $errors->first('title') }}</p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <!-- 更新ボタン-->
                            <label for="edit" class="col-sm-3 control-label">詳細memo内容確認 </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="text-left">
                                {{ csrf_field() }}
                                <textarea name="update" class="form-textarea" value="{{ $detail->body }}" placeholder="{{ $detail->body }}"></textarea>

                                {{-- <input type="text"
                                    name="update" value="{{ $detail->body }}">  --}}
                                <button class="btn btn-primary" type="submit">edit</button>
                </form>
                @if ($errors->has('update'))
                    <p class="alert alert-danger">{{ $errors->first('update') }}
                @endif
                </div>
                </td>
                </tr>

            </tbody>
        </table>
        </div>
    @endsection
