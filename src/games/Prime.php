<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\playGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $number): bool
{
    $prime = true;

    for ($divisor = 2; $divisor < $number; $divisor++) {
        if (($number % $divisor) === 0) {
            $prime = false;
            return $prime;
        }
    }

    return $prime;
}

function generateData(): array
{
    $data = [];

    for ($i = 1; $i <= ROUNDS_COUNT; $i += 1) {
        $question = rand(1, 100);
        $answer = isPrime($question) ? 'yes' : 'no';

        $data[] = [$question, $answer];
    }

    return $data;
}

function run()
{
    $data = generateData();
    playGame($data, DESCRIPTION);
}
