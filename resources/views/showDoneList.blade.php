<x-app-layout>

    @if (count($showDone) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1
                    class="flex items-center break-normal px-2 py-8 font-sans text-xl font-bold text-indigo-500 md:text-2xl">
                    Done済み一覧
                </h1>
            </div>
            @auth <form action="{{ route('oneDelete') }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="rounded bg-red-400 py-2 px-4 font-semibold text-white" type="submit" name="delete">
                        一括消去</button>
                </form>
            @endauth
            <div class="panel-body">
                <table class="table-striped task-table table">
                    <tbody>
                        @foreach ($showDone as $sd)
                            <div class="py-2">
                                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                                    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                                        <div class="p-6 text-gray-900">
                                            <strong>{{ $sd->name }}</strong>さん
                                            <p class="text-right">{{ $sd->created_at }}</p>
                                            <p>{{ $sd->subtitle }}</p>

                                            <div class=text-right>
                                                <form action="{{ route('restore', $sd->id) }}" method="POST">
                                                    @csrf
                                                    @method('patch')
                                                    <button type="submit"
                                                        class="rounded bg-green-300 py-2 px-4 font-semibold text-white">復元</button>
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
        <p>DoneListは空です</p>
    @endif
    </div>
    </div>
    </x-app>
