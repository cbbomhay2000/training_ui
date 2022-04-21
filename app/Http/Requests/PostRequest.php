<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name_post' => [
                'required',
            ],
            'title_post' => [
                'required',
            ],
            'desc' =>[
                'required',
            ],

        ];
    }
}
