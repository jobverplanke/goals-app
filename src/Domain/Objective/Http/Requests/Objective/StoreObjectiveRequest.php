<?php

declare(strict_types=1);

namespace Domain\Objective\Http\Requests\Objective;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

/**
 * Class StoreObjectiveRequest
 *
 * @author Job Verplanke <job.verplanke@gmail.com>
 */
class StoreObjectiveRequest extends FormRequest
{
    public function authorize()
    {
        return true;
        // return $this->user()->can('store');
    }

    public function rules()
    {
        return [
            'name' => ['required'],
            'description' => ['nullable', 'string'],
            'vision' => ['nullable', 'string'],
            'ambition' => ['nullable', 'string'],
            'term' => ['nullable', 'string'],
        ];
    }

    public function validated()
    {
        return array_merge([
            'uuid' => Str::uuid(),
            'user_id' => 1, // (int) $this->user()->getAuthIdentifier()
        ], parent::validated());
    }

    public function messages()
    {
        return [
            'name.required' => ':attribute is required.'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Objective'
        ];
    }
}
