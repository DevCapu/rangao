@extends('template')

@section('conteudo')
    <div class="container">
        <div class="row">
            <h2>Novo alimento na geladeira</h2>

        </div>
        <div class="row">
            <form action="/geladeira" method="POST">
                @csrf
                <div class="input-field col s12">
                    <select name="alimento" id="alimentos" required>
                    </select>
                    <label for="alimentos">Qual alimento você ingeriu?</label>
                </div>
                <label for="quantidade">Quantidade
                    <input type="number" name="quantidade" value="0" min="0" max="100">
                </label><br>
                <label for="validade">Validade
                    <input type="text" name="validade">
                </label><br>
                <label for="notificacao">Avisar quantos dias antes de vencer
                    <input type="number" name="notificacao" value="7" min="0">
                </label><br>
                <button class="btn full-width">Editar</button>
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

            //Aquelas dúvidas que eu nunca vou entender, pq precisei fazer isso
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
