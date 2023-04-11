<x-app-layout>

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

            /*Pagination Buttons*/
            .dataTables_wrapper .dataTables_paginate .paginate_button {
                font-weight: 700;
                /*font-bold*/
                border-radius: .25rem;
                /*rounded*/
                border: 1px solid transparent;
                /*border border-transparent*/
            }

            /*Pagination Buttons - Current selected */
            .dataTables_wrapper .dataTables_paginate .paginate_button.current {
                color: #fff !important;
                /*text-white*/
                box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
                /*shadow*/
                font-weight: 700;
                /*font-bold*/
                border-radius: .25rem;
                /*rounded*/
                background: #667eea !important;
                /*bg-indigo-500*/
                border: 1px solid transparent;
                /*border border-transparent*/
            }

            /*Pagination Buttons - Hover */
            .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
                color: #fff !important;
                /*text-white*/
                box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
                /*shadow*/
                font-weight: 700;
                /*font-bold*/
                border-radius: .25rem;
                /*rounded*/
                background: #667eea !important;
                /*bg-indigo-500*/
                border: 1px solid transparent;
                /*border border-transparent*/
            }

            /*Add padding to bottom border */
            table.dataTable.no-footer {
                border-bottom: 1px solid #e2e8f0;
                /*border-b-1 border-gray-300*/
                margin-top: 0.75em;
                margin-bottom: 0.75em;
            }

            /*Change colour of responsive icon*/
            table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
            table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
                background-color: #667eea !important;
                /*bg-indigo-500*/
            }
        </style>



    </head>

    <body class="bg-gray-100 leading-normal tracking-wider text-gray-900">
        <!--Container-->
        <div class="container mx-auto w-full px-2 md:w-4/5 xl:w-3/5">
            <!--Title-->
            <h1
                class="flex items-center break-normal px-2 py-8 font-sans text-xl font-bold text-indigo-500 md:text-2xl">
                User Task一覧
            </h1>

            <!--add Task List -->
            {!! Form::open(['route' => 'timeline', 'method' => 'POST']) !!}
            {{ csrf_field() }}
            <div class="col-sm-6 mb-3 flex">
                <input class="form-control mr-2 rounded border-gray-300 shadow-inner" size="50" name="subtitle"
                    type="text">
                <div class="form-group">
                    <div class="row mb-0">
                        <input class="rounded bg-orange-300 py-2 py-2 px-4 px-4 font-semibold text-white" type="submit"
                            value="タスクリストに追加!">
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
                            <th data-priority="1">created_at</th>
                            <th data-priority="2">Name</th>
                            <th data-priority="3">subtitle</th>
                            <th data-priority="4">edit</th>
                            <th data-priority="5">Done!</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $tak)
                            <tr>
                                <td>{{ $tak->created_at }}</td>
                                <td>{{ $tak->name }}</td>
                                <td>{{ $tak->subtitle }}</td>
                                @if ($tak->user_id == Auth::id())
                                    <td><a href="{{ route('detail', ['id' => $tak->id]) }}"
                                            class="rounded bg-sky-400 py-2 px-4 font-semibold text-white">詳細</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('addDoneList', ['id' => $tak->id]) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="rounded bg-red-400 py-2 px-4 font-semibold text-white"
                                                type="submit" name="delete">
                                                Done</button>
                                        </form>
                                    </td>
                                @else
                                @endif
                        @endforeach
                        </tr>
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

    </body>

</x-app-layout>
