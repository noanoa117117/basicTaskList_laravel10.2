<x-timeline-component name="body">
    <x-slot name="body">
        <!--Container-->
        <div class="container mx-auto w-full px-2 md:w-4/5 xl:w-3/5">
            <!--Title-->
            <h1 class="flex items-center break-normal px-2 py-8 font-sans text-xl font-bold text-indigo-500 md:text-2xl">
                User Task一覧
            </h1>

            <!--add Task List -->
            {!! Form::open(['route' => 'timeline', 'method' => 'POST']) !!}
            {{ csrf_field() }}
            <div class="sm:-my-px sm:ml-10 sm:flex">
                <input class="form-control mr-2 rounded border-gray-300 shadow-inner" size="50" name="subtitle"
                    type="text">
                <div class="form-group">
                    <div class="row mb-0">
                        <input class="rounded bg-orange-300 font-semibold text-white" type="submit" value="タスクリストに追加!">
                    </div>
                    @if ($errors->has('subtitle'))
                        <p class="alert alert-danger">{{ $errors->first('subtitle') }}
                    @endif
                </div>
            </div>
            {!! Form::close() !!}

            <!--Card-->
            <div id='recipients' class="mt-6 rounded bg-white p-8 shadow lg:mt-0">
                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th class="hidden" data-priority="1">created_at</th>
                            <th data-priority="2">Name</th>
                            <th data-priority="3">subtitle</th>
                            <th data-priority="4">edit</th>
                            <th data-priority="5">Done!</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $tak)
                            <tr>
                                <td class="hidden">{{ $tak->created_at }}</td>
                                <td>{{ $tak->name }}</td>
                                <td>{{ $tak->subtitle }}</td>
                                <td>
                                    @if ($tak->user_id == Auth::id())
                                        <a href="{{ route('detail', ['id' => $tak->id]) }}"
                                            class="rounded bg-sky-400 py-2 px-4 font-semibold text-white">詳細</a>
                                    @else
                                    @endif
                                </td>
                                <td>
                                    @if ($tak->user_id == Auth::id())
                                        <form action="{{ route('addDoneList', ['id' => $tak->id]) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="rounded bg-green-400 py-2 px-4 font-semibold text-white"
                                                type="submit" name="delete">
                                                Done</button>
                                        </form>
                                    @else
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
        <!-- jQuery -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

        <!--Datatables -->
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
        <script>
            $(document).ready(function() {

                var table = $('#example').DataTable({
                        responsive: true
                    })
                    .columns.adjust()
                    .responsive.recalc();
            });
        </script>
    </x-slot>
</x-timeline-component>
