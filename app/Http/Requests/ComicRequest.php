<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComicRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'title' => 'required|min:3|max:150',
            'description' => 'min:3',
            'price' => 'required',
            'series' => 'required',
            'sale_date' => 'max:255',
            'type' => 'max:255',
            'artists' => 'required|max:255',
            'writers' => 'required|max:255',
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Il titolo è un campo obbligatorio!',
            'title.min' => 'Il titolo deve contenere almeno:min caratteri',
            'title.max' => 'Il titolo può avere un massimo di :max caratteri!',
            'description.min' => 'La descrizione deve avere almeno :min caratteri!',
            'price.required' => 'Il prezzo è un campo obbligatorio!',
            'series.required' => 'La serie è un campo obbligatorio!',
            'sale_date.max' => 'La data di uscita può avere un massimo di :max caratteri!',
            'type.max' => 'La data di uscita può avere un massimo di :max caratteri!',
            'artists.required' => 'Gli artisti è un campo obbligatorio!',
            'artists.max' => 'Gli artisti può avere un massimo di :max caratteri!',
            'writers.required' => 'Gli scrittori è un campo obbligatorio!',
            'writers.max' => 'Gli scrittori può avere un massimo di :max caratteri!',


        ];
    }
}
