<!DOCTYPE html>
<html>
<head>
    <title>Page not Found</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            background-color:#fafafa;
            display: table;
            font-family: 'Roboto', sans-serif;
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 72px;
            margin-bottom: 40px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">Error: 404 Page Not Found</div>
        <img width="75%" src="{{asset('panel/assets/layouts/layout/img/404.png')}}" alt="403 Error">
        <p>The page you are looking for is not existed</p>
        <p>Click <a href="/">here</a> and go back to home page</p>
    </div>
</div>
</body>
</html>
