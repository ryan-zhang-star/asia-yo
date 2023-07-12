<?php

namespace Tests\Unit\Repositories;

use App\Contracts\CurrencyRepository;
use Tests\TestCase;

class CurrencyRepositoryTest extends TestCase
{
    public function testGetExchangeRate()
    {
        $currencyRepository = app(CurrencyRepository::class);
        $result = $currencyRepository->getExchangeRate('USD', 'JPY');
        $this->assertEquals(111.801, $result);
    }
}
