<?php

namespace App\Presenters\Telefones;

use Laracasts\Presenter\Presenter;

class BasePresenter extends Presenter
{
    public function tipoDepDefinido()
    {
        $tipoDep = 'Interno';

        if ($this->Externo == 0)
        {
            $tipoDep = 'Externo';
        }

        return $tipoDep;

    }
}