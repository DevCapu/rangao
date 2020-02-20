@extends('template')
@section('conteudo')
    <div class="wallpaper">
        <main class="container">
            <div class="row centered-content">
                <h1>Rangão!</h1>
                <div class="card-panel">
                    <form action="/login" method="post">
                        @csrf
                        @error('incorreto')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="nome">Email
                            <input type="email" name="email" id="email" placeholder="felipe.b2014@gmail.com" required>
                        </label>

                        @error('senha')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="senha">Senha
                            <input type="password" name="senha" id="senha" placeholder="*******" required>
                        </label>

                        <button class="btn full-width">Cadastrar</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
@endsection
