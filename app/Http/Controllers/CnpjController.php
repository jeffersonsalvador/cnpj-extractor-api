<?php
/**
 * @author    Jefferson Costa
 * @copyright 2024, Malaga
 * @package   cnpj-extractor-api
 *
 * Created using PhpStorm at 07.02.24 20:43
 */

namespace App\Http\Controllers;

use App\Http\Resources\CnpjResource;
use App\Models\Cnpj;
use Illuminate\Http\JsonResponse;

class CnpjController extends Controller
{
    public function show($cnpj): JsonResponse
    {
        $basic = substr($cnpj, 0, 8);
        $order = substr($cnpj, 8, 4);
        $dv = substr($cnpj, 12, 2);
        $data = Cnpj::query()
            ->where('basic_cnpj', $basic)
            ->where('cnpj_order', $order)
            ->where('cnpj_dv', $dv)
            ->first();

        return CnpjResource::collection($data)->response();
    }
}
