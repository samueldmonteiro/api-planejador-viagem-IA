<?php

namespace App\Enums;

enum TravelPlanPrompts: string
{
    case ITINERARY_PROMPT = "Estou viajando para %s, para ficar durante os dias %s, até %s. Por favor me sugira um roteiro de viagem para cada dia. No final me apresente quanto gastarei na totalidade dos dias";

    case CLIMATE_PROMPT = "Estou viajando para %s, como é o clima lá nessa época do ano?";

    case SAFETY_PROMPT = "Estou viajando para %s. Como é a violência neste lugar, lugares para não ir ou ter cuidado.";
}
