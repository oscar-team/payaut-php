<?php

namespace OscarTeam\Payaut\Resources;

use Saloon\Http\BaseResource;
use OscarTeam\Payaut\Requests\ExternalAccounts\CreateExternalAccount;
use OscarTeam\Payaut\Requests\ExternalAccounts\GetExternalAccount;
use OscarTeam\Payaut\Requests\ExternalAccounts\ListExternalAccounts;
use OscarTeam\Payaut\Requests\ExternalAccounts\SelectActiveExternalAccount;
use OscarTeam\Payaut\Requests\ExternalAccounts\UpdateExternalAccount;
use Saloon\Http\Response;

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