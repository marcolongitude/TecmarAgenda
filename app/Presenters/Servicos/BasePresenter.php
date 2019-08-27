<?php

namespace App\Presenters\Servicos;


use Laracasts\Presenter\Presenter;

abstract class BasePresenter extends Presenter
{
    // Formata a data para padrão brasileiro
    public function createdAt()
    {
        return $this->created_at->format('d/m/Y - H:m').' hs';
    }
}