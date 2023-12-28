<?php
/**
 * @author    Jefferson Costa
 * @copyright 2023, Hamburg
 * @package   cnpj-extractor-api
 *
 * Created using PhpStorm at 27.12.23 14:54
 */

namespace App\Http\Controllers;

use App\Models\Establishment;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class EstablishmentController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $page = $request->input('page', 1);
        $perPage = 15;

        $dados = Cache::remember("establishments:{$page}", 60, function () use ($page, $perPage) {
            return Establishment::paginate($perPage, ['*'], 'page', $page);
        });

        return response()->json($dados);
    }
}
