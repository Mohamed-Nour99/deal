<?php

namespace Src\Domain\Deal\Http\Requests\DealPercentage;
use Src\Domain\Deal\Http\Requests\DealPercentage\DealPercentageStoreFormRequest;

class DealPercentageUpdateFormRequest extends DealPercentageStoreFormRequest
{
    /**
     * Determine if the dealpercentage is authorized to make this request.
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
        // 'email'    => ['required','unique:dealpercentages,name,'.$this->route()->parameter('dealpercentage').',id'],
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
