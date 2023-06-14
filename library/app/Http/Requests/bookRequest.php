<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class bookRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [

         
                "title" => "required|string",
                "pages" => "required|numeric",
                "author_id" => "required",
                "year"=>"required|numeric",
                "image"=>'mimes:png,jpg,jpeg',
               

            
            
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'obbligatorio',
            'title.string' => 'stringa',
            'title.max' => '255 caratteri',
            'author_id.required' => 'Autore deve essere obbligatorio',
            'author_id.string' => 'stringa',
            'year.required' => 'richiesto',

            'image.mimes' => 'Inserisci immagine nei formati corretti'
        ];
    }
}
