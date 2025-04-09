<?php

namespace App\Application\Controller\Api\V1;

use App\Domain\UseCase\Travel\FetchClimateData;
use App\Domain\UseCase\Travel\FetchSafetyInformation;
use App\Domain\UseCase\Travel\GenerateItinerary;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class TravelController extends AbstractController
{
    public function __construct(
        private FetchClimateData $fetchClimateData,
        private FetchSafetyInformation $fetchSafetyInformation,
        private GenerateItinerary $generateItinerary
    ) {}

    public function allPlan(Request $request): JsonResponse
    {
        $fields = ['travelLocation', 'arrivalDate', 'departureDate'];

        if (!$this->validateRequiredFields($request, $fields)) {
            return $this->json($this->messageRequiredFields($fields), 400);
        }

        $data = json_decode($request->getContent());

        return $this->json([
            'climate' => $this->fetchClimateData->execute($data->travelLocation, $data->arrivalDate),
            'safety' => $this->fetchSafetyInformation->execute($data->travelLocation),
            'itinerary' => $this->generateItinerary->execute(
                $data->travelLocation,
                $data->arrivalDate,
                $data->departureDate
            ),
        ]);
    }

    public function safetyInformation(Request $request)
    {
        $fields = ['travelLocation'];

        if (!$this->validateRequiredFields($request, $fields)) {
            return $this->json($this->messageRequiredFields($fields), 400);
        }

        $data = json_decode($request->getContent());

        return $this->json([
            'content' => $this->fetchSafetyInformation->execute($data->travelLocation)
        ]);
    }

    public function itinerary(Request $request)
    {
        $fields = ['travelLocation', 'arrivalDate', 'departureDate'];

        if (!$this->validateRequiredFields($request, $fields)) {
            return $this->json($this->messageRequiredFields($fields), 400);
        }

        $data = json_decode($request->getContent());

        return $this->json([
            'content' => $this->generateItinerary->execute(
                $data->travelLocation,
                $data->arrivalDate,
                $data->departureDate
            )
        ]);
    }

    public function climateInformation(Request $request)
    {
        $fields = ['travelLocation', 'arrivalDate'];

        if (!$this->validateRequiredFields($request, $fields)) {
            return $this->json($this->messageRequiredFields($fields), 400);
        }

        $data = json_decode($request->getContent());

        return $this->json([
            'content' => $this->fetchClimateData->execute($data->travelLocation, $data->arrivalDate)
        ]);
    }

    private function validateRequiredFields(Request $request, array $fields): bool
    {
        $data = json_decode($request->getContent(), true);

        foreach ($fields as $field) {
            if (empty($data[$field])) {
                return false;
            }
        }
        return true;
    }

    private function messageRequiredFields(array $fields): array
    {
        return [
            'error' => 'Preencha todos os campos corretamente',
            'campos obrigatórios' => $fields
        ];
    }
}
#104
