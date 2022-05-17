<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agencia extends Model
{
    use HasFactory;

    /**
     * Timestamp de quando foi criado e atualizado.
     *
     * @var string
     */
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * Usuário que criou e atualizou a informação.
     *
     * @var string
     **/
    const CREATED_BY = 'created_by';
    const UPDATED_BY = 'updated_by';

    /**
     * Tabela associada com o model.
     *
     * @var string
     */
    protected $table = 'agencia_bancaria';

    /**
     * O primary key associado com a tabela.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The storage format ofthe model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'd-m-Y';


    public function relBanco(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasOne('App\Models\Banco', 'id', 'banco_id');
    }

}
