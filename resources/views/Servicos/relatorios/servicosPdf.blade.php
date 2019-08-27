
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
	.corpo {margin-top: 30px;};
    .textLeft {text-align: left;};
	
</style>
	
</head>

<body>

<div class="titulo">
	<img style="margin-left: 260px;" src="/var/www/html/TecMarTelefone/public/images/logo-nova-2.png" height="150px" width="210px">
    <h1 class="center">Governo da cidade de Morrinhos - GO</h1>
    <h2 class="center">SEMED - Secretaria de Educação</h2>
    <h3 class="center">Departamento de Manutençao Informatica</h3>
        
        <hr>    
    	<div class="corpo">

            @foreach($servico as $ser)
            	
            	<h2>Departamento: {{$ser->NomeDeparmento}}</h2>
                
                <h5 style="text-align: right;" class="textLeft"> Data: {{$ser->dataServico}} - Hora Inicial: {{$ser->horaInicioServico}} hs - Hora Final: {{$ser->horaFimServico}} hs</h5>
                <hr>

                <h2>Problemas solucionados:</h2>
                {{$ser->descricao}}<br>
                
                
                
            @endforeach
        </div>

               
</div>

		

<footer class="b">
        <div class="well well-sm" style="position:absolute;bottom:0;width:100%;">

        	<h4 class="center">___________________________________________</h4>
        	<h4 class="center" style="margin-bottom: 40px">Assinatura do requisitante</h4>

            <p class="text-info text-center">&copy; TecMar "Desenvolvimento de Sistemas Web" <strong>Módulo Telefonia</strong> - Governo da cidade de Morrinhos - GO ( Secretaria de Educação - SEMED )</p>
            <address>
                <strong class="text-warning">TecMAR Media, Inc.</strong><br>
                Morrinhos - Go<br>
                <abbr title="Telefone: ">Tel</abbr> - (64) 99295 9483 <br>
                <a>marcocpdti@gmail.com</a>
            </address>

        </div>
    </footer>


</body>
</html>
