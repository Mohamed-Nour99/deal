<?php

namespace Src\Domain\Deal\Http\Requests\Deal;

use Src\Infrastructure\Http\AbstractRequests\BaseRequest as FormRequest;

class DealStoreFormRequest extends FormRequest
{
    /**
     * Determine if the Deal is authorized to make this request.
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
        $rules = [
            'deal'        => ['required', 'string', 'max:255'],
            'code'        => ['required', 'numeric'],
        ];
        return $rules;
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name'        =>  __('main.name'),
        ];
    }
}
