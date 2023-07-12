<?php

namespace App\Contracts;

interface CurrencyRepository
{
    /**
     * Get the exchange rate between two currencies.
     *
     * @param  string $source The source currency.
     * @param  string $target The target currency.
     * @return float The exchange rate.
     */
    public function getExchangeRate(string $source, string $target): float;
}