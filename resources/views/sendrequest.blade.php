<x-app-layout>



    <div class="header border-buttom">
        <h1 class="flex items-center break-normal px-3 py-4 font-sans text-xl font-bold text-indigo-500 md:text-2xl">
            Task送信フォーム
        </h1>
    </div>


    <!-- ユーザー詳細情報 -->
    <div class="px-3 py-2">
        <form action="{{ route('submitRequest') }}" method="POST">
            {{ csrf_field() }}
            <p>送信先のUser</p>
            <select name="name">
                @foreach ($allUsers as $user)
                    <option value="{{ $user->name }}"> {{ $user->name }}</option>
                @endforeach

            </select>
    </div>
    <table class="table-striped table-bordered table-hover table">
        <tbody>
            <tr>
                <td class="px-3 py-2">
                    <!--投稿内容-->
                    <p>タイトル</p>
                    <input name="subtitle" type="text">
                    @if ($errors->has('subtitle'))
                        <p class="text-red">{{ $errors->first('subtitle') }}
                    @endif
                </td>
            </tr>
            </div>

            <tr>
                <td class="px-3 py-2">
                    <p>詳細内容</p>
                    <textarea name="body" cols="50" rows="10"class="form-textarea" placeholder="空欄でも可"></textarea>
                    @if ($errors->has('body'))
                        <p class="alert alert-danger">{{ $errors->first('body') }}</p>
                    @endif
                    <button class="rounded bg-rose-500 py-2 px-4 font-semibold text-white"
                        type="submit">Task送信</button>

                    </div>
                </td>
            </tr>
            </form>

        </tbody>
    </table>
</x-app-layout>
