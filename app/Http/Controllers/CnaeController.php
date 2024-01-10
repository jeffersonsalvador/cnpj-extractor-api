<?php
/**
 * @author    Jefferson Costa
 * @copyright 2024 GAIA AG, Hamburg
 * @package   cnpj-extractor-api
 *
 * Created using PhpStorm at 10.01.24 21:51
 */

namespace App\Http\Controllers;

use App\Http\Resources\CnaeResource;
use App\Models\Cnae;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class CnaeController extends Controller
{
    public function index(): JsonResponse
    {
        $perPage = request()->input('per_page', 1000);
        $page = request()->input('page', 1);

        $query = Cnae::query();
        $cacheName = "cnaes:$page|{$perPage}";

        $data = Cache::remember($cacheName, Carbon::now()->addMonth(), function () use ($page, $perPage, $query) {
            return $query->paginate($perPage, ['*'], 'page', $page);
        });

        return CnaeResource::collection($data)->response();
    }
}
