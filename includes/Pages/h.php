<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* body {
            width: 100vw;
            height: 100vh;
            display: flex;
            position: relative;
            background: #1e1e24;
            align-items: center;
            justify-content: center;
        } */

        .btn-flip1 {
            opacity: 1;
            outline: 0;
            color: #fff;
            line-height: 40px;
            position: relative;
            text-align: center;
            letter-spacing: 1px;
            display: inline-block;
            text-decoration: none;
            font-family: 'Open Sans';
            text-transform: uppercase;
        }

        .btn-flip1:hover:after {
            opacity: 1;
            transform: translateY(0) rotateX(0);
        }

        .btn-flip1:hover:before {
            opacity: 0;
            transform: translateY(50%) rotateX(90deg);
        }

        .btn-flip1:after {
            top: 0;
            left: 0;
            opacity: 0;
            width: 100%;
            color: #323237;
            display: block;
            transition: 0.5s;
            position: absolute;
            background: #adadaf;
            content: attr(data-back);
            transform: translateY(-50%) rotateX(90deg);
        }

        .btn-flip1:before {
            top: 0;
            left: 0;
            opacity: 1;
            color: #adadaf;
            display: block;
            padding: 0 30px;
            line-height: 40px;
            transition: 0.5s;
            position: relative;
            background: #323237;
            content: attr(data-front);
            transform: translateY(0) rotateX(0);
        }
    </style>
</head>

<body>
    <a href="#" class="btn-flip1" data-back="Backnjskfsilbgfilebiel" data-front="Frontnsifsudvusv"></a>
</body>

</html>