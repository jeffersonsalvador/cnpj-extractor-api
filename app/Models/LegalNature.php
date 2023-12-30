<?php
/**
 * @author    Jefferson Costa
 * @copyright 2023, Hamburg
 * @package   cnpj-extractor-api
 *
 * Created using PhpStorm at 30.12.23 07:48
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class LegalNature represents a single legal nature
 */
class LegalNature extends Model
{
    /**
     * @return BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'code', 'legal_nature');
    }
}
