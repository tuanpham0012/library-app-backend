<?php

namespace App\Http\Requests;

use App\Models\Author;
use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'code' => [
                'required',
                'max:12',
                function($attribute, $value, $fail){
                    if($value === null){
                        return;
                    }
                    $code = Author::where('code', 'like', $value)->get('id')->first();
                    if($code){
                        return $fail('Mã tác giả đã tồn tại');
                    }
                }
            ],
            'name' => [
                'required',
                'max: 50'
            ],
            ''
        ];
    }
}
