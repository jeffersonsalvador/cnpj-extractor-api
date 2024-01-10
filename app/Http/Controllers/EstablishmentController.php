<?php
/**
 * @author    Jefferson Costa
 * @copyright 2023, Hamburg
 * @package   cnpj-extractor-api
 *
 * Created using PhpStorm at 27.12.23 14:54
 */

namespace App\Http\Controllers;

use App\Http\Resources\EstablishmentResource;
use App\Models\Establishment;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class EstablishmentController extends Controller
{
    public function index(): JsonResponse
    {
        $perPage = request()->input('per_page', 1000);
        $page = request()->input('page', 1);
        $cnaes = request()->input('cnaes', []);

        $query = Establishment::query()
            ->join('companies', 'establishments.basic_cnpj', '=', 'companies.basic_cnpj')
            ->with(['company', 'simples', 'city']);

        if (!empty($cnaes)) {
            $query->whereIn('main_cnae', $cnaes);
        }

        $query->orderBy('corporate_name', 'ASC');
        $cacheName = "establishments:$page|{$perPage}".implode('|', $cnaes);

        $data = Cache::remember($cacheName, Carbon::now()->addMonth(), function () use ($page, $perPage, $query) {
            return $query->paginate($perPage, ['*'], 'page', $page);
        });

        return EstablishmentResource::collection($data)->response();
    }
}
