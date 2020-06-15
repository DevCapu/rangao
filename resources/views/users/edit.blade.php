@extends('template')

@section('conteudo')
    <main class="container">
        <div class="row">
            <div class="file-field input-field">
                <div class="btn">
                    <span>File</span>
                    <input type="file">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
        </div>

        <form action="{{route('users.update', $user->id)}}">
            @method("PUT")
            @csrf
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="João da Silva" id="name" type="text" class="validate" name="name"
                           value="{{$user->name ? $user->name : ''}}"
                           required>
                    <label for="first_name">Nome</label>
                </div>

                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="input-field col s6">
                    <input placeholder="{{$user->email ? $user->email : ''}}" id="email" type="email" class="validate"
                           name="email"
                           required disabled>
                    <label for="email">Email</label>
                </div>
            </div>

            <div class="row">
                @error('weight')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="input-field col s6">
                    <input placeholder="65" id="weight" type="text" class="validate" name="weight"
                           value="{{$user->weight}}"

                           required>
                    <label for="weight">Peso</label>
                </div>

                @error('height')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="input-field col s6">
                    <input placeholder="1.65" id="height" type="text" class="validate"
                           name="height" value="{{$user->height}}"
                           required>
                    <label for="height">Altura</label>
                </div>
            </div>

            <div class="row">

                @error('birthday')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="input-field col s6">
                    <input id="birthday" type="date" class="validate"
                           name="birthday" placeholder="{{$user->birthday}}"
                           required>
                    <label for="birthday">Nascimento</label>
                </div>

                @error('gender')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="input-field col s6">
                    <select name="gender" id="gender" disabled>
                        <option value="male" {{$user->gender === 'male' ? 'selected' :''}}>Masculino</option>
                        <option value="female" {{$user->gender === 'female' ? 'selected' :''}}>Feminino</option>
                    </select>
                    <label for="gender">Sexo biológico</label>
                </div>
                <input type="hidden" name="gender" value="{{$user->gender}}">
            </div>

            <div class="row">
                @error('objective')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="input-field col s6">
                    <select name="objective" id="objective" required>
                        <option value="lose" {{$user->objective === 'lose' ? 'selected' :''}}>Perder peso</option>
                        <option value="define" {{$user->objective === 'define' ? 'selected' :''}}>Definir músculo
                        </option>
                        <option value="gain" {{$user->objective === 'gain' ? 'selected' :''}}>Ganhar Massa</option>
                    </select>
                    <label for="objective">Objetivo</label>
                </div>


                @error('activity')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="input-field col s6">
                    <select name="activity" id="activity" required>
                        <option value="sedentary" {{$user->activity === 'sedentary' ? 'selected' :''}}>Sedentário
                        </option>
                        <option value="littleActive" {{$user->activity === 'littleActive' ? 'selected' :''}}>Atividade baixa
                        </option>
                        <option value="active" {{$user->activity === 'active' ? 'selected' :''}}>Ativo</option>
                        <option value="veryActive" {{$user->activity === 'veryActive' ? 'selected' :''}}>Muito ativo
                        </option>
                    </select>
                    <label for="activity">Nível de atividade</label>
                </div>
            </div>
            <button class="btn full-width">Salvar</button>
        </form>
    </main>
@endsection

@section("scripts")
    <script>
        $(document).ready(function () {
            $('#activity').formSelect();
            $('#objective').formSelect();
            $('#gender').formSelect();

            $('#activity').on('contentChanged', function () {
                $(this).formSelect();
            });

            $('#objective').on('contentChanged', function () {
                $(this).formSelect();
            });

            $('#gender').on('contentChanged', function () {
                $(this).formSelect();
            });
        });
    </script>
@endsection
