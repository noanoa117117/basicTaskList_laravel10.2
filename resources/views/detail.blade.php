@extends('layouts.header')
@section('content')

    <head>
        <title>ユーザー詳細</title>
    </head>

    <body>
        <div layout:fragment="content">
            <div class="header border-buttom">
                <h1 class="h2">ユーザー詳細</h1>
            </div>
            <form id="user-detail-form" method="post" th:action="@{/user/detail}" class="form-signup"
                th:object="${userDetailForm}">
                <input type="hidden" th:field="*{userId}" />
                <!-- ユーザー詳細情報 -->
                <table class="table-striped table-bordered table-hover table">
                    <tbody>
                        <tr>
                            <th class="w-25">ユーザーID</th>
                            <td th:text="*{userId}"></td>
                        </tr>



                    </tbody>
                </table>
                <!-- ボタンエリア -->
                <div class="text-center">
                    <!-- 削除ボタン -->
                    <button class="btn btn-danger" type="submit" name="delete">
                        削除</button>
                    <!-- 更新ボタン-->
                    <button class="btn btn-primary" type="submit" name="update">
                        更新</button>
                </div>
            </form>
        </div>
    @endsection
