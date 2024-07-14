<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StoreTransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(Request $request): array
    {
        return [
            'title' => ['required', 'min:2','max:30'],
            'amount' => ['required', 'decimal:0,2', 'gte:0', 'lt:1000000000'],
            'date' => ['required', 'date', 'before_or_equal:today'],
            'primary_category' => [
                'required',
                Rule::exists('categories', 'title')->where(function ($query) use ($request) {

                    // Check if category is of correct type (expense|income)
                    $type = $request->input('type');
                    $query->where('type', $type);
                }),
            ],
            'secondary_category' => [
                'required',
                Rule::exists('categories', 'title')->where(function ($query) use ($request) {

                    // Check if category is of correct type (expense|income)
                    $type = $request->input('type');
                    $query->where('type', $type);
                }),
                'different:primary_category'
            ],
            'description' => ['required', 'min:2', 'max:30'],
        ];
    }
}
