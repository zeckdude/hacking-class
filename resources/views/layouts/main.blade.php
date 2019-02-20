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
                font-weight: 300;
                height: 100vh;
                margin: 0;
            }

            * {
              box-sizing: border-box;
            }

            body {
              padding: 20px 100px;
            }

            .full-height {
                height: 100%;
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
                font-weight: 100;
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

            .directions {
              margin-bottom: 30px;
            }

            .exercise-container {
              display: flex;
              max-width: 1100px;
            }

            .exercise {
              padding-right: 60px;
            }

            .query {
              font-size: 16px;
              font-weight: 500;
              margin: 50px 20px;
            }

            .query span {
              margin-bottom: 15px;
              display: block;
            }

            .steps ul {
              padding-top: 20px;
              list-style-type: none;
              padding-left: 0;
              padding-right: 0;
            }

            .steps ul li {
              margin-bottom: 60px;
            }

            .step-title {
              font-weight: 600;
              display: block;
              text-decoration: underline;
              margin-bottom: 10px;
              line-height: 1.5;
              font-size: 17px;
            }

            .step-hint {
              display: block;
              margin-bottom: 20px;
              font-weight: 500;
            }

            .step-hint span {
              font-weight: 300;
              display: block;
              margin-top: 5px;
              line-height: 1.5;
            }

            .step-hint small {
              display: none;
              font-weight: 200;
            }

            .step-hint.hidden span {
              text-indent: -9999px;
              background-color: #353232;
              height: 50px;
              width: 270px;
              white-space: nowrap;
            }

            .step-hint.hidden span code {
              display: none;
            }

            .step-hint.hidden small {
              display: inline;
            }

            code {
              display: block;
              background-color: #353232;
              color: #bdd7f0;
              padding: 10px;
              margin-top: 5px;
              font-weight: 300;
            }

            code.large {
              font-size: 15px;
              line-height: 1.8;
              padding: 13px;
            }

            .button {
              height: 40px;
              background-color: #65a7e6;
              font-size: 16px;
              font-weight: 600;
              font-family: 'Raleway', sans-serif;
              border: 0;
              border-radius: 3px;
              color: white;
            }

            input[type=text] {
              font-family: 'Raleway', sans-serif;
              padding: 10px;
              font-size: 16px;
              width: 100%;
            }

            .sql-injection-exercise-container .button {
              margin-top: 15px;
            }

            .buttons-container {
              display: flex;
              justify-content: space-between;
            }
        </style>
    </head>
    <body>
        <div class="{{ $container_classes ?? 'flex-start' }} position-ref full-height">
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
