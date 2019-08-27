<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TecMar - Telefones</title>

	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">

	
</head>
<body style="
	background-image: url('/images/fundo.jpeg');
			    background-repeat: no-repeat;
			    background-size:100%;
			    bottom: 0;			    
			    left: 0;
			    overflow: auto;			    
			    position: absolute;
			    right: 0;			    
			    top: 0;
">
	<nav class="navbar navbar-inverse navbar-fixed-top" style="
                                                                background-color: #4682B4; 
                                                                -webkit-box-shadow: 6px 6px 10px #999; 
                                                                -moz-box-shadow: 6px 6px 10px #999; 
                                                                box-shadow: 6px 6px 10px #999;"> 

		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand texto-branco" href="#" style="color: white;">TecMar - Solutions</a>
			</div>

			<div class="collapse navbar-collapse" id="navbar">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/') }}" style="color: white;">Contato</a></li>
					<li><a href="{{ url('/departamento/index') }}" style="color:white;">Departamentos</a></li>
					<li><a href="{{ url('/servico/graficoServMes') }}" style="color: white;">Grafico</a></li>

					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: white;">Serviços
							<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="{{ url('/servico/index') }}">Departamentos / Serviços</a></li>
							<li><a href="{{ url('/servico/showServicosAgendados') }}">Servicos Agendados</a></li>
							<li><a href="{{ url('/servico/showServicos') }}">Todos Serviços</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: white;">Relatórios
							<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="{{ url('/servico/pesquisaData') }}">Serviços por Data</a></li>
							<li class="divider"></li>
							<li><a href="{{ url('/departamento/relatorioTodosTelefones') }}">Todos Telefones</a></li>					
						</ul>
					</li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if(auth()->guest())
						@if(!Request::is('auth/login'))
							<li><a href="{{ url('/auth/login') }}">Login</a></li>
						@endif

					@else
						@if( auth()->user()->tipo == 'admin')
							<li><a href="{{ url('/auth/register') }}">Register</a></li>
						@endif
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ auth()->user()->name }} / {{ auth()->user()->tipo }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
	<div class="logoTecmar" style="margin-top: 70px;">
				
		<img src="{!! asset('images/logoTecmar.png') !!}" width="180px" style="margin-bottom: 30px;">
		<h1 style="float: right; margin-right: 300px; text-shadow: 0.1em 0.1em 0.15em #333; ">Sistema de Agenda Telefonica e Serviços</h1	>
	</div>

	<!-- Scripts -->
	<script
			src="https://code.jquery.com/jquery-2.2.4.min.js"
			integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
			crossorigin="anonymous">

	</script>
	<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script	src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
	<script	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script	src="http://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script type="text/javascript" src="{{ asset('/js/jquery.maskedinput.js')}}"></script>
	<script type="text/javascript" src="{{ asset('/js/bootstrap-select.js')}}"></script>

	
	

	@yield('content')

	@include('footer')


</body>
</html>
