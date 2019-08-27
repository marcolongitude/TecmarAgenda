@extends('app')
@section('content')


    <button
            type="button"
            class="btn btn-primary btn-sm"
            data-toggle="modal"
            data-target="#AddServico"
            style="margin-left: 15px; margin-top: 10px">
        Adicionar Serviços &nbsp;<span class="glyphicon glyphicon-plus-sign"></span>
    </button><br><br>

    <!-- Modal ADD SERVIÇOS -->
    <div class="modal fade" id="AddServico" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #428bca;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-info text-center" id="myModalLabel" style="color: white;">Adicionar Serviços</h4>
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

                        {!! Form::open(['url' => 'servico/store', 'id' => 'formAddServico']) !!}

                            <div class="row">
                                <div class="col-md-6">

                                    <!-- Departamentos Form Input -->
                                    <div class="form-group">

                                        <select hidden
                                                class="depart show-tick"
                                                name="departamento_id"
                                                data-live-search="true"
                                                title="Escolha um Departamento..."
                                                size="5"
                                                data-style="btn-info"
                                                data-width="1000px"
                                        >

                                            @foreach($departamentos as $depart)
                                                <option value="{{$depart->id}}">{{$depart->NomeDeparmento}}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <!-- Descricao Form Input -->
                                    <div class="form-group">
                                        {!! Form::label('desc', 'Descrição do Serviço:') !!}
                                        {!! Form::textarea('descricao', null, ['class'=>'form-control', 'id' => 'desc']) !!}
                                    </div>

                                    <!-- Data do Serviço Form Input -->
                                    <div class="form-group">
                                        {!! Form::label('dataServico', 'Data do Serviço:') !!}
                                        <input type="date" name="dataServico" id="dataServico" class="form-control"> 
                                    </div>

                                    <!-- Data do Serviço Form Input -->
                                    <div class="form-group">
                                        {!! Form::label('horaInicioServico', 'Hora Inicial:') !!}
                                        <input type="time" name="horaInicioServico" id="horaInicioServico" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('horaFimServico', 'Hora Final:') !!}
                                        <input type="time" name="horaFimServico" id="horaFimServico" class="form-control">
                                    </div>

                                    <!-- Servicos Form Input -->
                                    <div class="form-group">
                                        <label for="tipo" class="control-label">Tipo: </label>
                                        <select id="tipo" class="form-control" name="tipoServico">
                                            <option value="0">Realizado</option>
                                            <option value="1">Agendado</option>
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
                        <!--{!! Form::Submit('Salvar Serviço',
                            [
                                'class'=>'btn btn-primary',
                                'id' => 'salvar',
                            ])
                        !!}-->
                    <button type="submit" class="btn btn-primary" id="salvar">Salvar Serviço &nbsp;<span class="glyphicon glyphicon-floppy-saved"></span></button>
                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>

    <!-- Corpo da página -->
    <div class="container-fluid">
        <div class="panel panel-primary">
            <div class="panel-heading">

                <h2 class="text-center" style="color: white">Lista de Serviços por Departamento</h2>
            </div>
            <div class="panel-body">
                <div class="table-responsive text-center">
                    <table class="table table-borderless" id="table">
                        <thead>
                        <tr>
                            <th class="text-center">Departamento</th>
                            <th class="text-center">Secretaria</th>
                            <th class="text-center">Telefone</th>
                            <th class="text-center">Externo</th>


                            <th class="text-center">Ações</th>
                        </tr>
                        </thead>
                        @foreach($departamentos as $item)
                            <tr>
                                <td class="text-left">{{$item->NomeDeparmento}}</td>
                                <td class="text-left">{{$item->Secretaria}}</td>
                                <td>{{$item->Telefone}}</td>
                                <td>{{$item->present()->tipoDepDefinido}}</td>
                                <td>
                                    <a href="{{ url('/servico/showServicosDepartamentos') }}/{{$item->id}}"
                                       class="btn btn-info btn-sm">Serviços &nbsp; <span class="glyphicon glyphicon-folder-open"></span>
                                    </a>

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

        //Trata o comportamento da busca pelo select
        $('.depart').selectpicker({

            size: 9000
        });


        $(document).ready(function(){

            //CARREGA O GRID TABELA
            $('#table').DataTable();

                // validate signup form on keyup and submit
                $("#formAddServico").validate({
                    rules: {
                        departamento_id: "required",
                        descricao: "required",
                        tipoServico: "required",

                    },
                    messages: {
                        departamento_id: "Por favor, escolha uma Opção",
                        descricao: "Por favor, digite a descrição do serviço",
                        tipoServico: "Por favor, escolha uma Opção",

                    }
                });

        });
    </script>

@endsection






