<?php

namespace OscarTeam\Payaut\Resources;

use OscarTeam\Payaut\BaseResource;
use OscarTeam\Payaut\Requests\PayoutConfig\DeleteAccountHolderConfiguration;
use OscarTeam\Payaut\Requests\PayoutConfig\GetAccountHolderConfiguration;
use OscarTeam\Payaut\Requests\PayoutConfig\GetDefaultPayoutConfiguration;
use OscarTeam\Payaut\Requests\PayoutConfig\GetDivisionConfiguration;
use OscarTeam\Payaut\Requests\PayoutConfig\UpdateAccountHolderConfiguration;
use OscarTeam\Payaut\Requests\PayoutConfig\UpdateDefaultPayoutConfiguration;
use OscarTeam\Payaut\Requests\PayoutConfig\UpdateDivisionConfiguration;
use Saloon\Contracts\Response;

class PayoutConfig extends BaseResource
{
    public function updateDefaultConfiguration(array $requestData): Response
    {
        return $this->connector->send(new UpdateDefaultPayoutConfiguration($requestData));
    }

    public function updateDivisionConfiguration(array $requestData): Response
    {
        return $this->connector->send(new UpdateDivisionConfiguration($requestData));
    }

    public function updateAccountHolderConfiguration(string $virtualAccountCode, array $requestData): Response
    {
        return $this->connector->send(new UpdateAccountHolderConfiguration($virtualAccountCode, $requestData));
    }

    public function getDefaultConfiguration(): Response
    {
        return $this->connector->send(new GetDefaultPayoutConfiguration());
    }

    public function getDivisionConfiguration(): Response
    {
        return $this->connector->send(new GetDivisionConfiguration());
    }

    public function getAccountHolderConfiguration(string $virtualAccountCode): Response
    {
        return $this->connector->send(new GetAccountHolderConfiguration($virtualAccountCode));
    }

    public function deleteAccountHolderConfiguration(string $virtualAccountCode): Response
    {
        return $this->connector->send(new DeleteAccountHolderConfiguration($virtualAccountCode));
    }

}