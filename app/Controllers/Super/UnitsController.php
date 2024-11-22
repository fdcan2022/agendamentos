<?php

namespace App\Controllers\Super;

use App\Controllers\BaseController;
use App\Entities\Unit;
use App\Libraries\UnitServices;
use App\Models\UnitModel;
use CodeIgniter\Config\Factories;
use CodeIgniter\HTTP\ResponseInterface;
use Kint\Renderer\RendererInterface;

/**
 *
 */
class UnitsController extends BaseController
{
    /**
     * @var UnitServices
     */

    /**
     * @var UnitModel
     */
    private UnitModel $unitModel;
    private UnitServices $unitsService;

    public function __construct()
    {
        $this->unitsService = Factories::class(UnitServices::class);
        $this->unitModel = model(UnitModel::class);
    }

    /**
     * @return RendererInterface
     */

    public function index()
    {

        $data = [
            'title' => 'Units',
            'units' => $this->unitsService->renderUnit()
        ];


        return view('back/units/index', $data);
    }


    public function new()
    {

        $data = [
            'title' => 'Criar Udidadess',
            'unit' => new Unit(),
            'timesInterval' => $this->unitsService->renderTimeInterval()

        ];


        return view('back/units/new', $data);
    }

    public function create()
    {
        $this->checkMetod('post');

        $unit = new Unit($this->clearRequest());

        if (!$this->unitModel->insert($unit)) {
            return redirect()->back()
                ->withInput()
                ->with('danger', 'verifique os erros e tente novamente')
                ->with('errorsValidation', $this->unitModel->errors());

        }

        return redirect()->route('units')
            ->with('success', 'Dados atualizados com sucesso');

    }


    /**
     * @param integer $id
     * @return string
     */

    public function edit(int $id)
    {
        $data = [
            'title' => 'Edite',
            'unit' => $unit = $this->unitModel->findOrFail($id),
            'timesInterval' => $this->unitsService->renderTimeInterval($unit->servicetime)
        ];


        return view('back/units/edit', $data);
    }


    /**
     * @param int $id
     * procesar a rativacao ou desativacao de um registro no banco de dados
     * @return \CodeIgniter\HTTP\RedirectResponse
     * @throws \ReflectionException
     */


    public function action(int $id)
    {
        $this->checkMetod('put');
        $unit = $this->unitModel->find($id);
        $unit->setAction();
        $this->unitModel->save($unit);

        return redirect()->route('units')->with('success', 'Dados atualizados com sucesso');
    }

    /**
     * @param int $id
     * procesar a requisicao de atualizacao de um registro no banco de dados
     * @return \CodeIgniter\HTTP\RedirectResponse
     * @throws \ReflectionException
     */

    public function update(int $id)
    {
        $this->checkMetod('put');
        $unit = $this->unitModel->findOrFail($id);
        $unit->fill($this->clearRequest());

        if (!$unit->hasChanged()) {

            return redirect()->back()->with('info', 'Nao ha dados para atualiza');
        }

        $success = $this->unitModel->save($unit);

        if (!$success) {
            return redirect()->back()
                ->withInput()
                ->with('danger', 'verifique os erros e tente novamente')
                ->with('errorsValidation', $this->unitModel->errors());


        }

        return redirect()->route('units')
            ->with('success', 'Dados atualizados com sucesso');

    }



}
