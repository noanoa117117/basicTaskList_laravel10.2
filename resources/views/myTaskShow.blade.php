<x-app-layout>

    @if (count($showMyTask) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1
                    class="flex items-center break-normal px-2 py-8 font-sans text-xl font-bold text-indigo-500 md:text-2xl">
                    依頼されたTask一覧
                </h1>
            </div>
            {{-- <div class="px-20 py-4">
                @auth <form action="{{ route('oneDelete') }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="rounded bg-red-400 py-2 px-4 font-semibold text-white" type="submit" name="delete">
                            一括消去</button>
                    </form>
                @endauth
            </div> --}}
            <div class="panel-body">
                <table class="table-striped task-table table">
                    <tbody>
                        @foreach ($showMyTask as $smt)
                            <div class="py-2">
                                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                                    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                                        <div class="p-6 text-gray-900">
                                            <p class="text-right">{{ $smt->created_at }}</p>
                                            <strong>{{ $smt->name }}</strong>さん
                                            <p class="py-2">{{ $smt->subtitle }}</p>
                                            <div class="float-left"><a href="{{ route('detail', ['id' => $smt->id]) }}"
                                                    class="rounded bg-sky-400 py-2 px-4 font-semibold text-white">詳細</a>
                                            </div>
                                            <div class="float-right">
                                                <form action="{{ route('addDoneList', ['id' => $smt->id]) }}"
                                                    method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button
                                                        class="rounded bg-purple-400 py-2 px-4 font-semibold text-white"
                                                        type="submit" name="delete">
                                                        Done</button>
                                                </form>
                                            </div>
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
        <p>依頼されたTaskは空です</p>
    @endif
    </x-app>
