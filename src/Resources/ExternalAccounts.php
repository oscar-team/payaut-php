<?php

namespace OscarTeam\Payaut\Resources;

use OscarTeam\Payaut\BaseResource;
use OscarTeam\Payaut\Requests\AccountHolders\CreateExternalAccount;
use OscarTeam\Payaut\Requests\AccountHolders\GetExternalAccount;
use OscarTeam\Payaut\Requests\AccountHolders\ListExternalAccounts;
use OscarTeam\Payaut\Requests\AccountHolders\SelectActiveExternalAccount;
use OscarTeam\Payaut\Requests\AccountHolders\UpdateExternalAccount;
use Saloon\Contracts\Response;

class ExternalAccounts extends BaseResource
{
    public function list(string $accountHolderCode, array $queryParams = []): Response
    {
        return $this->connector->send(new ListExternalAccounts($accountHolderCode, $queryParams));
    }

    public function create(string $accountHolderCode, array $requestData): Response
    {
        return $this->connector->send(new CreateExternalAccount($accountHolderCode, $requestData));
    }

    public function get(string $accountHolderCode, string $externalAccountCode, array $queryParams = []): Response
    {
        return $this->connector->send(new GetExternalAccount($accountHolderCode, $externalAccountCode, $queryParams));
    }

    public function update(string $accountHolderCode, string $externalAccountCode, array $requestData): Response
    {
        return $this->connector->send(new UpdateExternalAccount($accountHolderCode, $externalAccountCode, $requestData));
    }

    public function selectActiveExternalAccount(string $accountHolderCode, string $externalAccountCode,): Response
    {
        return $this->connector->send(new SelectActiveExternalAccount($accountHolderCode, $externalAccountCode));
    }
}