<?php

namespace App\Presenters\Servicos;


class ServicoPresenter extends BasePresenter {

    // Limita a quantidade do texto da descrição para 100 caracteres
    public function descricaoCurta($quantidade = 100)
    {
        if (strlen($this->descricao) > 100)
        {
            return substr($this->descricao, 0, $quantidade).' ...';
        }
        return $this->descricao;
    }

    // Determina qual o tipo do serviço
    public function tipoServicoDefinido()
    {
        $tipoServ = 'Realizado';

        if ($this->tipoServico == 1)
        {
            $tipoServ = 'Agendado';
        }

        return $tipoServ;

    }

}