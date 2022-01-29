<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        background-color: #020820;
        margin: 0;
        padding: 0;
    }
    .error {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .btn {
        display: inline-block;
        font-weight: 400;
        line-height: 1.5;
        color: #fff;
        text-align: center;
        text-decoration: none;
        vertical-align: middle;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        border: 1px solid #fff;
        padding: 0.47rem 0.75rem;
        font-size: .8125rem;
        border-radius: 0.25rem;
        font-size: 18px;
        font-weight: bold;
        position: absolute;
        background: transparent;
        bottom: 30px;
    }
</style>

<body>
    <div class="error">
        <img src='{{asset("assets/images/errors/403.jpg")}}' style="display: block;">

        <a href="{{route('home')}}" class="btn ">Back to home</a>
    </div>
</body>

</html>