<x-app-layout>

    <!--current tasks-->


    @if (count($showRequest) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1
                    class="flex items-center break-normal px-2 py-8 font-sans text-xl font-bold text-indigo-500 md:text-2xl">
                    依頼済みTask一覧
                </h1>
            </div>

            <div class="panel-body">
                <table class="table-striped task-table table">
                    <tbody>
                        @foreach ($showRequest as $sr)
                            <div class="py-2">
                                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                                    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                                        <div class="p-6 text-gray-900">
                                            <strong>{{ $sr->name }}</strong>さんへの依頼
                                            <p class="text-right">{{ $sr->created_at }}</p>
                                            {{ $sr->subtitle }}
                                            @auth <a href="{{ route('detail', ['id' => $sr->id]) }}"
                                                    class="rounded bg-sky-400 py-2 px-4 font-semibold text-white">詳細</a>
                                            @endauth
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <p>まだ依頼が作成されていないようです</p>
    @endif
    </div>
    </div>
    </x-app>
