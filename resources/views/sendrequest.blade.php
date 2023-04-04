<x-app-layout>

    <head>
        <title>詳細</title>

    </head>

    <body>
        <div class="header border-buttom">
            <h1 class="flex items-center break-normal px-2 py-8 font-sans text-xl font-bold text-indigo-500 md:text-2xl">
                Task送信フォーム
            </h1>
        </div>


        <!-- ユーザー詳細情報 -->
        <form action="{{ route('submitRequest') }}" method="POST">
            {{ csrf_field() }}
            <p>送信先のUser</p>
            <select name="name">
                @foreach ($allUsers as $user)
                    <option value="{{ $user->name }}"> {{ $user->name }}</option>
                @endforeach

            </select>
            <table class="table-striped table-bordered table-hover table">
                <tbody>


                    <p>タイトル</p>
                    <tr>
                        <td>
                            <!--投稿内容-->
                            <label for="subtitle" class="col-md-4 col-form-label text-md-end"></label>
                            <input name="subtitle" type="text">
                            @if ($errors->has('subtitle'))
                                <p class="text-red">{{ $errors->first('subtitle') }}
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="text-left">
                                <p>詳細内容</p>
                                <label for="body" class="col-sm-3 control-label"></label>
                                <textarea name="body" cols="50" rows="10"class="form-textarea" placeholder="空欄でも可"></textarea>
                                @if ($errors->has('body'))
                                    <p class="alert alert-danger">{{ $errors->first('body') }}
                                @endif
                                <button class="rounded bg-rose-500 py-2 px-4 font-semibold text-white"
                                    type="submit">Task送信</button>
                            </div>
                        </td>
                    </tr>
        </form>

        </div>
        </td>
        </tr>

        </tbody>
        </table>
        </div>
    </body>
</x-app-layout>
