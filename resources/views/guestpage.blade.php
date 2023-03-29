@extends('layouts.app')
<!--親ページへ-->
@section('content')
    <!--ここからendsecまでの内容が挿入-->


    <!--show tweet-->
    <p class="text-left">&emsp;&emsp;↑tweetするにはクリックしてログインしてください</p>
    @if (count($tweets) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current TL
            </div>



            <div class="panel-body">
                <table class="table-striped task-table table">
                    <tbody>
                        @foreach ($tweets as $tl)
                            <tr>
                                <td><strong>{{ $tl->name }}</strong>さん</td>
                            </tr>
                            <tr>

                                <td class="table-text">

                                    <div>{{ $tl->tweet }} </div>
                                    <p class="text-right">{{ $tl->created_at }}</p>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    </div>
    </div>
@endsection
