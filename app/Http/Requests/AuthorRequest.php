<?php

namespace App\Http\Requests;

use App\Helpers\BaseHelper;
use App\Models\Author;
use App\Models\Country;
use DateTime;
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
            'date_of_birth' => [
                'required',
                function($attribute, $value, $fail){
                    if($value === null){
                        return;
                    }
                    if( BaseHelper::validateDate($value) == false){
                        return $fail('Ngày sinh không hợp lệ');
                    }
                    $value = DateTime::createFromFormat('d/m/Y', $value);
                    if($value->format('Y') > date('Y') - 12){
                        return $fail('Ngày sinh không hợp lệ 2');
                    }
                }
            ],
            'country' => [
                function($attribute, $value, $fail){
                    if($value === null){
                         return;
                    }
                    $country = Country::where('name', 'like', $value)->first();
                    if(!$country){
                        return $fail('Quốc gia không tồn tại');
                    }
                }
            ],
            'story' => [

            ],
            'image' => [
                
            ]
        ];
    }
}
