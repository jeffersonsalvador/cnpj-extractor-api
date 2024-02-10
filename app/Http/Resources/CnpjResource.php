<?php
/**
 * @author    Jefferson Costa
 * @copyright 2024, Malaga
 * @package   cnpj-extractor-api
 *
 * Created using PhpStorm at 07.02.24 20:35
 */

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class CnpjResource
 *
 * @package App\Http\Resources
 */
class CnpjResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
//            'cnpj' => $this->basic_cnpj . $this->cnpj_order . $this->cnpj_dv,
            'razao_social' => $this->company->corporate_name ?? null,
//            'nome_fantasia' => $this->trade_name ?? null,
//            'situacao_cadastral' => $this->situacao_cadastral,
//            'data_abertura' => Carbon::parse($this->activity_start_date)->format('d/m/Y'),
//            'natureza_juridica' => $this->company->legalNature->name ?? null,
//            'mei' => $this->simples->is_mei ?? null,
//            'simples' => $this->simples->is_simples ?? null,
//            'email' => $this->email ?? null,
//            'telefone' => $this->telefone ?? null,
//            'logradouro' => $this->street_type . ' ' . $this->address ?? null,
//            'nunero' => $this->address_number ?? null,
//            'complemento' => $this->additional_address_info ?? null,
//            'bairro' => $this->neighborhood ?? null,
//            'cep' => $this->zip_code ?? null,
//            'cidade' => $this->city->name,
//            'estado' => $this->state,
//            'cnae_principal' => $this->cnae->name ?? null,
//            'socios' => []
        ];
    }
}
