<?php

namespace App\Filters;

class CoreFilter
{
    protected object $builder;

    public function apply($builder, $attributes)
    {
        $this->builder = $builder;
        foreach ($attributes as $filter => $value) {
            if (method_exists($this, $filter)) {
                $this->$filter($value);
            }
        }
    }

}
