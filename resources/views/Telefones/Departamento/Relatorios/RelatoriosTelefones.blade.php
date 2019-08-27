
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
    
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 15px;
    };
    table {
        border-spacing: 0px;
    };

    #titulo {
        color: white;
        background-color: blue;
    };

    .header,
    .footer {
        width: 100%;
        text-align: center;
        position: fixed;
    };
    .header {
        top: 0px;
    };
    .footer {
        bottom: 0px;
    };
    .pagenum:before {
        content: counter(page);
    };
    
    
	
</style>
	
</head>

<body>

<div class="titulo">
	<img style="margin-left: 260px;" src="/var/www/html/TecMarTelefone/public/images/logo-nova-2.png" height="150px" width="210px">
    
    <h1 class="center">Governo da cidade de Morrinhos - GO</h1>
    <h2 class="center">SEMED - Secretaria de Educação</h2>
    <h3 class="center">Departamento de Manutençao Informatica</h3><br><br>
        
        <h4 style="text-align: center;">Relatório: Lista de Telefones / Departamentos
                    
        </h4>
        <hr>
    	<div class="corpo">                 
                        
                        
                        <div>
                            <table style="border-spacing: 0px;">
                                <thead>
                                    <tr style="color: white; background-color: blue;">
                                
                                        <th class="center" style="width: 255px;">Departamento</th>
                                        <th class="center">Secretaria</th>
                                        <th class="center">Telefone</th>
                                        <th class="center" style="width: 50px;">Tipo</th>
                                
                                    </tr>
                                </thead>
                                @foreach($departamentos as $item)
                                    <tr class="text-left">
                                        
                                        <td>{{$item->NomeDeparmento}}</td>
                                        <td>{{$item->Secretaria}}</td>
                                        <td>{{$item->Telefone}}</td>
                                        <td>{{$item->present()->tipoDepDefinido}}</td>
                                        
                                    </tr>
                            @endforeach
                        </table>                
                
                    </div>
               
        </div>
    
    <footer class="b">
        <div class="well well-sm" style="position:absolute;bottom:0;width:100%;">

            <h5>Total de Telefones: {{$total}}</h5>

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