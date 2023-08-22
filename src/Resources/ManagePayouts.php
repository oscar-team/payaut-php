<?php

namespace OscarTeam\Payaut\Resources;

use OscarTeam\Payaut\BaseResource;
use OscarTeam\Payaut\Requests\PayoutManualRequest\CreatePayoutRequest;
use OscarTeam\Payaut\Requests\PayoutManualRequest\DeletePayoutRequest;
use OscarTeam\Payaut\Requests\PayoutsOverview\GetPayoutRequest;
use OscarTeam\Payaut\Requests\PayoutsOverview\ListPayoutRequests;
use OscarTeam\Payaut\Requests\PayoutsOverview\ListPayoutRequestsV2;
use Saloon\Contracts\Response;

class ManagePayouts extends BaseResource
{
    public function list(string $version = 'v1', array $queryParams = []): Response
    {
        $request = match ($version) {
            'v2' => new ListPayoutRequestsV2($queryParams),
            default => new ListPayoutRequests($queryParams)
        };

        return $this->connector->send($request);
    }

    public function get(string $code): Response
    {
        return $this->connector->send(new GetPayoutRequest($code));
    }

    public function create(array $requestData): Response
    {
        return $this->connector->send(new CreatePayoutRequest($requestData));
    }

    public function delete(string $code): Response
    {
        return $this->connector->send(new DeletePayoutRequest($code));
    }

    public function config(): PayoutConfig
    {
        return new PayoutConfig($this->connector);
    }
}