<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Laravel SSO</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <h2 class="ml-3 mt-3">BRIMO</h2>
    <div class="row">
        <div class="col-md-6 offset-md-3 pt-5">
            @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            
            <div class="d-flex justify-content-center">
                @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                    <div class="card">
                        <div class="card-body">
                            <h4>Nama: {{auth()->user()->name}}</h4>
                            <a href="{{route('login.logout')}}" class="btn btn-danger">Logout</a>
                        </div>
                    </div>
                    @else
                    <div class="alert alert-warning" role="alert">
                        You're not logged in, please <a href="{{ route('login') }}" class="text-sm text-gray-700 underline"> <b>login</b> </a> first!
                    </div>              
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                    @endif
                    @endauth
                </div>
                @endif
            </div>
            
            <div class="card">
                <div class="card-header">
                    Other Apps
                </div>
                <div class="card-body justify-content-center text-center">
                    Jump To
                    <a href="http://apps2.digitalevent.id" class="btn btn-primary" type="button">App 2</a>
                    Or 
                    <a href="http://apps3.digitalevent.id" class="btn btn-success" type="button">App 3</a>
                </div>
            </div>
            
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>