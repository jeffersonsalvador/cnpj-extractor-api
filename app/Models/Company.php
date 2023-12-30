<?php
/**
 * @author    Jefferson Costa
 * @copyright 2023, Hamburg
 * @package   cnpj-extractor-api
 *
 * Created using PhpStorm at 29.12.23 11:46
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Company represents a single company
 */
class Company extends Model
{
    /**
     * @return BelongsTo
     */
    public function establishment(): BelongsTo
    {
        return $this->belongsTo(Establishment::class, 'basic_cnpj', 'basic_cnpj');
    }

    /**
     * @return HasOne
     */
    public function legalNature(): HasOne
    {
        return $this->hasOne(LegalNature::class, 'code', 'legal_nature');
    }
}
