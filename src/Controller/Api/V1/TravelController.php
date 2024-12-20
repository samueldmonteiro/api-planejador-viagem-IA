<?php

namespace App\Controller\Api\V1;

use App\UseCase\TravelPlan\FetchClimateData;
use App\UseCase\TravelPlan\FetchSafetyInformation;
use App\UseCase\TravelPlan\generateAllPlan;
use App\UseCase\TravelPlan\GenerateItinerary;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class TravelController extends AbstractController
{
    public function __construct(
        private generateAllPlan $generateAllPlan,
        private FetchClimateData $fetchClimateData,
        private FetchSafetyInformation $fetchSafetyInformation,
        private GenerateItinerary $generateItinerary
    ) {}

    public function allPlan(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent());

        if (empty($data->travelLocation) || empty($data->arrivalDate) || empty($data->departureDate)) {
            return $this->json(
                [
                    'error' => 'Preencha todos os campos corretamente',
                    'campos obrigatórios' => ['travelLocation', 'arrivalDate', 'departureDate']
                ],
                400
            );
        }

        $result = $this->generateAllPlan->execute(
            $data->travelLocation,
            $data->arrivalDate,
            $data->departureDate
        );

        return $this->json($result);
    }

    public function safetyInformation(Request $request)
    {
        $data = json_decode($request->getContent());

        if (empty($data->travelLocation)) {
            return $this->json(
                [
                    'error' => 'Preencha todos os campos corretamente',
                    'campos obrigatórios' => ['travelLocation']
                ],
                400
            );
        }

        $result = $this->fetchSafetyInformation->execute($data->travelLocation);

        return $this->json($result);
    }

    public function itinerary(Request $request)
    {
        $data = json_decode($request->getContent());

        if (empty($data->travelLocation) || empty($data->arrivalDate) || empty($data->departureDate)) {
            return $this->json(
                [
                    'error' => 'Preencha todos os campos corretamente',
                    'campos obrigatórios' => ['travelLocation', 'arrivalDate', 'departureDate']
                ],
                400
            );
        }

        $result = $this->generateItinerary->execute(
            $data->travelLocation,
            $data->arrivalDate,
            $data->departureDate
        );

        return $this->json($result);
    }

    public function climateInformation(Request $request)
    {
        $data = json_decode($request->getContent());

        if (empty($data->travelLocation)) {
            return $this->json(
                [
                    'error' => 'Preencha todos os campos corretamente',
                    'campos obrigatórios' => ['travelLocation']
                ],
                400
            );
        }

        $result = $this->fetchClimateData->execute($data->travelLocation);

        return $this->json($result);
    }
}

//112