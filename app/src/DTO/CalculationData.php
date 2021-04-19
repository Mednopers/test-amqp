<?php

declare(strict_types=1);

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class CalculationData
{
    /**
     * @Assert\Positive()
     */
    public int $firstNumber;

    /**
     * @Assert\Positive()
     */
    public int $secondNumber;
}
