<?php
/**
 * @author    Jefferson Costa
 * @copyright 2023, Hamburg
 * @package   cnpj-extractor-api
 *
 * Created using PhpStorm at 29.12.23 12:24
 */

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class EstablishmentResource
 *
 * @package App\Http\Resources
 */
class EstablishmentResource extends JsonResource
{
    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'cnpj' => $this->cnpj,
            'razao_social' => $this->company->corporate_name ?? null,
            'nome_fantasia' => $this->trade_name ?? null,
            'situação_cadastral' => $this->situacao_cadastral,
            'data_abertura' => Carbon::parse($this->activity_start_date)->format('d/m/Y'),
            'natureza_juridica' => $this->company->legalNature->name ?? null,
            'mei' => $this->simples->is_mei ?? null,
            'simples' => $this->simples->is_simples ?? null,
            'email' => $this->email ?? null,
            'telefone' => $this->telefone ?? null,
            'logradouro' => $this->street_type . ' ' . $this->address ?? null,
            'nunero' => $this->address_number ?? null,
            'complemento' => $this->additional_address_info ?? null,
            'bairro' => $this->neighborhood ?? null,
            'cep' => $this->zip_code ?? null,
            'cidade' => $this->city->name,
            'estado' => $this->state,
            'cnae_principal' => $this->cnae->name ?? null,
            'socios' => []
        ];
    }
}
