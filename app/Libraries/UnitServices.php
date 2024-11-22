<?php

namespace App\Libraries;

use App\Entities\Unit;
use App\Models\UnitModel;
use CodeIgniter\Config\Factories;
use CodeIgniter\View\Table as HTMLTable;

class UnitServices extends MyBaseServices
{
    public static array $serviceTime = [
        '10 minutes' => '10 minutos',
        '20 minutes' => '20 minutos',
        '1 hour' => '1 hora',
    ];


    public function renderUnit(): string
    {
        $unitModel = model(UnitModel::class);
        $units = $unitModel->orderBy('name', 'DESC')->findAll();
        if (empty($units)) {
            return self::TEXT_FOR_NO_DATA;

        }
        $this->htmlTable->setHeading('Açöes', 'Name', 'E-mail', 'Telefone', 'Inicio', 'Fim', 'Situação', 'criado');


        foreach ($units as $unit) {

            $this->htmlTable->addRow(
                [
                    $this->RenderBtnActions($unit),
                    $unit->name,
                    $unit->email,
                    $unit->phone,
                    $unit->starttime,
                    $unit->endtime,
                    $unit->status(),
                    $unit->created_at
                ]
            );


        }


        return $this->htmlTable->generate();

    }


    /**
     * @param string|null $serviceTime
     * @return string
     */
    /**
     * Render a dropdown for selecting service time intervals.
     *
     * @param string|null $serviceTime The currently selected service time
     * @return string HTML for the dropdown
     */
    public function renderTimeInterval(?string $serviceTime = null): string
    {
        $options = [''];
        $options[''] = '__Selecione__';


        foreach (self::$serviceTime as $key => $value) {
            $options[$key] = $value;
        }
        return form_dropdown('servicetime', $options, ['selected' => old('servicetime', $serviceTime)], ['class' => 'form-control']);
    }

    /**
     * renderza o dropdown de acoes
     * @param Unit $unit
     * @return string
     */
    public function RenderBtnActions(Unit $unit): string
    {

        $btnActions = '<div class="btn-group">';
        $btnActions .= '<button type="button" 
                        class="btn btn-outline-primary btn-sm dropdown-toggle" 
                        data-toggle="dropdown" 
                        aria-haspopup="true" 
                        aria-expanded="false">Ações
                        </button>';
        $btnActions .= '<div class="dropdown-menu">';
        $btnActions .= anchor(route_to('units.edit', $unit->id), 'Editar', ['class ' => 'dropdown-item']);
        $btnActions .= view_cell('ButtonsCell::action',
            [
                'route' => route_to('units.action', $unit->id),
                'text_action' => $unit->textToAction(),
                'activated' => $unit->isActivated(),
                'btn_class' => 'dropdown-item py-2',
            ]);
        $btnActions .= '<a  class="dropdown-item" href="#" >Acoes</a>';
        $btnActions .= '</div>';
        $btnActions .= '</div>';

        return $btnActions;

    }
}