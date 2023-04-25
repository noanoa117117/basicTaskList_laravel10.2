<x-app-layout>


    <div class="header border-buttom">
        <h1 class="flex items-center break-normal px-3 py-2 font-sans text-xl font-bold text-indigo-500 md:text-2xl">
            編集画面
        </h1>
    </div>

    <!-- ユーザー詳細情報 -->

    <table class="table-striped table-bordered table-hover table">
        <tbody>

            <tr>
                <td class="px-3 py-2">

                    <strong>{{ $detail->name }}</strong>
                </td>
            </tr>

            <form action="{{ url('timeline/edit/' . $detail->id) }}" method="POST">
                <tr>
                    <td class="px-3 py-3">
                        <p>タイトル</p>
                        <input type="text" name="title" value="{{ $detail->subtitle }}" size="50" />

                        @if ($errors->has('title'))
                            <p class="error-message">{{ $errors->first('title') }}</p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="px-3 py-3">
                        <!-- 更新ボタン-->
                        <label for="edit" class="col-sm-3 control-label">詳細内容追加 </label>
                        <div class="text-left">
                            {{ csrf_field() }}
                            <textarea name="update" cols="50" rows="10" class="form-textarea">{{ $detail->body }}</textarea>
                            <button class="rounded bg-sky-400 py-2 px-6 font-semibold text-white"
                                type="submit">編集</button>
                            @if ($errors->has('update'))
                                <p class="alert alert-danger">{{ $errors->first('update') }}
                            @endif
                    </td>
                </tr>
            </form>
        </tbody>
    </table>
    <div class="px-3">
        <form action="{{ route('addDoneList', ['id' => $detail->id]) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class="rounded bg-green-400 py-2 px-4 font-semibold text-white" type="submit" name="delete">
                Done</button>
            <form action="{{ route('delete', ['id' => $detail->id]) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="rounded bg-red-400 py-2 px-10 font-semibold text-white" type="submit" name="delete">
                    消去</button>
            </form>
    </div>

    </x-app>
