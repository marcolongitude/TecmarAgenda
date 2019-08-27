<?php

namespace App\Models\Telefones;

use App\Models\Servicos\Servico;
use App\Presenters\Telefones\BasePresenter;
use Illuminate\Database\Eloquent\Model;

use Laracasts\Presenter\PresentableTrait;

class Departamento extends Model
{
    protected $fillable = [
        'id',
        'NomeDeparmento',
        'Secretaria',
        'Telefone',
        'Externo'
    ];

    use PresentableTrait;

    protected $presenter = BasePresenter::class;

    public function servicos()
    {
        return $this->hasMany(Servico::class, 'departamento_id');
    }
}
