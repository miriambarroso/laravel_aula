<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
     * Tabela associada com o model.
     *
     * @var string
     */
    protected $table = 'agencia_bancaria';

    /**
     * Medida de proteção do Laravel para cadastro de dados somente aos que possuem o nome neste Array.
     *  Tipo é o tipo do fone e tipo1 tipo do fone1
     */
    protected $fillable = ['agencia', 'nome_agencia', 'endereco', 'banco_id', 'fone', 'fone1', 'tipo', 'tipo1'];

    /**
     * O primary key associado com a tabela.
     *
     * @var string
     */
    protected $primaryKey = 'id';


    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $user = Auth::user();
            $model->created_by = $user->id ?? 0;
            $model->updated_by = $user->id ?? 0;
        });
        static::updating(function ($model) {
            $user = Auth::user();
            $model->updated_by = $user->id ?? 0;
        });
    }


    public function relBanco(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\Models\Banco', 'id', 'banco_id');
    }



    public static function  type(){
        return [
            '1' => 'Telefone',
            '2' => 'Telefone e Whatsapp',
            '3' => 'Whatsapp'
        ];
    }

}
