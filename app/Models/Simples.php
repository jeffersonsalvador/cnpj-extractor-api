<?php
/**
 * @author    Jefferson Costa
 * @copyright 2023 GAIA AG, Hamburg
 * @package   cnpj-extractor-api
 *
 * Created using PhpStorm at 30.12.23 07:59
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Simples extends Model
{
    protected $appends = ['is_simples', 'is_mei'];

    /**
     * @return bool
     */
    public function getIsSimplesAttribute(): bool
    {
        return $this->simple_option === 'S' ? 'Sim': 'Não';
    }

    /**
     * @return bool
     */
    public function getIsMeiAttribute(): bool
    {
        return $this->mei_option === 'S' ? 'Sim': 'Não';
    }
}
