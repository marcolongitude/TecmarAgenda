@extends('app')
@section('content')

    <!-- Modal ADD DEPARTAMENTO -->
    <div class="modal fade" id="AddDepartamento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #428bca;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-info text-center" id="myModalLabel" style="color:white;">Adicionar Departamento / Telefone </h4>
                </div>
                <div class="modal-body">

                    <div class="container" style="margin-top:10px;">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li style="margin-left:20px;">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => 'departamento/store', 'id' => 'formAddDepartamento']) !!}

                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Nome Form Input -->
                                    <div class="form-group">
                                        {!! Form::label('nome', 'Nome do Departamento:') !!}
                                        {!! Form::text('NomeDeparmento', null, ['class'=>'form-control', 'id' => 'nome']) !!}
                                    </div>

                                    <!-- Descricao Form Input -->
                                    <div class="form-group">
                                        {!! Form::label('secretaria', 'Secretaria:') !!}
                                        {!! Form::text('Secretaria', null, ['class'=>'form-control', 'id' => 'secretaria']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('telefone', 'Telefone:') !!}
                                        {!! Form::text('Telefone', null, ['class'=>'form-control', 'id' => 'telefone']) !!}
                                    </div>
                                    <!-- Tipo de Departamento Form Select -->
                                    <div class="form-group">
                                        <label for="tipoDepartamento" class="control-label">Tipo Departamento: </label>
                                        <select id="tipoDepartamento" class="form-control" name="Externo">
                                            <option value="0">Externo</option>
                                            <option value="1">Interno</option>
                                        </select>
                                    </div>
                                    <!-- submit do formulario -->

                                </div>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar &nbsp; <span class="glyphicon glyphicon-minus-sign"></span></button>
                    <button type="button" class="btn btn-info" id="limparFormAddDepartamento">Novo &nbsp; <span class="glyphicon glyphicon-plus-sign"></span></button>
                        <!--{!! Form::Submit('Salvar Departamento',
                            [
                                'class'=>'btn btn-primary',
                                'id' => 'salvar',
                            ])
                        !!}-->
                    <button type="submit" class="btn btn-primary" id="salvar">Salvar Departamento &nbsp; <span class="glyphicon glyphicon-floppy-saved"></span></button>
                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>

    <!-- Modal DETALHES DEPARTAMENTO -->
    <div class="modal fade" tabindex="-1" id="Details" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #428bca;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center text-info" id="myModalLabel" style="color:white">Detalhes Departamento / Telefone</h4>
                </div>
                <div class="modal-body">
                    <div id="showDetails"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar Detalhes &nbsp; <span class="glyphicon glyphicon-circle-arrow-left"></span></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal EDITAR DEPARTAMENTO -->
    <div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #428bca;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel" style="color:white">Editar Departamento / Telefone</h4>
                </div>
                <div class="modal-body">

                    <div class="container" style="margin-top:10px;">

                        {!! Form::open(['id' => 'formEditDepartamento']) !!}

                        <div class="row">
                            <div class="col-md-6">
                                <!-- Nome Form Input -->

                                <input type="hidden" name="id" value="" id="eid"/>

                                <div class="form-group">
                                    {!! Form::label('enome', 'Nome do Departamento:') !!}
                                    {!! Form::text('NomeDeparmento', null, ['class'=>'form-control', 'id' => 'enome']) !!}
                                </div>

                                <!-- Descricao Form Input -->
                                <div class="form-group">
                                    {!! Form::label('esecretaria', 'Secretaria:') !!}
                                    {!! Form::text('Secretaria', null, ['class'=>'form-control', 'id' => 'esecretaria']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('etelefone', 'Telefone:') !!}
                                    {!! Form::text('Telefone', null, ['class'=>'form-control', 'id' => 'etelefone']) !!}
                                </div>
                                <div class="form-group">
                                        {!! Form::label('externo', 'Tipo Departamento: ') !!}
                                        <select name="Externo" class="form-control" id="eexterno">

                                        </select>
                                    </div>
                                </div>
                                <!-- submit do formulario -->

                            </div>
                        </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close &nbsp; <span class="glyphicon glyphicon-remove-circle"></span></button>
                        <!--{!! Form::Submit('Salvar Departamento',
                            [
                                'class'=>'btn btn-primary',
                                'id' => 'salvar',
                            ])
                        !!}-->
                    <button type="submit" class="btn btn-primary" id="salvar">Salvar Departamento &nbsp; <span class="glyphicon glyphicon-floppy-saved"></span></button>
                </div>
            {!!Form::close()!!}
            </div>
        </div>
    </div>

    <div style="margin-bottom: 20px;"><button
                    type="button"
                    class="btn btn-primary btn-sm"
                    data-toggle="modal"
                    data-target="#AddDepartamento"
                    style="margin-left: 15px; margin-top: 10px">
                Adicionar Departamento / Telefone
                &nbsp; <span class="glyphicon glyphicon-plus-sign"></span>
            </button>
        </div>

    <div class="container-fluid">
        <!-- Button trigger modal -->
        
        <div class="panel panel-primary">
            <div class="panel-heading">

                <h2 class="text-info text-center" style="color: white;">Telefones e Departamentos - Prefeitura de Morrinhos - GO</h2>
            </div>
            <div class="panel-body">
                <div class="table-responsive text-center">
                    <table class="table table-borderless" id="table">
                        <thead>
                        <tr>
                            <th hidden>ID</th>
                            <th class="text-center">Departamento</th>
                            <th class="text-center">Secretaria</th>
                            <th class="text-center">Telefone</th>
                            <th class="text-center">Tipo Departamento</th>

                            <th class="text-center">Ações</th>
                        </tr>
                        </thead>
                        @foreach($departamentos as $item)
                            <tr class="text-left">
                                <td hidden>{{$item->id}}</td>
                                <td>{{$item->NomeDeparmento}}</td>
                                <td>{{$item->Secretaria}}</td>
                                <td>{{$item->Telefone}}</td>
                                <td>{{$item->present()->tipoDepDefinido}}</td>

                                <td>
                                    <button class="btn btn-primary btn-sm classEdit" type="button" value="{{$item->id}}" name="Edit" data-toggle="modal" data-target="#Edit">
                                        Editar &nbsp; <span class="glyphicon glyphicon-edit"></span>
                                    </button>
                                    <!--<a href="{{ url('/departamento/show') }}/{{$item->id}}"
                                       class="btn btn-info btn-sm classDetails" data-toggle="modal" data-target="#Details">Detalhes
                                    </a>-->
                                    <button class="btn btn-warning btn-sm classDetails" type="button" value="{{$item->id}}" name="Details" data-toggle="modal" data-target="#Details">
                                        Detalhes &nbsp; <span class="glyphicon glyphicon-eye-open"></span>
                                    </button>
                                    <a href="{{ url('/departamento/destroy') }}/{{$item->id}}" class="btn btn-danger btn-sm Delete">Excluir &nbsp; <span class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script>
        //LIMPA FORMULARIO ADD DEPARTAMENTO
        $('#limparFormAddDepartamento').click(function(){
            $('#formAddDepartamento').each(function(){
                this.reset();
            });
        });

        //DELETA DEPARTAMENTO
        $('.Delete').click(function(){
            var resposta = confirm('Deseja realmente EXCLUIR os dados?');
            if (resposta == false){
                alert("Operação CANCELADA pelo USUÁRIO!");
                return false;
            }
        });


        //EDITAR ATUALIZA DADOS DO DEPARTAMENTO
        $('.classEdit').click(function(){

            var idDep = $(this).val();

            //Limpa campos do formulario de edição
            $('#formEditDepartamento').each(function(){
                this.reset();
            });

            //Cria o atributo action no form com a url desejada para update com o ID
            $('#formEditDepartamento').attr("action", "http://191.222.17.98/departamento/update/"+idDep);

            //Seleciona os dados de uma tupla pelo id e preenche os campos do formulario.
            $.ajax({
                type: 'GET',
                url: "http://191.222.17.98/departamento/edit/"+idDep,
                datatype: 'json',
                success: function(data){
                    for(var i = 0; i < data.length; i++){

                        $('#eid').val(data[i].id);
                        $('#enome').val(data[i].NomeDeparmento);
                        $('#esecretaria').val(data[i].Secretaria);
                        $('#etelefone').val(data[i].Telefone);
                        var ext = '';
                        ext = data[i].Externo;

                            var optionSim = '<option value="0" class="optionSim">Externo</option>';
                            var optionNao = '<option value="1" class="optionNao">Interno</option>';

                        if( ext == 0 ){
                            $("#eexterno option[value='0']").remove();
                            $("#eexterno option[value='1']").remove();
                            $('#eexterno').append(optionSim);
                            $('#eexterno').append(optionNao);
                        }

                        if( ext == 1 ){
                            $("#eexterno option[value='0']").remove();
                            $("#eexterno option[value='1']").remove();
                            $('#eexterno').append(optionNao);
                            $('#eexterno').append(optionSim);
                        }

                    }
                }
            });
        });

        //FUNÇÃO QUE CARREGA DETALHES DA LINHA DA TABELA PARA O MODAL
        $('.classDetails').click(function(){
            var idDep = $(this).val();
            $.ajax({
                type: 'GET',
                url: "http://191.222.17.98/departamento/show/"+idDep,
                dataType:"json",
                success: function(data){
                    //console.log(data.NomeDeparmento);
                    for (var i = 0; i < data.length; i++) {
                        //console.log(data[i].NomeDeparmento);
                        var ext = data[i].Externo;
                        if (ext == 1){
                            var externo = 'Não';
                        }
                        if (ext == 0){
                            var externo = 'Sim';
                        }
                        $('#showDetails').html(
                                                    '<h3 class="text-info">Nome do Departamento: ' + '<spam class="text-muted">' + data[i].NomeDeparmento+ '</spam></h3>'+
                                                    '<h3 class="text-info">Secretaria: ' + '<spam class="text-muted">' + data[i].Secretaria+'</spam></h3>'+
                                                    '<h3 class="text-info">Telefone: ' + '<spam class="text-muted">' + data[i].Telefone+'</spam></h3>'+
                                                    '<h3 class="text-info">Externo: ' + '<spam class="text-muted">' + externo + '</spam></h3>'

                                                );
                    }
                },
            });

        });


        $(document).ready(function(){

            //CARREGA O GRID TABELA
            $('#table').DataTable({
		          "order": [ 0, "desc" ],
                    "language": {
                        "lengthMenu": "QTD _MENU_ de registros",
                        "zeroRecords": "Nenhum resultado encontrado",
                        "info": "Quantidade de paginas _PAGE_ de _PAGES_",
                        "infoEmpty": "Nenhuma Informação",
                        "infoFiltered": " ",
                    }

	        });

                // validate signup form on keyup and submit
                $("#formAddDepartamento").validate({
                    rules: {
                        NomeDeparmento: "required",
                        Secretaria: "required",
                        Telefone: "required",

                    },
                    messages: {
                        NomeDeparmento: "Por favor, digite o Nome do Departamento",
                        Secretaria: "Por favor, digite o Nome da Secretaria",
                        Telefone: "Por favor, digite o Telefone",

                    }
                });

            //$("#date").mask("99/99/9999");
            $("#telefone").mask("(99) 9999-9999");
            //$("#tin").mask("99-9999999");
            //$("#ssn").mask("999-99-9999");

        });
    </script>

@endsection






