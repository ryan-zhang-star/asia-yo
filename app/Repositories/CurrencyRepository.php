<?php

namespace App\Repositories;

use App\Contracts\CurrencyRepository as CurrencyRepositoryContract;

class CurrencyRepository implements CurrencyRepositoryContract
{
    private $exchangeRates;

    public function __construct()
    {
        $this->exchangeRates = [
            'TWD' => [
                'TWD' => 1,
                'JPY' => 3.669,
                'USD' => 0.03281,
            ],
            'JPY' => [
                'TWD' => 0.26956,
                'JPY' => 1,
                'USD' => 0.00885,
            ],
            'USD' => [
                'TWD' => 30.444,
                'JPY' => 111.801,
                'USD' => 1,
            ]
        ];
    }

    public function getExchangeRate(string $source, string $target): float
    {
        return $this->exchangeRates[$source][$target];
    }
}