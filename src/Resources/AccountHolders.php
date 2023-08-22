<?php

namespace OscarTeam\Payaut\Resources;

use OscarTeam\Payaut\BaseResource;
use OscarTeam\Payaut\Requests\AccountHolders\CreateAccountHolder;
use OscarTeam\Payaut\Requests\AccountHolders\DeleteAccountHolder;
use OscarTeam\Payaut\Requests\AccountHolders\GetAccountHolder;
use OscarTeam\Payaut\Requests\AccountHolders\ListAccountHolders;
use OscarTeam\Payaut\Requests\AccountHolders\UpdateAccountHolder;
use Saloon\Contracts\Response;

class AccountHolders extends BaseResource
{
    public function list(array $queryParams = []): Response
    {
        return $this->connector->send(new ListAccountHolders($queryParams));
    }

    public function create(array $requestData): Response
    {
        return $this->connector->send((new CreateAccountHolder($requestData)));
    }

    public function get(string $accountHolderCode, array $queryParams = []): Response
    {
        return $this->connector->send(new GetAccountHolder($accountHolderCode, $queryParams));
    }

    public function update(string $accountHolderCode, array $requestData): array
    {
        return $this->connector->send(new UpdateAccountHolder($accountHolderCode, $requestData))->json();
    }

    public function delete(string $accountHolderCode): Response
    {
        return $this->connector->send(new DeleteAccountHolder($accountHolderCode));
    }

    public function accounts(): Accounts
    {
        return new Accounts($this->connector);
    }

    public function externalAccounts(): ExternalAccounts
    {
        return new ExternalAccounts($this->connector);
    }

    public function hostedOnboarding(): HostedOnboarding
    {
        return new HostedOnboarding($this->connector);
    }
}