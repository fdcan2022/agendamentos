<?php

namespace App\Models;

use App\Entities\Unit;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Model;

class UnitModel extends Model
{
    protected $table            = 'units';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = Unit::class;//vai ser escluido o registro da tabela
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name' ,
        'email',
        'phone',
        'coordinator',
        'address',
        'service',
        'starttime',
        'endtime',
        'servicetime',
        'active',

    ];

    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [
        'id'       => 'permit_empty|is_natural_no_zero',
        'name'     => 'required|max_length[69]|is_unique[units.name,id,{id}]',
        'email'    => 'required|max_length[99]|valid_email|is_unique[units.email,id,{id}]',
        'phone'    => 'required|is_unique[units.phone,id,{id}]',
        'coordinator' => 'required|max_length[69]',
        'address'  => 'required|max_length[69]',
        'starttime' => 'required',
        'endtime'  => 'required',
        'servicetime' => 'required',
        'active'   => 'is_natural_no_zero',
    ];
    protected $validationMessages   = [
        'name' => [
            'required' => 'O nome da unidade é obrigatorio',
            'max_length' => 'O nome da unidade nao pode ter mais de {param} caracteres',
            'is_unique' => 'O nome da unidade ja existe',
        ],
        'email' => [
            'required' => 'O email da unidade é obrigatorio',
            'max_length' => 'O email da unidade nao pode ter mais de {param} caracteres',
            'valid_email' => 'O email da unidade nao eh valido',
            'is_unique' => 'O email da unidade ja existe',
        ],
        'phone' => [
            'required' => 'O telefone da unidade é obrigatorio',
            'exact_length' => 'O telefone da unidade nao pode ter mais de {param} caracteres',
            'is_unique' => 'O telefone da unidade ja existe',
        ],
        'coordinator' => [
            'required' => 'O coordenador da unidade é obrigatorio',
            'max_length' => 'O coordenador da unidade nao pode ter mais de {param} caracteres',
        ],
        'address' => [
            'required' => 'O endereco da unidade é obrigatorio',
            'max_length' => 'O endereco da unidade nao pode ter mais de {param} caracteres',
        ],
        'servicetime' => [
            'required' => 'O servico da unidade é obrigatorio',
        ]
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function findOrFail(int|string $id): object
    {
        $row = $this->find($id);
        return $row ?? throw new PageNotFoundException("registro $id não encontrada");
    }


}
