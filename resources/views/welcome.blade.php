<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
    <link rel="stylesheet" href="{{ asset( '/css/style.css' )}}">

    </head>
    <body>
        @if ($countUsers == null)
        <div class="">
            <h1>Indique dois amigos</h1>
        </div>
            <form action="{{ route('friend_insert') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input id="name" type="text" class="form-control input-service @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" placeholder="Nome" required autocomplete="name">
            
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="firstRefer">Email</label>
                    <input id="email" type="email" class="form-control input-service @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
            
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
            
                </div>

                <div class="form-group">
                    <label for="firstRefer">Email amigo 1</label>
                    <input id="email" type="email" class="form-control input-service @error('email') is-invalid @enderror"
                        name="firstRefer" required autocomplete="email" placeholder="Email">
            
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
            
                </div>

                <div class="form-group">
                    <label for="firstRefer">Email amigo 2</label>
                    <input id="email" type="email" class="form-control input-service @error('email') is-invalid @enderror"
                        name="secondRefer" required autocomplete="email" placeholder="Email">
            
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
            
                </div>

                <button type="submit">Enviar</button>
            </form>
         @endif

        
        @if($countUsers >= 1 && $countUsers <= 2)
        <div>
            <h1>Amigo indicado</h1>
        </div>
            <form action="{{ route('refer_insert') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input id="name" type="text" class="form-control input-service @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" placeholder="Nome" required autocomplete="name">
            
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="firstRefer">Email</label>
                    <input id="email" type="email" class="form-control input-service @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
            
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <button type="submit">Enviar</button>
            </form>
        @endif

        @if($countUsers == 3)
        {{-- @foreach ($users as $user)
            <h1>{{$user->name}}</h1>
        @endforeach --}}

            <div class="grid-master">
                <div class="score">
                    <p>{{$users[1]->rating}} pontos</p>
                </div>
                <div class="user-master">
                    <div class="bg-user"></div>
                    <h1>{{$users[0]->name}}</h1>
                </div>
                <div class="score">
                    <p>{{$users[2]->rating}} pontos</p>
                </div>
            </div>
            <div class="grid-friends">
                <div class="">
                    <div class="bg-first-friend"></div>
                    <h1> {{$users[1]->name}} </h1>   
                </div>
                <div class="">
                    <div class="bg-second-friend"></div>
                    <h1> {{$users[2]->name}} </h1>      
                </div>
            </div>

            <form method="POST" action="{{ route('restart') }}">
                {{-- {{method_field('DELETE')}} --}}
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">Recomeçar</button>
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
