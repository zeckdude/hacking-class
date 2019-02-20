<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Hacking Class</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            body {
              padding: 200px;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .flex-column {
              display: flex;
              flex-direction: column;
            }

            .align-items-center {
              align-items: center;
            }

            .justify-content-center {
              justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .instruction {
              width: 580px;
              line-height: 1.8;
              font-weight: 300;
              margin: 30px 0;
            }

            .exercise-container {
              display: flex;

            }

            #name {
              height: 35px;
              width: 600px;
            }

            .query {
              font-size: 18px;
              font-weight: bold;
            }

            .query span {
              margin-top: 3px;
              border: 1px solid #545252;
              background-color: #ffd7d7;
              display: block;
              padding: 20px;
              font-weight: 300;
            }

            .steps ul {
              padding-top: 20px;
              list-style-type: none;
            }

            .step-title {
              font-weight: 600;
              display: block;
              text-decoration: underline;
              margin-bottom: 10px;
            }

            .step-hint {
              display: block;
              margin-bottom: 10px;
            }

            .step-hint.hidden span {
              text-indent: -9999px;
              background-color: black;
              height: 50px;
              width: 270px;
              white-space: nowrap;
              display: inline-block;
            }

            .button {
              height: 40px;
            }
        </style>
    </head>
    <body>
        <div class="{{ $container_classes or 'flex-start' }} position-ref full-height">
            <div class="flex-column align-items-center">
                <div class="title m-b-md">
                    <a href="{{ url('/') }}">Hacking Class</a>
                </div>

                @include('shared.navigation')

                @yield('content')
            </div>
        </div>
    </body>
</html>
