@extends('template')

@section('conteudo')
    <div class="wallpaper">
        <main class="container">
            <div class="centered-content">
                <div class="card-panel">
                    <form action="{{route('users.store')}}" method="POST">
                        @csrf
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="row">
                            <div class="input-field col s6">
                                <input placeholder="João da Silva" id="name" type="text" class="validate" name="name"
                                       required>
                                <label for="first_name">Nome</label>
                            </div>

                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="input-field col s6">
                                <input placeholder="exemplo@gmail.com" id="email" type="email" class="validate"
                                       name="email"
                                       required>
                                <label for="email">Email</label>
                            </div>
                        </div>

                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="row">
                            <div class="input-field col s12">
                                <input placeholder="********" id="password" type="password" class="validate"
                                       name="password"
                                       required>
                                <label for="password">Senha</label>
                            </div>
                        </div>

                        <div class="row">
                            @error('weight')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="input-field col s6">
                                <input placeholder="65" id="weight" type="text" class="validate"
                                       name="weight"
                                       required>
                                <label for="weight">Peso</label>
                            </div>

                            @error('height')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="input-field col s6">
                                <input placeholder="1.65" id="height" type="text" class="validate"
                                       name="height"
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
                                       name="birthday"
                                       required>
                                <label for="birthday">Nascimento</label>
                            </div>

                            @error('gender')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="input-field col s6">
                                <select name="gender" id="gender" required>
                                    <option value="male">Masculino</option>
                                    <option value="female">Feminino</option>
                                </select>
                                <label for="gender">Sexo biológico</label>
                            </div>

                        </div>

                        <div class="row">
                            @error('objective')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="input-field col s6">
                                <select name="objective" id="objective" required>
                                    <option value="lose">Perder peso</option>
                                    <option value="define">Definir músculo</option>
                                    <option value="gain">Ganhar Massa</option>
                                </select>
                                <label for="objective">Objetivo</label>
                            </div>


                            @error('activity')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="input-field col s6">
                                <select name="activity" id="activity" required>
                                    <option value="sedentary">Sedentário</option>
                                    <option value="littleActive">Atividade baixa</option>
                                    <option value="active">Ativo</option>
                                    <option value="veryActive">Muito ativo</option>
                                </select>
                                <label for="activity">Nível de atividade</label>
                            </div>
                        </div>
                        <button class="btn full-width">Cadastrar</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
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
