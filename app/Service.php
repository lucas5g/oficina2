<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function filter($date, $client, $salesman)
    {

        $servicesFilter = $this::where([
            ['created_at', 'LIKE',  "{$date}%"],
            ['client', 'LIKE',  "%{$client}%"],
            ['salesman', 'LIKE', "%{$salesman}%"],

        ])->get();

        return $servicesFilter;
    }
}
