@extends('app')
@section('content')

    <!-- Modal DETALHES DEPARTAMENTO -->
    <div class="modal fade" tabindex="-1" id="Details" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg " role="document">
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


    <div class="container-fluid">
        <div class="panel panel-primary">
            <div class="panel-heading">

                <h2 class="text-info text-center" style="color: white;">Lista de Serviços - Prefeitura de Morrinhos - GO</h2>
            </div>
            <div class="panel-body">
                <div class="table-responsive text-center">
                    <table class="table" id="table">
                        <thead>
                        <tr>
                            <th class="text-center">Departamento</th>
                            <th class="text-center">Descrição</th>
                            <th class="text-center">Tipo Serviço</th>
                            <th class="text-center">Data</th>
                            <th class="text-center"></th>
                            <th class="text-center"></th>
                        </tr>
                        </thead>
                        @foreach($servicos as $item)
                            <tr>
                                <td class="text-left">{{$item->NomeDeparmento}}</td>
                                @if (strlen($item->descricao) > 100)
                                    <td class="text-left">{{substr($item->descricao, 0, 100)}} ...</td>
                                @endif
                                @if (strlen($item->descricao) < 100)
                                    <td class="text-left">{{$item->descricao}}</td>
                                @endif
                                @if ($item->tipoServico == 1)
                                    <td class="text-center" style="color:red">Agendado</td>
                                @endif
                                @if ($item->tipoServico == 0)
                                    <td class="text-center">Finalizado</td>
                                @endif
                                <td class="text-left">{{\Carbon\Carbon::parse($item->created_at)->format('Y/m/d')}}</td>
                                <td><button class="btn btn-warning btn-sm classDetails" type="button" value="{{$item->id}}" name="Details" data-toggle="modal" data-target="#Details">
                                        Detalhes &nbsp; <span class="glyphicon glyphicon-eye-open"></span></button>  
                                    </td>    
					                <td><a href="{{ url('/servico/imprimirOS') }}/{{$item->id}}"
                                       class="btn btn-primary btn-sm">Imprimir &nbsp; <span class="glyphicon glyphicon-print"></span>
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

    //FUNÇÃO QUE CARREGA DETALHES DA LINHA DA TABELA PARA O MODAL
    $('.classDetails').click(function(){
        var idServ = $(this).val();
        $.ajax({
            type: 'GET',
            url: "http://191.222.17.98/servico/showServicoDetail/"+idServ,
            dataType:"json",
            success: function(data){

                for (var i = 0; i < data.length; i++) {

                    $('#showDetails').html(
                        '<h3 class="text-justify"><b><ins>Descrição</ins>:</b><br><br> ' + 
                            '<spam class="small">' + data[i].descricao + 
                            '</spam></h3>'+
                        '<h3><b>Data: </b>' + 
                            '<spam class="small">' + data[i].created_at +
                            ' hs</spam> </h3>'
                    );
                }
            },
        });

    });


    $(document).ready(function(){

    //CARREGA O GRID TABELA
        $('#table').DataTable({
            //"order": [ 0, "desc" ],
            "language": {
                "lengthMenu": "QTD _MENU_ de registros",
                "zeroRecords": "Nenhum resultado encontrado",
                "info": "Quantidade de paginas _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhuma Informação",
                "infoFiltered": " ",
            }
        });
    });
</script>

@endsection
