<?php

namespace Src\Domain\Deal\Http\Requests\Deal;
use Src\Domain\Deal\Http\Requests\Deal\DealStoreFormRequest;

class DealUpdateFormRequest extends DealStoreFormRequest
{
    /**
     * Determine if the deal is authorized to make this request.
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
        // 'email'    => ['required','unique:deals,name,'.$this->route()->parameter('deal').',id'],
        ];

        return array_merge(parent::rules(), $rules);
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return parent::attributes();
    }
}
