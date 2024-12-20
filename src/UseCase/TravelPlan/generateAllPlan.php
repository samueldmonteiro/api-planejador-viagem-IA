<?php

namespace App\UseCase\TravelPlan;

class generateAllPlan
{
    public function __construct(
        private GenerateItinerary $generateItinerary,
        private FetchClimateData $fetchClimateData,
        private FetchSafetyInformation $fetchSafetyInformation
    ) {}

    public function execute(string $travelLocation, string $arrivalDate, string $departureDate): array
    {
        return [
            'itinerary' => $this->generateItinerary->execute($travelLocation, $arrivalDate, $departureDate),
            'climate_information' => $this->fetchClimateData->execute($travelLocation),
            'safety_information' => $this->fetchSafetyInformation->execute($travelLocation)
        ];
    }
}
