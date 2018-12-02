<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param QueryBuilder $q
     * @param array $params
     * @return QueryBuilder
     */
    public function setParamsBeforeQuery($q, array $params)
    {
        if (isset($params['created_at'])) {
            $q = $q->where('created_at', $params['created_at']);
        }

        if (isset($params['updated_at'])) {
            $q = $q->where('updated_at', $params['updated_at']);
        }

        return $q;
    }
}
