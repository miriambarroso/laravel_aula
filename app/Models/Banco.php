<?php

namespace App\Models;

use App\Observers\AccountObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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

    public function relAgencias(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\Agencia', 'banco_id');
    }
}
