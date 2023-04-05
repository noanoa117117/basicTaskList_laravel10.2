@extends('layouts.header')
@section('welcome')
    <!-- Content -->
    <div class="space-y-5 md:space-y-8">
        <div class="space-y-3">


            <h2 class="text-2xl font-bold dark:text-white md:w-full">（説明書）
            </h2>

            <p class="text-lg text-gray-800 dark:text-gray-200">
                当初のToDoListはこんな感じの簡素なものでした。
            </p>
        </div>

        <figure>
            <img class="rounded-xl object-cover" src="{{ asset('img/basicToDo.png') }}" alt="Image Description" width="500"
                height="300">
            <figcaption class="mt-3 text-center text-sm text-gray-500">
                <a href="https://beiznotes.org/making-task-list-with-laravel55-1/">
                    ↑これの作り方(ここをクリック)</a>
            </figcaption>
        </figure>

        <p class="text-lg text-gray-800 dark:text-gray-200">
            そこでこれをベースとしてもう少し便利にしたものが作れないかと思案したのが今回のToDo-Listです。<br>
            具体的に追加した機能としてTaskを依頼、共有、確認できるようにしました。
        </p>

        <figure>
            <img class="rounded-xl object-cover" src="{{ asset('img/timeline.png') }}" alt="Image Description"
                width="600" height="450">
        </figure>

        <p class="text-lg text-gray-800 dark:text-gray-200">通常のToDo-Listと同じく自分の追加したいTaskを入力し、</p>
        {{ Form::submit('タスクリストに追加!', ['class' => 'bg-orange-300 font-semibold text-white py-2 px-4 rounded']) }}
        <p class="text-lg text-gray-800 dark:text-gray-200">
            を押せば通常通りのTodoListとしての使用ももちろん可能。<br><br>
            Task送信フォームから指定したUserにTaskを送信することもできます。
        </p>

        <figure>
            <img class="rounded-xl object-cover" src="{{ asset('img/taskSend.png') }}" alt="Image Description"
                width="450" height="300">
        </figure>

        <p class="text-lg text-gray-800 dark:text-gray-200">
            複数の申請を出しても下記の画面から一括で状態が確認できます。
        </p>
        <figure>
            <img class="rounded-xl object-cover" src="{{ asset('img/confirm.png') }}" alt="Image Description" width="450"
                height="300">
        </figure>
        <p class="text-lg text-gray-800 dark:text-gray-200">
            この画面からTaskを消すには該当のUserが最初の画面(UserTask一覧)でDoneボタンを押せば消えます。<br>
            頼んだ側は完了しているか、していないかがすぐにわかります。<br><br>
            依頼された側はUserTask一覧画面から詳細ボタンを押し
        </p>
        <figure>
            <img class="rounded-xl object-cover" src="{{ asset('img/lateEdit.png') }}" alt="Image Description"
                width="450" height="300">
        </figure>

        <p class="text-lg text-gray-800 dark:text-gray-200">
            上記のように設定すれば、依頼した側にTask確認をしたことや、taskについての進捗を伝えたりできます。<br>
            ↓からログインしてください
        </p>
        <a href="{{ route('login') }}"
            class="font-semibold text-gray-600 hover:text-gray-900 focus:rounded-sm focus:outline focus:outline-2 focus:outline-red-500 dark:text-gray-400 dark:hover:text-white">ログイン</a>
    </div>
@endsection
