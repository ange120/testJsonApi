<?php

namespace App\Http\Controllers;

use App\Entities\FirstTable;
use App\Entities\SecondTable;
use App\Jobs\SaveTable;
use App\Models\Info;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function info(): JsonResponse
    {
        $info = Info::all();
        return response()->json($info);
    }

    /**
     * @return JsonResponse
     */
    public function updateDB(): JsonResponse
    {
        SaveTable::dispatch(new FirstTable(), new SecondTable())->onQueue('tableInfo');
        Log::info('Start update data');
        return $this->info();
    }

}
