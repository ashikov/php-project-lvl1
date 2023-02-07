<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\playGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function generateData(): array
{
    $data = [];

    for ($i = 1; $i <= ROUNDS_COUNT; $i += 1) {
        $question = rand(1, 100);
        $answer = isEven($question) ? 'yes' : 'no';

        $data[] = [$question, $answer];
    }

    return $data;
}

function run()
{
    $data = generateData();
    playGame($data, DESCRIPTION);
}
