<?php

namespace App\Services;

use App\Enums\TravelPlanPrompts;

class TravelPlanService
{
    public function __construct(private GeminiApiService $geminiApiService) {}

    public function generateAllTravelPlan(string $travelLocation, string $arrivalDate, string $departureDate): array
    {
        return [
            'itinerary' => $this->generateItinerary($travelLocation, $arrivalDate, $departureDate),
            'climate' => $this->fetchClimateData($travelLocation),
            'safety' => $this->fetchSafetyInformation($travelLocation),
        ];
    }

    public function generateItinerary(string $travelLocation, string $arrivalDate, string $departureDate): array
    {
        $prompt = sprintf(TravelPlanPrompts::ITINERARY_PROMPT->value, $travelLocation, $arrivalDate, $departureDate);
        return $this->request($prompt);
    }

    public function fetchClimateData(string $travelLocation)
    {
        $prompt = sprintf(TravelPlanPrompts::CLIMATE_PROMPT->value, $travelLocation);
        return $this->request($prompt);
    }

    public function fetchSafetyInformation(string $travelLocation): array
    {
        $prompt = sprintf(TravelPlanPrompts::SAFETY_PROMPT->value, $travelLocation);
        return $this->request($prompt);
    }

    private function request(string $prompt): array
    {
        return $this->geminiApiService->request($prompt)->candidates;
    }
}
