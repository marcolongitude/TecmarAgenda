<?php

namespace App\Models\Servicos;

use App\Models\Telefones\Departamento;
use App\Presenters\Servicos\ServicoPresenter;
use Illuminate\Database\Eloquent\Model;

use Laracasts\Presenter\PresentableTrait;

class Servico extends Model
{
    protected $fillable = [
        'id',
        'descricao',
        'tipoServico',
        'departamento_id',
        'dataServico',
        'horaInicioServico',
        'horaFimServico'
    ];

    use PresentableTrait;

    protected $presenter = ServicoPresenter::class;

    public function departamentos()
    {
        return $this->belongsTo(Departamento::class);
    }
}
