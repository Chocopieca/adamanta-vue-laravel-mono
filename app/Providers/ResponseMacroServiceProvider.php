<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Exceptions\HttpResponseException;

class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('success', function ($data) {
            return Response::json(
                $data,
                200,
                ['Content-Type' => 'application/json; charset=UTF-8'],
                JSON_UNESCAPED_UNICODE
            );
        });

        $that = $this;
        Response::macro('error', function ($data, $status = 400) use ($that) {
            if (is_string($data)) {
                $data = $that->getError($data);

            } else {
                $data = $that->getErrors($data);
            }
            throw new HttpResponseException(Response::json(
                ['errors' => $data],
                $status,
                ['Content-Type' => 'application/json; charset=UTF-8'],
                JSON_UNESCAPED_UNICODE
            ));
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function getError($data)
    {
        $data = ['errors' => [$data => [trans($data)]]];

        return $this->callErrors($data);
    }

    public function getErrors($data)
    {
        return $this->callErrors($data);
    }

    protected function callErrors($data)
    {
        $def = config()->get('api.type');

        $type = request()->header('ApiType');
        $type = $type ? $type : $def;

        return $this->{method_exists($this, $type) ? $type : $def}($data);
    }

    protected function web($data)
    {
        $res = [];
        foreach ($data['errors'] as $key => $v) {
            if (isset($data['rules'][$key])) {
                $res[$key] = $v[0];
            } else {
                $res['other'] = $v[0];
            }
        }

        return $res;
    }

    protected function android($data)
    {
        $res = [];
        foreach ($data['errors'] as $v) {
            foreach ($v as $k => $m) {
                $res[] = $m;
            }
        }

        return $res;
    }
}
