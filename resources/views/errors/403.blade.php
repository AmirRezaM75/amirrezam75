<!DOCTYPE html>
<html>
<head>
    <title>Access Denied</title>

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
        <div class="title">Error: 403 Forbidden</div>
        <img width="75%" src="{{asset('panel/assets/layouts/layout/img/403.png')}}" alt="403 Error">
        <p>You don't have the privilege to visit this page</p>
        <p>Click <a href="/">here</a> and go back to home page</p>
    </div>
</div>
</body>
</html>
