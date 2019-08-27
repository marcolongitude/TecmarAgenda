@extends('app')
@section('content')



<div class="container-fluid">
        <div class="panel panel-primary">
            <div class="panel-heading">

                <h2 class="text-info text-center" style="color: white;">Pesquisa de Serviços por Data- Prefeitura de Morrinhos - GO</h2>
            </div>
            <div class="panel-body" style="margin-top: 50px;">


 				{!! Form::open(['url' => 'servico/relatorioData', 'id' => 'formAddServico']) !!}
 						<div class="container-fluid">
                            <div class="row" style="margin-bottom: 30px;">
                                <div class="col-md-4">                                  
                                    
                                    <!-- Departamentos Form Input -->
                                    <div class="form-group">
                                    	{!! Form::label('departamentos', 'Departamentos:') !!}
                                        <select hidden
                                                class="depart show-tick"
                                                name="departamento_id"
                                                data-live-search="true"
                                                title="Escolha um Departamento..."
                                                size="5"
                                                data-style="btn-info"
                                                data-width="1000px"
                                                id="departamentos"
                                        >
                                        	<option value="0">Todos os Departamentos</option>

                                            @foreach($departamentos as $depart)
                                                <option value="{{$depart->id}}">{{$depart->NomeDeparmento}}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">        
                                    <!-- Data do Serviço Form Input -->
                                    <div class="form-group">
                                        {!! Form::label('dataInicial', 'Data Inicial:') !!}
                                        <input type="date" name="dataServicoInicial" id="dataInicial" class="form-control"> 
                                    </div>    
                                </div>  
                                <div class="col-md-2	">  
                                    <!-- Data do Serviço Form Input -->
                                    <div class="form-group">
                                        {!! Form::label('dataFinal', 'Data Final:') !!}
                                        <input type="date" name="dataServicoFinal" id="dataFinal" class="form-control"> 
                                    </div>                                  
                                </div>
                                    

                                </div>
                            </div>
                    
			                <div class="row text-right" style="margin-right: 30px;" >
			                	<!-- submit do formulario 
			                    
			                        {!! Form::Submit('Imprimir Relatório',
			                            [
			                                'class'=>'btn btn-primary',
			                                'id' => 'salvar',
			                            ])
			                        !!}-->
                                <button type="submit" class="btn btn-primary" id="salvar">Imprimir Relatório &nbsp; <span class="glyphicon glyphicon-print"></span></button>
			                </div>
			                {!!Form::close()!!}
            </div>
        </div>
</div>

                <script type="text/javascript">
                	
                	//Trata o comportamento da busca pelo select
			        $('.depart').selectpicker({

			            size: 9000
			        });

                </script>

@endsection