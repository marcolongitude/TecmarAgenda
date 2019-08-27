@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-primary">
				<div class="panel-heading" style="color:white">Registro de Usuários do Sistema</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> CAMPOS OBRIGATÓRIOS NÃO PREENCHIDOS.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						{!! csrf_field() !!}

						<div class="form-group">
							<label class="col-md-4 control-label">Nome do Usuário: </label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Endereço de E-Mail: </label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Senha: </label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirma a Senha: </label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Tipo: </label>
							<div class="col-md-6">
								{!! Form::select('tipo', ['admin' => 'Admin', 'comum' => 'Comum']) !!}
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Salvar Usuário
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-info text-center" style="color:white">Lista de Usuários - Prefeitura de Morrinhos - GO</h2>
			</div>
			<div class="panel-body">
				<div class="table-responsive text-center">
					<table class="table table-borderless" id="table-users">
						<thead>
						<tr>
							<th class="text-center">Código</th>
							<th class="text-center">Usuário</th>
							<th class="text-center">E-mail</th>
							<th class="text-center">Tipo</th>
							<th class="text-center">Criado em</th>

							<th class="text-center">Ações</th>
						</tr>
						</thead>
						@foreach($users as $item)
							<tr class="item">
								<td>{{$item->id}}</td>
								<td>{{$item->name}}</td>
								<td>{{$item->email}}</td>
								<td>
									@if($item->tipo == 'admin')
										Administrador
									@endif
									@if($item->tipo == 'comum')
										Comum
									@endif
								</td>
								<td>{{$item->created_at}}</td>

								<td>
									<button class="btn btn-primary btn-sm classEdit" type="button" value="{{$item->id}}" name="Edit" data-toggle="modal" data-target="#Edit">
										Editar
									</button>
								<!--<a href="{{ url('/departamento/show') }}/{{$item->id}}"
                                       class="btn btn-info btn-sm classDetails" data-toggle="modal" data-target="#Details">Detalhes
                                    </a>-->
									<button class="btn btn-warning btn-sm classDetails" type="button" value="{{$item->id}}" name="Details" data-toggle="modal" data-target="#Details">
										Detalhes
									</button>
									<a href="{{ url('#') }}/{{$item->id}}" class="btn btn-danger btn-sm Delete">Excluir</a>
								</td>
							</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

	<script>
		$("#table-users").DataTable();
	</script>

@endsection
