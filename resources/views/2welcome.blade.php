<x-welcome-header>
    <x-slot name="welcome">

        <!-- Content -->
        <div class="space-y-5 md:space-y-8">
            <div class="space-y-3">


                <h2 class="text-2xl font-bold text-slate-600 md:text-3xl">ユーザーマニュアル
                </h2>

                <p class="text-lg text-slate-600">
                    当初のToDoListはこんな感じの簡素なものでした。
                </p>
            </div>

            <figure>
                <img class="rounded-xl object-cover" src="{{ asset('img/basicToDo.png') }}" alt="Image Description"
                    width="500" height="300">
                <figcaption class="mt-3 text-center text-sm text-gray-500">
                    <a href="https://beiznotes.org/making-task-list-with-laravel55-1/">
                        ↑これの作り方(クリック)</a>
                </figcaption>
            </figure>

            <p class="text-lg text-slate-600">
                そこでこれをベースとしてもう少し便利にしたものが作れないかと思案したのが今回のToDo-Listです。<br>
                具体的に追加した機能としてTaskを依頼、共有、確認できるようにしました。
            </p>

            <figure>
                <img class="rounded-xl object-cover" src="{{ asset('img/timeline.png') }}" alt="Image Description"
                    width="600" height="450">
            </figure>

            <p class="text-lg text-slate-600">通常のToDo-Listと同じく自分の追加したいTaskを入力し、</p>
            {{ Form::submit('タスクリストに追加!', ['class' => 'bg-orange-300 font-semibold text-white py-2 px-4 rounded']) }}
            <p class="text-lg text-slate-600">
                を押せば通常通りのTodoListとしての使用ももちろん可能。<br><br>
                Task送信フォームから指定したUserにTaskを送信することもできます。
            </p>

            <figure>
                <img class="rounded-xl object-cover" src="{{ asset('img/taskSend.png') }}" alt="Image Description"
                    width="450" height="300">
            </figure>

            <p class="text-lg text-slate-600">
                複数の申請を出しても下記の画面から一括で状態が確認できます。
            </p>
            <figure>
                <img class="rounded-xl object-cover" src="{{ asset('img/confirm.png') }}" alt="Image Description"
                    width="450" height="300">
            </figure>
            <p class="text-lg text-slate-600">
                この画面からTaskを消すには該当のUserが最初の画面(UserTask一覧)でDoneボタンを押せば消えます。<br>
                頼んだ側は完了しているか、していないかがすぐにわかります。<br><br>
                依頼された側はUserTask一覧画面から詳細ボタンを押し
            </p>
            <figure>
                <img class="rounded-xl object-cover" src="{{ asset('img/lateEdit.png') }}" alt="Image Description"
                    width="450" height="300">
            </figure>

            <p class="text-lg text-slate-600">
                上記のように設定すれば、依頼した側にTask確認をしたことや、taskについての進捗を伝えたりできます。</p>
            <a href="{{ route('login') }}"
                class="font-semibold text-orange-500 focus:rounded-sm focus:outline focus:outline-2 focus:outline-red-500 dark:text-red-600">ここからログイン</a><br>

        </div>
    </x-slot>
</x-welcome-header>
