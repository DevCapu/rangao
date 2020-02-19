@extends('template')

@section('conteudo')
    <div class="wallpaper">
        <main class="container">
            <div class="centered-content">
                <div class="card-panel">
                    <form action="/usuario" method="post">
                        @csrf

                        @error('nome')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="row">
                            <div class="input-field col s6">
                                <input placeholder="João da Silva" id="nome" type="text" class="validate" name="nome"
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

                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="row">
                            <div class="input-field col s12">
                                <input placeholder="********" id="senha" type="password" class="validate"
                                       name="senha"
                                       required>
                                <label for="senha">Senha</label>
                            </div>
                        </div>

                        <div class="row">
                            @error('peso')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="input-field col s6">
                                <input placeholder="65" id="peso" type="text" class="validate"
                                       name="peso"
                                       required>
                                <label for="peso">Peso</label>
                            </div>

                            @error('altura')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="input-field col s6">
                                <input placeholder="1.65" id="altura" type="text" class="validate"
                                       name="altura"
                                       required>
                                <label for="altura">Altura</label>
                            </div>
                        </div>

                        <div class="row">

                            @error('nascimento')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="input-field col s6">
                                <input id="nascimento" type="date" class="validate"
                                       name="nascimento"
                                       required>
                                <label for="nascimento">Nascimento</label>
                            </div>

                            @error('sexo')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="input-field col s6">
                                <select name="sexo" id="sexo" required>
                                    <option value="male">Masculino</option>
                                    <option value="female">Feminino</option>
                                </select>
                                <label for="sexo">Sexo biológico</label>
                            </div>

                        </div>

                        <div class="row">
                            @error('objetivo')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="input-field col s6">
                                <select name="objetivo" id="objetivo" required>
                                    <option value="lose">Perder peso</option>
                                    <option value="define">Definir músculo</option>
                                    <option value="gain">Ganhar Massa</option>
                                </select>
                                <label for="objetivo">Objetivo</label>
                            </div>


                            @error('atividade')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="input-field col s6">
                                <select name="atividade" id="atividade" required>
                                    <option value="sedentary">Sedentário</option>
                                    <option value="littleActive">Atividade baixa</option>
                                    <option value="active">Ativo</option>
                                    <option value="veryActive">Muito ativo</option>
                                </select>
                                <label for="atividade">Nível de atividade</label>
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
            $('#atividade').formSelect();
            $('#objetivo').formSelect();
            $('#sexo').formSelect();

            $('#atividade').on('contentChanged', function () {
                $(this).formSelect();
            });

            $('#objetivo').on('contentChanged', function () {
                $(this).formSelect();
            });

            $('#sexo').on('contentChanged', function () {
                $(this).formSelect();
            });
        });
    </script>
@endsection
