<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TravelAllPlanRequest;
use App\Services\TravelPlanService;
use Illuminate\Http\JsonResponse;

class TravelPlanController extends Controller
{
    public function __construct(private TravelPlanService $travelPlanService) {}


    public function allPlan(TravelAllPlanRequest $request): JsonResponse
    {
        $response = $this->travelPlanService->generateAllTravelPlan(
            $request->travel_location,
            $request->arrival_date,
            $request->departure_date
        );

        return json($response, 'Seu plano de viagem completo!');
    }
}
