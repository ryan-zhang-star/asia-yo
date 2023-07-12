<?php

namespace App\Services;

use App\Contracts\CurrencyRepository;
use App\Contracts\CurrencyService as CurrencyServiceContract;

class CurrencyService implements CurrencyServiceContract
{
    private $currencyRepository;

    public function __construct(CurrencyRepository $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }

    public function exchange(string $source, string $target, float $amount): float
    {
        $exchangeRate = $this->currencyRepository->getExchangeRate($source, $target);
        
        return $exchangeRate * $amount;
    }
}