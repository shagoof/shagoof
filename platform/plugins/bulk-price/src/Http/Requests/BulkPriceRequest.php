<?php

declare(strict_types=1);

namespace Botble\BulkPrice\Http\Requests;

use Botble\Support\Http\Requests\Request;

class BulkPriceRequest extends Request
{
    public function rules(): array
    {
        return [
            'action' => ['required', 'in:increase,decrease'],
            'type' => ['required', 'in:percentage,fixed'],
            'amount' => ['required', 'numeric', 'gt:0'],
            'categories' => ['nullable', 'array'],
            'categories.*' => ['integer'],
            'brands' => ['nullable', 'array'],
            'brands.*' => ['integer'],
            'collections' => ['nullable', 'array'],
            'collections.*' => ['integer'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['integer'],
        ];
    }
}


