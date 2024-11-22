<?php

namespace App\Cells;


class ButtonsCell
{
    /**
     * renderiza um botao com formulario para ativar ou desativar um registro
     * @param array $params [
     * 'ruoute'=> 'units/action/1',
     * 'text_action' => 'Ativar ou desativar',
     * 'activated' => true ou false, 'btn_class' =>
     * 'btn btn-sm'  => 'btn-warning sua classe de botao sua']
     * @return string
     */
    public function action(array $params): string
    {
        $btnClass = 'btn btn-sm ';
        $btnClass .= $params['activated'] ? 'btn-warning' : 'btn-success';

        $form = form_open($params['route'], ['class' => 'd-inline'], hidden: ['_method' => 'PUT']);
        $form .= form_button([
            'class' => $params['btn_class'] ?? $btnClass,
            'type' => 'submit',
            'content' => $params['text_action'], /// o que sera exebido
        ]);
        $form .= form_close();
        return $form;
    }
}
