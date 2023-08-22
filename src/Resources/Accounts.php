<?php

namespace OscarTeam\Payaut\Resources;

use OscarTeam\Payaut\BaseResource;
use OscarTeam\Payaut\Requests\Accounts\GetAccount;
use OscarTeam\Payaut\Requests\Accounts\GetAccounts;
use Saloon\Contracts\Response;

class Accounts extends BaseResource
{
    public function getAccounts(string $accountHolderCode, array $queryParams = []): Response
    {
        return $this->connector->send(new GetAccounts($accountHolderCode, $queryParams));
    }

    public function getAccount(string $accountHolderCode,string $virtualAccountCode, array $queryParams = []): Response
    {
        return $this->connector->send(new GetAccount($accountHolderCode, $virtualAccountCode, $queryParams));
    }
}