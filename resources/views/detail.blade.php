<x-app-layout>

    <body>
        <div class="header border-buttom">
            <h1 class="flex items-center break-normal px-2 py-8 font-sans text-xl font-bold text-indigo-500 md:text-2xl">
                編集画面
            </h1>
        </div>
        <div class="text-right">
            <!-- 削除ボタン -->
            <form action="{{ url('timeline/' . $detail->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="rounded bg-red-400 py-2 px-4 font-semibold text-white" type="submit" name="delete">
                    消去</button>
            </form>
        </div>

        <!-- ユーザー詳細情報 -->
        <table class="table-striped table-bordered table-hover table">
            <tbody>

                <tr>
                    <td>
                        <p>{{ $detail->created_at }}</p>
                        <strong>{{ $detail->name }}</strong>さん
                    </td>
                </tr>
                <form action="{{ url('timeline/edit/' . $detail->id) }}" method="POST">

                    <tr>
                        <td>
                            <!--投稿内容-->
                            <p>タイトル</p>
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
                            <label for="edit" class="col-sm-3 control-label">詳細内容追加 </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="text-left">
                                {{ csrf_field() }}
                                <textarea name="update" cols="50" rows="10" class="form-textarea">{{ $detail->body }}</textarea>

                                {{-- <input type="text"
                                    name="update" value="{{ $detail->body }}">  --}}
                                <button class="rounded bg-sky-400 py-2 px-4 font-semibold text-white"
                                    type="submit">編集</button>
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
        </x-app>
