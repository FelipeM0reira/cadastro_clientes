<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Representante extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cidade_id',
        // 'file_path', // Caso você queira permitir salvar o caminho do arquivo também
    ];

    public function cidade() {
        return $this->belongsTo(Cidade::class);
    }
}
