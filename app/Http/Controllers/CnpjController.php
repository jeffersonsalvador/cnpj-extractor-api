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
        $query = Cnpj::query()->where('çnpj', $cnpj);
        $cacheName = "";

        return CnpjResource::collection();
    }
}
