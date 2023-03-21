<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laravel Quickstart - Basic</title>

    <!-- fonts-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet'
        type='test/css'>

    <!--Styles-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel='stylesheet'>
</head>

<body>

    <nav class="navbar navbar-default">
        <div class="container">
            <!--navbar-->
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Unlike Twitter-ish site
                </a>
            </div>
            <!--ログアウトのpath調整が必要-->
            <form method="post" action="{{ url('/logout') }}">
                <button class="btn btn-link pull-right navbar-brand" type="submit">Logout?!
                </button>
            </form>
        </div>
    </nav>

    <!--子ページの内容-->
    @yield('content')

    <!--javaScript-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>

</html>