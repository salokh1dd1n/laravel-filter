<?php

namespace App\Filters;

use App\Payloads\UserPayload;
use Illuminate\Http\Request;

class UserFilter extends CoreFilter
{

    public function name($value)
    {
        $this->builder->where('name', 'like', "%$value%");
    }

    public function email($value)
    {
        $this->builder->where('email', 'like', "%$value%");
    }
//
    public function is_active($value)
    {
        if ($value == '1') {
            $this->builder->where('is_active', 1);
        } else {
            $this->builder->where('is_active', 0);
        }
    }

    public function birthday($value)
    {
        if (!$value) return;
        $this->builder->where('birthday', '>', $value);
    }

    public function gender($value)
    {
        if (!$value) return;

        $this->builder->where('gender', $value);
    }

}
