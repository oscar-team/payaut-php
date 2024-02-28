<?php

namespace OscarTeam\Payaut\Resources;

use Saloon\Http\BaseResource;
use OscarTeam\Payaut\Requests\Transactions\GetTransactions;
use Saloon\Http\Response;

class Transactions extends BaseResource
{
    public function get(array $queryParams = []): Response
    {
        return $this->connector->send(new GetTransactions($queryParams));
    }
}