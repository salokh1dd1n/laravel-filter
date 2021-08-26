<?php

namespace App\Filters;

use App\Payloads\UserPayload;
use Illuminate\Http\Request;

class UserFilter extends CoreFilter
{

    /**
     * @param UserPayload $payload
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function name($value)
    {
        $this->model->where('name', 'like', "%$value%");
    }

    public function email($value)
    {
        $this->model->where('email', 'like', "%$value%");
    }
//
    public function is_active($value)
    {
        if ($value == '1') {
            $this->model->where('is_active', 1);
        } else {
            $this->model->where('is_active', 0);
        }
    }
//
    public function birthday($value)
    {
        if (!$value) return;
        $this->model->where('birthday', '>', $value);
    }
//
    public function gender($value)
    {
        if (!$value) return;

        $this->model->where('gender', $value);
    }

}
