<?php

namespace App\Payloads;

class UserPayload
{
    /**
     * @param $request
     * @return array
     */
    public static function getFilters($request): array
    {
        $payload = \Arr::only($request, [
            'name',
            'is_active',
            'birthday',
            'gender'
        ]);

        return $payload;
    }
}
