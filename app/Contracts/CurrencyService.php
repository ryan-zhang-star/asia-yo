<?php

namespace App\Contracts;

interface CurrencyService
{
    /**
     * Perform currency exchange.
     *
     * @param  string $source The source currency.
     * @param  string $target The target currency.
     * @param  float $amount The amount to be converted.
     * @return float The converted amount.
     */
    public function exchange(string $source, string $target, float $amount): float;
}