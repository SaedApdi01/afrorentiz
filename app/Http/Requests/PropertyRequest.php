<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Basic Info
            'title' => 'required|string|min:5|max:255',
            'description' => 'required|string|min:10|max:90000',
            'price' => 'required|min:1',
            'property_type' => 'required|in:Villa,Apartment,Condo,House,Studio,Office',
            'listing_type' => 'required|in:sale,rent',

            // Location
            'country' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'address' => 'required|string|max:255',

            // Property Details
            'bedrooms' => 'nullable',
            'bathrooms' => 'nullable',
            'parking_spaces' => 'nullable',

            // Features (optional)
            'wifi' => 'nullable|boolean',
            'elevator' => 'nullable|boolean',
            'garden' => 'nullable|boolean',
            'pool' => 'nullable|boolean',

            // Images
            'image_1' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image_2' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image_3' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ];
    }
}
