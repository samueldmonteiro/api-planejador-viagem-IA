<?php

namespace App\Http\Requests;


class TravelAllPlanRequest extends ApiRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'arrival_date' => 'required|date|max:40',
            'departure_date' => 'required|date|max:40',
            'travel_location' => 'required|string|max:100'
        ];
    }
}
