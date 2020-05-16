@extends('template')

@section('conteudo')
    <div class="container">
        <div class="row">
            <h2>Novo alimento na geladeira</h2>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <form action="{{route('refrigerator.store')}}" method="POST">
                @csrf
                <label for="alimentos">Qual alimento você está guardando?
                    <select name="food" id="alimentos" required></select>
                </label>
                <label for="quantidade">Quantidade
                    <input type="number" name="quantity" value="0" min="0" max="100">
                </label>
                <label for="validade">Validade
                    <input type="text" name="expiration_date">
                </label>
                <label for="notificacao">Avisar quantos dias antes de vencer
                    <input type="number" name="notification" value="7" min="0">
                </label>
                <button class="btn full-width">Salvar</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#refeicao').formSelect();
            $('#alimentos').formSelect();
            $('.tabs').tabs();
            setTimeout(() => {
                $("#alimentos").trigger('contentChanged');
            }, 20)
        });
        $('#alimentos').on('contentChanged', function () {
            $(this).formSelect();
        });
    </script>

    <script src="{{asset('js/refeicao/busca-alimentos.js')}}"></script>
@endsection
