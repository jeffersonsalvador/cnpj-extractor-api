<?php
/**
 * @author    Jefferson Costa
 * @copyright 2023, Hamburg
 * @package   cnpj-extractor-api
 *
 * Created using PhpStorm at 27.12.23 14:53
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Establishment represents a single establishment
 */
class Establishment extends Model
{
    protected $appends = ['cnpj', 'situacao_cadastral'];

    /**
     * @return string
     */
    public function getCnpjAttribute(): string
    {
        return $this->basic_cnpj . $this->cnpj_order . $this->cnpj_dv;
    }

    /**
     * @return string
     */
    public function getSituacaoCadastralAttribute(): string
    {
        return match ($this->registration_status) {
            1 => 'NULA',
            2 => 'ATIVA',
            3 => 'SUSPENSA',
            4 => 'INAPTA',
            8 => 'BAIXADA',
            default => 'NÃO INFORMADA',
        };
    }

    /**
     * @return string|null
     */
    public function getTelefoneAttribute(): ?string
    {
        return $this->phone_area_code_1 ? $this->phone_area_code_1 . ' ' .$this->phone_number_1 : null;
    }

    /**
     * @return HasOne
     */
    public function company(): hasOne
    {
        return $this->hasOne(Company::class, 'basic_cnpj', 'basic_cnpj');
    }

    /**
     * @return HasOne
     */
    public function city(): hasOne
    {
        return $this->hasOne(City::class, 'code', 'city_code');
    }

    public function simples(): hasOne
    {
        return $this->hasOne(Simples::class, 'basic_cnpj', 'basic_cnpj');
    }

    public function cnae(): hasOne
    {
        return $this->hasOne(Cnae::class, 'code', 'main_cnae');
    }
}
