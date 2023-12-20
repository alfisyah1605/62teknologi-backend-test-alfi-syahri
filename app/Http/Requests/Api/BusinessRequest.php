<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class BusinessRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->id ?? 'NULL';

        return [
            'alias' => 'required|string|max:50|unique:businesses,alias,' . $id . ',id,deleted_at,NULL',
            'name' => 'required|string|max:250',
            'image_url' => 'nullable|string|max:150',
            'is_closed' => 'nullable|boolean',
            'price' => 'nullable|string|max:5',
            'rating' => 'nullable|numeric|between:0,5',
            'location_address1' => 'nullable|string|max:200',
            'location_address2' => 'nullable|string|max:200',
            'location_address3' => 'nullable|string|max:200',
            'location_city' => 'nullable|string|max:100',
            'location_zip_code' => 'nullable|string|max:10',
            'location_country' => 'nullable|string|max:5',
            'location_state' => 'nullable|string|max:5',
            'phone' => 'nullable|string|max:20',
            'location_latitude' => 'nullable|numeric',
            'location_longitude' => 'nullable|numeric',
        ];
    }
}
