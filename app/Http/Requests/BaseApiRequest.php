<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class BaseApiRequest extends FormRequest
{
    private $rules = [];
    private $fields = [];

    public function validateResolved()
    {
        if (! $this->passesAuthorization()) {
            $this->failedAuthorization();
        }

        $this->rules = $this->callByMethod('rules');
        $fields = $this->all();

        if (!$fields) {
            response()->error('at_one_field_required', 422);
        }

        $validator = \Validator::make($fields, $this->rules);
        if ($validator->fails()) {
            response()->error([
                'rules' => $this->rules,
                'errors' => $validator->messages()->toArray()
            ]);
        }
    }

    /**
     * Get all of the input and files for the request.
     *
     * @param  array|mixed  $keys
     * @return array
     */
    public function all($keys = null)
    {
        $all = array_replace_recursive($this->input(), $this->allFiles());
        $customFields = $this->callByMethod('fields');

        $this->fields = [];
        foreach (array_keys($this->rules) as $key) {
            if (array_key_exists($key, $all)) {
                $this->fields[$key] = is_null($all[$key]) ? '' : $all[$key];
            }
        }

        if (!empty($customFields)) {
            $this->fields = array_merge($this->fields, $customFields);
        }

        return $this->fields;
    }

    protected function callByMethod($pref)
    {
        $method = request()->header('RequestMethod');
        $method = $method ? $method : $pref;

        return method_exists($this, $method) ? $this->$method() : false;
    }
}
