<?php
/**
 * @author    Jefferson Costa
 * @copyright 2024 GAIA AG, Hamburg
 * @package   cnpj-extractor-api
 *
 * Created using PhpStorm at 10.01.24 21:54
 */

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CnaeResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'code' => $this->code,
            'name' => $this->name
        ];
    }
}
