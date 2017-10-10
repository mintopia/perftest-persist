<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

/**
 * App\Data
 *
 * @mixin \Eloquent
 * @property int $id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string $key
 * @property string|null $content
 * @property string|null $expires_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data whereUpdatedAt($value)
 */
class Data extends Model
{
    public $dates = [
        'expires_at'
    ];
    
    public $external;
    
    public function storeExternally($size = 1, $concurrency = 1)
    {
        $client = new Client([
            'verify' => false
        ]);
        
        $response = $client->post(env('PERFTEST_ROUTER'), [
            'form_params' => [
                'size' => $size,
                'concurrency' => $concurrency
            ]
        ]);
        $this->external = json_decode($response->getBody()->getContents());
    }
}
