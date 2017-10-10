<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Data;

class DataTransformer extends TransformerAbstract
{
    public function transform(Data $data)
    {
        return [
            'id' => $data->id,
            'key' => $data->key,
            'content' => $data->content,
            'external' => $data->external,
            'expires_at' => ($data->expires_at ? $data->expires_at->toIso8601String() : null),
            'created_at' => $data->created_at->toIso8601String(),
            'updated_at' => $data->updated_at->toIso8601String(),
            'selfUri' => route('data.show', $data->id)
        ];
    }
}
