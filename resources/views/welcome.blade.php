<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Indique</title>


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
    <link rel="stylesheet" href="{{ asset( '/css/style.css' )}}">

    <link rel="shortcut icon" href="{{ asset('/icons/royalty-crown-variant-outline.svg') }}" type="image/x-icon">

    </head>
    <body>
        @if ($countUsers == null)
        <div class="welcome-banner">
            <h1>Olá, este é um sistema de indicação, para participar você deve se cadastrar e indicar dois amigos.</h1><br>
            <h3>O primeiro amigo que se cadastrar ganha 200 pontos, o segundo ganha 100 pontos.</h3>
        </div>
            <form action="{{ route('friend_insert') }}" method="POST">
                @csrf
                <div class="form-group">
                    <h3> Vamos começar, preencha seus com seus dados:</h3><br>

                    <input id="name" type="text" class="form-control input-service @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" placeholder="Seu nome" required autocomplete="name">
            
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="email" type="email" class="form-control input-service @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Seu email">
            
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
            
                </div>

                <div class="form-group">
                    <br><h3> Agora indique o e-mail de dois amigos:</h3><br>

                    <input id="email" type="email" class="form-control input-service @error('email') is-invalid @enderror"
                        name="firstRefer" required autocomplete="email" placeholder="Email do amigo 1">
            
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
            
                </div>

                <div class="form-group">

                    <input id="email" type="email" class="form-control input-service @error('email') is-invalid @enderror"
                        name="secondRefer" required autocomplete="email" placeholder="Email do amigo 2">
            
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
            
                </div>

                <br><h3> Tudo pronto:</h3><br>
                <div class="btn">
                    
                    <button type="submit">Enviar</button>
                </div>
            </form>
         @endif

        
        @if($countUsers >= 1 && $countUsers <= 2)
        <div class="welcome-banner">
            <h1>{{$users[0]->name}} indicou dois amigos para ganhar pontos, se você é um deles, faça seu cadastro abaixo.</h1><br>
            <h3>O primeiro amigo que se cadastrar ganha 200 pontos, o segundo ganha 100 pontos.</h3>
        </div>
        <div>
            <div class="user-master">
                <div class="bg-user"></div>
                <h1>{{$users[0]->name}}</h1>
            </div>
            <h3>Amigo indicado:</h3><br>
        </div>
            <form action="{{ route('refer_insert') }}" method="POST">
                @csrf
                <div class="form-group">

                    <input id="name" type="text" class="form-control input-service @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" placeholder="Seu Nome" required autocomplete="name">
            
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">

                    <input id="email" type="email" class="form-control input-service @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Seu email">
            
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>
                @if (Session::has('message'))
                <p class="error">{{ Session::get('message') }}</p>
                @endif
                <div class="btn">
                <button type="submit">Enviar</button>
                </div>
            </form>
        @endif

        @if($countUsers == 3)
        <div class="welcome-banner">
            <h1>Chegamos ao final!</h1><br>
            <h3>Confirma o total de pontos por amigo:</h3>
        </div>

            <div class="grid-master">
                <div class="score">
                <p>{{$users[1]->rating}} pontos para {{$users[1]->name}}</p>
                </div>
                <div class="user-master">
                    <div class="bg-user"></div>
                    <h1>{{$users[0]->name}}</h1>
                </div>
                <div class="score">
                    <p>{{$users[2]->rating}} pontos para {{$users[2]->name}}</p>
                </div>
            </div>
            <div class="grid-friends">
                <div class="">
                    <div class="bg-first-friend"></div>
                    <br><h3>Primeiro lugar</h3>  
                    <h1> {{$users[1]->name}} </h1> 
                </div>
                <div class="">
                    <div class="bg-second-friend"></div>
                    <br><h3>Segundo lugar</h3>
                    <h1> {{$users[2]->name}} </h1>      
                </div>
            </div>

            <form method="POST" action="{{ route('restart') }}">
                {{-- {{method_field('DELETE')}} --}}
                @csrf
                <div class="btn">
                <button type="submit" class="btn btn-danger btn-sm">Recomeçar</button>
                </div>
            </form>
        @endif

{{-- <h1>{{ $users[0]->name }}</h1> --}}
{{-- <h1>{{ $countUsers }}</h1> --}}
{{-- @switch($users)
@case($user->id = 1)
<p>{{$user->name}}</p>
@break
@case($user->email = $user->firstDefer)
<p> tem o {{ $user->email . $user->firstDefer }}</p>
@break
@default

@endswitch --}}

{{-- @foreach ($users as $user)
        {{$user}}
    @endforeach --}}
    </body>
</html>
