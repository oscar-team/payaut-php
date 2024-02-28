<?php

namespace OscarTeam\Payaut;

use OscarTeam\Payaut\Resources\AccountHolders;
use OscarTeam\Payaut\Resources\ManageFunds;
use OscarTeam\Payaut\Resources\ManagePayouts;
use OscarTeam\Payaut\Resources\Reporting;
use OscarTeam\Payaut\Resources\SplitPayments;
use OscarTeam\Payaut\Resources\Transactions;
use OscarTeam\Payaut\Resources\WebhookConfigurations;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;

class PayautApi extends Connector
{
    public function __construct(protected string $token, protected string $environment = 'prod')
    {
    }

    protected function defaultAuth(): TokenAuthenticator
    {
        return new TokenAuthenticator($this->token);
    }

    public function resolveBaseUrl(): string
    {
        return $this->getBaseUrl();
    }

    private function getBaseUrl(): string
    {
        if ($this->environment === 'prod') {
            return 'https://api.payaut.com/api';
        }

        return 'https://sandbox.payaut.com/api';
    }

    protected function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];
    }

    public function accountHolders(): AccountHolders
    {
        return new AccountHolders($this);
    }

    public function split(): SplitPayments
    {
        return new SplitPayments($this);
    }

    public function manageFunds(): ManageFunds
    {
        return new ManageFunds($this);
    }

    public function payouts(): ManagePayouts
    {
        return new ManagePayouts($this);
    }

    public function transactions(): Transactions
    {
        return new Transactions($this);
    }

    public function reporting(): Reporting
    {
        return new Reporting($this);
    }

    public function webhookConfiguration(): WebhookConfigurations
    {
        return new WebhookConfigurations($this);
    }
}