<?php

namespace App\Services;

use App\Models\Metric;

class MetricService
{
    public function create(array $data, int $userId): Metric
    {
        $data['user_id'] = $userId;

        return Metric::create($data);
    }
}
