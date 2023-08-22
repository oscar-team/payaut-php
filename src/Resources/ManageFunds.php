<?php

namespace OscarTeam\Payaut\Resources;

use OscarTeam\Payaut\BaseResource;
use OscarTeam\Payaut\Requests\Balance\GetBalance;
use OscarTeam\Payaut\Requests\Balance\ListDivisionInformation;
use OscarTeam\Payaut\Requests\Balance\TransferBalance;
use Saloon\Contracts\Response;

class ManageFunds extends BaseResource
{
    public function getBalance(string $code): Response
    {
        return $this->connector->send(new GetBalance($code));
    }

    public function listDivisionInformation(): Response
    {
        return $this->connector->send(new ListDivisionInformation());
    }

    public function transferBalance(array $requestData): Response
    {
        return $this->connector->send(new TransferBalance($requestData));
    }
}