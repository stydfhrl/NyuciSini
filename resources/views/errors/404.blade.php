<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        body {
            padding: 0;
            margin: 0;
            overflow: hidden;
        }
        .error {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 45rem;
        }
        .error .img-sec img {
            width: 100%;
            padding-left: 3rem;
        }
        .error .text-err {
            text-align: center;
        }
        .error .text-err button {
            background-color: #0085cc;
            width: 100px;
            height: 28px;
            border: none;
            border-radius: 10px;
        }
        a {
            text-decoration: none;
            color: white
        }
    </style>
</head>
<body>
    <div class="error">
        <div class="text-err">
            <h1>Sorry Page Not Found</h1>
            <h3>You Can Back Again</h3>
            <button><a href="{{ URL::previous() }}">Go Back</a></button>
        </div>
    </div>
    
</body>
</html>