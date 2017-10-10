<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;
use App\Transformers\DataTransformer;

class DataController extends Controller
{
    public function index(Request $request)
    {
        $query = Data::query();
        if ($request->input('key')) {
            $query->whereKey($request->input('key'));
        }
        $perPage = $request->input('per_page', 10);
        $data = $query->paginate($perPage);
        return fractal($data, new DataTransformer)->respond(200);
    }
    
    public function show(Request $request, Data $datum)
    {
        return fractal($datum, new DataTransformer)->respond(200);
    }
    
    public function store(Request $request)
    {
        $data = new Data;
        $data->key = $request->input('key');
        $data->content = $request->input('content');
        $data->expires_at = $request->input('expires_at');
        $data->save();
        if ($request->input('external')) {
            $size = $request->input('size', 1);
            $concurrency = $request->input('concurrency', 1);
            $data->storeExternally($size, $concurrency);
        }
        return fractal($data, new DataTransformer)->respond(201);
    }
    
    public function update(Request $request, Data $datum)
    {
        $datum->key = $request->input('key', $datum->key);
        $datum->content = $request->input('content', $datum->content);
        $datum->expires_at = $request->input('expires_at', $datum->expires_at);
        $datum->save();
        return fractal($datum, new DataTransformer)->respond(202);
    }
    
    public function destroy(Request $request, Data $datum)
    {
        $datum->delete();
        return fractal($datum, new DataTransformer)->respond(202);
    }
}
