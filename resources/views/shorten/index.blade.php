<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>URL Shortener</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-shortener {
            width: 100%;
            max-width: 600px;
            padding: 15px;
            margin: auto;
        }

        .form-shortener .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }

        .form-shortener .form-control:focus {
            z-index: 2;
        }

    </style>
</head>
<body class="text-center">
<form action="{{ route('shortenUrl') }}" method="post" class="form-shortener">
    {{ csrf_field() }}
    <h1 class="h3 mb-3 font-weight-normal">URL Shortener</h1>
    <input type="text" name="destination_url" class="form-control" placeholder="Destination URL" required autofocus>
    <br>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Shorten</button>
    @php($token = Session::get('token'))
    @if(!is_null($token))
        <br>
        <a href="{{ route('go', ['token' => $token]) }}"
           class="text-success">{{ URL::to(route('go', ['token' => $token])) }}</a>
    @endif
    @if ($errors->any())
        <br>
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</form>
</body>
</html>
