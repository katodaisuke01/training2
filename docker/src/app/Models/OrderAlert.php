<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderAlert extends Model
{
    protected $guarded = [
        'id',
    ];

    const ALERTS = [
        'package_damaged',
        'undelivered',
        'damaged',
        'different',
        'incorrect_delivery',
        'shipping_defects',
        'other',
    ];

    /**
     * @param array $alerts
     * @return array
     */
    public static function processAlertsForUpdate(array $alerts): array
    {
        $params = [];
        foreach (self::ALERTS as $alert_name) {
            $params[$alert_name] = in_array($alert_name, $alerts);
        }
        return $params;
    }
}
