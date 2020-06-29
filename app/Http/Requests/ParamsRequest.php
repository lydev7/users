<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParamsRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $r = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,id,' . $this->user()->id],
        ];
        if($this->passwords){
            $r['password'] = ['required', 'string', 'min:8', 'confirmed'];
        }
        return $r;
    }
}
