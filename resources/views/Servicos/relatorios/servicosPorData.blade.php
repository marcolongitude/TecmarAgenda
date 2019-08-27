
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TecMar - Telefones</title>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">

<style type="text/css">
	.center {text-align: center;};
	.corpo {margin-top: 30px; width: 90%;};
    .textLeft {text-align: left;};

    table {
        border-spacing: 0px;
    };

    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 15px;
    };

    .header,
    .footer {
        width: 100%;
        text-align: center;
        position: fixed;
    }
    .header {
        top: 0px;
    }
    .footer {
        bottom: 0px;
    }
    .pagenum:before {
        content: counter(page);
    }
    
    
	
</style>
	
</head>

<body>

<div class="titulo">
	<img style="margin-left: 260px;" src="/var/www/html/TecMarTelefone/public/images/logo-nova-2.png" height="150px" width="210px">
    
    <h1 class="center">Governo da cidade de Morrinhos - GO</h1>
    <h2 class="center">SEMED - Secretaria de Educação</h2>
    <h3 class="center">Departamento de Manutençao Informatica</h3><br><br>
        
        <h4 style="text-align: center;">Relatório: Lista de Serviços por Data: de {{\Carbon\Carbon::parse($dataInicial)->format('d/m/Y')}} ate {{\Carbon\Carbon::parse($dataFinal)->format('d/m/Y')}}  
                    
        </h4>
        <hr>
    	<div class="corpo">                 
                        
                        @foreach($servicos as $item)
                            
                                <h3>Departamento: {{$item->NomeDeparmento}}</h3>
                                <h3> Data: {{\Carbon\Carbon::parse($item->dataServico)->format('d/m/Y')}}</h3>
                                
                                    <h4 style="overflow: hidden;">Descrição: {{$item->descricao}}</h4>
                              
                                <hr>                      
                            
                        @endforeach                    
                
        </div>
               
</div>
    
    <div class="footer">
        @foreach($total as $t )
            <b>Total de Serviços: {{$t}}</b>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
        @endforeach
       

        <span> Marco Aurélio Guimaraes - marcocpdti@gmail.com </span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  Page <span class="pagenum"></span>
    </div>

</body>
</html>