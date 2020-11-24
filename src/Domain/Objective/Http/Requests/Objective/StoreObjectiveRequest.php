<?php

declare(strict_types=1);

namespace Domain\Objective\Http\Requests\Objective;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

/**
 * Class StoreObjectiveRequest
 * @author Job Verplanke <job.verplanke@gmail.com>
 */
class StoreObjectiveRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('objective:create');
    }

    public function rules(): array
    {
        return [
            'name' => ['required'],
            'description' => ['nullable', 'string'],
            'vision' => ['nullable', 'string'],
            'ambition' => ['nullable', 'string'],
            'term' => ['nullable', 'string'],
        ];
    }

    public function validated(): array
    {
        return array_merge([
            'uuid' => Str::uuid(),
            'user_id' => (int) $this->user()->getAuthIdentifier()
        ], parent::validated());
    }

    public function messages(): array
    {
        return [
            'name.required' => ':attribute is required.'
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Objective'
        ];
    }
}
