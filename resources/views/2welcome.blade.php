    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>DataTables </title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">
        <!--Replace with your tailwind.css once created-->


        <!--Regular Datatables CSS-->
        <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
        <!--Responsive Extension Datatables CSS-->
        <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

        <style>
            /*Overrides for Tailwind CSS */

            /*Form fields*/
            .dataTables_wrapper select,
            .dataTables_wrapper .dataTables_filter input {
                color: #4a5568;
                /*text-gray-700*/
                padding-left: 1rem;
                /*pl-4*/
                padding-right: 1rem;
                /*pl-4*/
                padding-top: .5rem;
                /*pl-2*/
                padding-bottom: .5rem;
                /*pl-2*/
                line-height: 1.25;
                /*leading-tight*/
                border-width: 2px;
                /*border-2*/
                border-radius: .25rem;
                border-color: #edf2f7;
                /*border-gray-200*/
                background-color: #edf2f7;
                /*bg-gray-200*/
            }

            /*Row Hover*/
            table.dataTable.hover tbody tr:hover,
            table.dataTable.display tbody tr:hover {
                background-color: #ebf4ff;
                /*bg-indigo-100*/
            }

            /*Add padding to bottom border */
            table.dataTable.no-footer {
                border-bottom: 1px solid #e2e8f0;
                /*border-b-1 border-gray-300*/
                margin-top: 0.75em;
                margin-bottom: 0.75em;
            }
        </style>



    </head>
    <!-- Content -->
    <div class="space-y-5 md:space-y-8">
        <div class="space-y-3">
            <h2 class="text-2xl font-bold dark:text-white md:text-3xl">便利なTodo-List（説明書）
            </h2>

            <p class="text-lg text-gray-800 dark:text-gray-200">
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
        <p>
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
            <img class="rounded-xl object-cover" src="{{ asset('img/confirm.png') }}" alt="Image Description"
                width="450" height="300">
        </figure>
        <p class="text-lg text-gray-800 dark:text-gray-200">
            この画面からTaskを消すには該当のUserが最初の画面(UserTask一覧)でDoneボタンを押せば消えます。<br>
            つまり完了しているか、していないかがすぐにわかります。<br><br>
            依頼された側はUserTask一覧画面から詳細ボタンを押し
        </p>
        <figure>
            <img class="rounded-xl object-cover" src="{{ asset('img/lateEdit.png') }}" alt="Image Description"
                width="450" height="300">
        </figure>

        <p class="text-lg text-gray-800 dark:text-gray-200">
            上記のように設定すれば、依頼した側にTask確認はしたけれど遅れる旨を間接的に伝えることができます。
        </p>
    </div>

    </html>
