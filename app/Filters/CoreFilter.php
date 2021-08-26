<?php

namespace App\Filters;

class CoreFilter
{
    protected $model;

    protected $payload;

    /**
     * @param $payload
     */
    public function __construct($payload)
    {
        $this->payload = $payload;
    }

    public function apply($model)
    {
        $this->model = $model;
        foreach ($this->filters() as $filter => $value) {
            if (method_exists($this, $filter)) {
                $this->$filter($value);
            }
        }
    }

    public function filters(): array
    {
        return $this->payload->all();
    }
}
