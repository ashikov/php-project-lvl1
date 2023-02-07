<?php

namespace BrainGames\Tests;

use PHPUnit\Framework\TestCase;

use function BrainGames\Games\Even\isEven;
use function BrainGames\Games\Calc\calculate;
use function BrainGames\Games\Gcd\getGcd;
use function BrainGames\Games\Progression\getProgression;
use function BrainGames\Games\Prime\isPrime;

class BrainGamesTest extends TestCase
{
    public function testEven(): void
    {
        $this->assertTrue(isEven(2));
        $this->assertFalse(isEven(3));

        $this->assertTrue(isEven(0));
    }

    public function testCalc(): void
    {
        $this->assertEquals(5, calculate(2, 3, '+'));
        $this->assertEquals(0, calculate(10, 10, '-'));
        $this->assertEquals(4, calculate(2, 2, '*'));

        $this->expectException(\Exception::class);
        calculate(1, 1, 'jopa');
    }

    public function testGcd(): void
    {
        $this->assertEquals(1, getGcd(1, 5));
        $this->assertEquals(4, getGcd(8, 4));
    }

    public function testProgression(): void
    {
        $firstNumber = 0;
        $step = 10;
        $length = 10;

        $expected = [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100];

        $this->assertEquals($expected, getProgression($firstNumber, $step, $length));
    }

    public function testPrime(): void
    {
        $this->assertTrue(isPrime(2));
        $this->assertFalse(isPrime(4));
        $this->assertTrue(isPrime(109));
    }
}
