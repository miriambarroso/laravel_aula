<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banco extends Model
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
    protected $table = 'banco';

    /**
    * Medida de proteção do Laravel para cadastro de dados somente aos que possuem o nome neste Array.
    */
    protected $fillable = ['nome', 'numero', 'ispb'];

    /**
     * O primary key associado com a tabela.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    public function relAgencias(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\Agencia', 'banco_id');
    }
}
