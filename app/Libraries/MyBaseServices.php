<?php

namespace App\Libraries;
use CodeIgniter\Config\Factories;
use CodeIgniter\View\Table as HTMLTable;
class MyBaseServices
{
    /**
     * @var HTMLTable
     */
    protected HTMLTable $htmlTable;

    protected const TEXT_FOR_NO_DATA = '<div class="alert alert-info">nao ha unidades cadastradas.</div>';
    public function __construct()
    {


        $this->htmlTable = Factories::class(HTMLTable::class);
      $this->htmlTable->setTemplate( [
          'table_open' => '<table class="table-bordered" id="dataTable" width="100%" style="border-collapse: collapse;">',
      ]);

    }

}