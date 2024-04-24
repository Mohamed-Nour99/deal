<?php

namespace Src\Domain\Deal\Http\Requests\DealPercentage;

use Src\Infrastructure\Http\AbstractRequests\BaseRequest as FormRequest;

class DealPercentageStoreFormRequest extends FormRequest
{
    /**
     * Determine if the DealPercentage is authorized to make this request.
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
            'deal_percentage'        => ['required', 'numeric'],
            'deal_id'                => ['required', 'numeric'],
            'agent_id'               => ['required', 'numeric'],
            'type'                   => ['required', 'in:agent,teamleader,manager'],

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
