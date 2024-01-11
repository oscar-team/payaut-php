<?php

namespace OscarTeam\Payaut\Resources;

use OscarTeam\Payaut\BaseResource;
use OscarTeam\Payaut\Requests\SplitRefunds\CreateSplitRefund;
use OscarTeam\Payaut\Requests\SplitRefunds\GetSplitRefund;
use OscarTeam\Payaut\Requests\SplitRefunds\ListSplitRefunds;
use Saloon\Contracts\Response;

class SplitRefunds extends BaseResource
{
    public function list(array $queryParams = []): Response
    {
        return $this->connector->send(new ListSplitRefunds($queryParams));
    }

    public function create(array $requestData): Response
    {
        return $this->connector->send(new CreateSplitRefund($requestData));
    }

    public function get(string $code): Response
    {
        return $this->connector->send(new GetSplitRefund($code));
    }
}