# Payaut PHP Integration

This is a PHP library for integrating [Payaut](https://payaut.com/) apis

## Installation

Use the package manager [composer](https://pip.pypa.io/en/stable/) to install.

```bash
composer require oscar-team/payaut-php
```

## Usage

```php
require __DIR__ . '/vendor/autoload.php';

$client = new \OscarTeam\Payaut\PayautApi(token: 'token', environment: 'test');
```

### [Account Holders Apis]('https://apidocs.payaut.com/#tag/Account-Holders')
```php
$client->accountHolders()->list(queryParams: ['_fragments' => 'extacc', '_pageNumber' => '1', '_sort' => 'asc'])->json();

// Check Official docs for parameters
$requestData = [
    "displayName" => "J. Doe",
    "legalEntity" => [
        "legalName" => "John Doe",
        "firstName" => "John",
        "lastName" => "Doe",
        "legalForm" => "individual"
    ]
];
$client->accountHolders()->create($requestData)->json();
$client->accountHolders()->get(code: 'accountHolderCode', queryParams: ['_fragemnts' => 'extacc'])->json();
$client->accountHolders()->update($requestData)->json();
$client->accountHolders()->delete(code: 'accountHolderCode')->json();
$client->accountHolders()->accounts()->getAccounts(
        accountHolderCode: 'accountHolderCode',
        queryParams: [],
)->json();
$client->accountHolders()->accounts()->getAccount(
        accountHolderCode: 'accountHolderCode',
        virtualAccountCode: 'virtualAccountCode',
        queryParams: [],
)->json();
$client->accountHolders()->externalAccounts()->list(
        accountHolderCode: 'accountHolderCode',
        queryParams: [],
)->json();
$client->accountHolders()->externalAccounts()->create(
        accountHolderCode: 'accountHolderCode',
        requestData: [] //Check official documentation for requestData payload
)->json();
$client->accountHolders()->externalAccounts()->get(
        accountHolderCode: 'accountHolderCode',
        externalAccountCode: 'externalAccountCode',
        queryParams: []
)->json();
$client->accountHolders()->externalAccounts()->update(
        accountHolderCode: 'accountHolderCode',
        externalAccountCode: 'externalAccountCode',
        requestData: [] //Check official documentation for requestData payload
)->json();
$client->accountHolders()->externalAccounts()->selectActiveExternalAccount(
        accountHolderCode: 'accountHolderCode',
        externalAccountCode: 'externalAccountCode'
)->json();
$client->accountHolders()->hostedOnboarding()->generateUrl(
        accountHolderCode: 'accountHolderCode',
        queryParams: []
)->json();
```

### [Split Payments Apis]('https://apidocs.payaut.com/#tag/Splits')
```php
$client->split()->list(queryParams: [])->json();

$requestData = [
    "extRef" => "order123",
    "totalAmount" => 7000,
    "description" => "order 123",
    "items" => [
        [
            "type" => "GROUP",
            "extRef" => "order123split",
            "amount" => "7000,",
            "accountCode" => "FD5CKXPzDbi5xmwhrx71GmefFJNsztJjC48",
            "description" => "order 123 group",
            "items" => [
                [
                "type" => "GROUP",
                "extRef" => "order123splitgroup",
                "amount" => "7000,",
                "description" => "order 123 group",
                "items" => [
                        [
                            "type" => "ITEM",
                            "label" => "COMMISSION",
                            "extRef" => "order123commission",
                            "amount" => "1200,",
                            "description" => "commission"
                        ],
                        [
                            "type" => "ITEM",
                            "label" => "PRODUCT_ITEM",
                            "extRef" => "order123selleramount",
                            "amount" => "7000,",
                            "description" => "seller amount"
                        ]
                   ]
                ]
            ]
        ],
    ],
    "pspExtRef" => "PSP reference",
    "currency" => "EUR",
    "paymentProcessor" => "ADYEN",
    "paymentMethod" => "iDEAL"
];
$client->split()->create(requestData: $requestData)->json();
$client->split()->get(code: 'splitCode')->json();
$client->split()->update($requestData)->json();
$client->split()->cancel(code: 'splitPaymentCode')->json();
$client->split()->refunds()->list(queryParams: [])->json();
$client->split()->refunds()->create(requestData: [])->json();
$client->split()->refunds()->get(code: 'splitRefundCode')->json();
```

### [Manage Funds]('https://apidocs.payaut.com/#tag/Balance')
```php
$client->manageFunds()->getBalance(code: 'accountCode')->json();
$client->manageFunds()->listDivisionInformation()->json();
$requestData = [
    "fromAccountCode" => "FD5CM7GKttVTf7Gt7KcTVKU37fx7StTxvcc",
    "toAccountCode"=> "FD5CMdGdJD7gUGVfTtDUU77vYtUSaa37tJ7",
    "amount" => 1000,
    "currency" => "EUR",
    "idempotencyKey" => "f4754d35-7eaf-4338-a5ac-9d61bb1a2ff7",
    "type" => "INVOICE",
    "description" => "string"
];
$client->manageFunds()->transferBalance(requestData: $requestData)->json();
```

### [Manage Payouts]('https://apidocs.payaut.com/#tag/Payouts-overview')
```php
$client->payouts()->list(version: 'v1', queryParams: [])->json();
$client->payouts()->get(code: 'code')->json();
$client->payouts()->config()->getAccountHolderConfiguration(virtualAccountCode: 'virtualAccountCode')->json();
//Check official documentation for requestData payload
$client->payouts()->config()->updateAccountHolderConfiguration(virtualAccountCode: 'virtualAccountCode', requestData: [])->json();
$client->payouts()->config()->deleteAccountHolderConfiguration(virtualAccountCode: 'virtualAccountCode')->json();
$client->payouts()->config()->getDivisionConfiguration()->json();
//Check official documentation for requestData payload
$client->payouts()->config()->updateDivisionConfiguration(requestData: [])->json();
$client->payouts()->config()->getDefaultConfiguration()->json();
//Check official documentation for requestData payload
$client->payouts()->config()->updateDefaultConfiguration(requestData: [])->json();
$requestData = [
    "accountCode" => "FD5CM7GKttVTf7Gt7KcTVKU37fx7StTxvcc",
    "amount" => 1000,
    "sourceCurrency" => "EUR",
    "targetCurrency" => "EUR",
    "description" => "This is a test payout request",
    "externalAccountCode" => "FD5CMGdfT7g56S1vx4Rq9vDEmN52G8NrWFi",
    "processAt" => "2022-02-03T13:12:53.10032+01:00"
];
$client->payouts()->create(requestData: $requestData)->json();
$client->payouts()->delete(code: 'payoutRequestCde')->json();
```

### [Transactions]('https://apidocs.payaut.com/#tag/Transactions')
```php
$client->transactions()->get(queryParams: [])->json();
```

### [Reporting]('https://apidocs.payaut.com/#tag/Reporting')
```php
$client->reporting()->getReport(report: 'string')->json();
$requestData = [
    "id" => "985bb876-657e-4fea-82a7-b1efc0bdc318",
    "report" => "marketplace-sellers",
    "status" => "SCHEDULED",
    "url" => "string",
    "createdAt" => "2022-04-09T09:32:48.257538",
    "account" => [
        "id" => "FD5CKXPze3o29SQD7MwYDDCX8oKKjN6h4eF",
        "name" => "John Doe",
        "type" => "seller"
    ]
];
$client->reporting()->getReportForSpecificAccount(report: 'string', requestData: $requestData)->json();
```

## Contributing

Pull requests are welcome. For major changes, please open an issue first
to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License

[MIT](https://choosealicense.com/licenses/mit/)