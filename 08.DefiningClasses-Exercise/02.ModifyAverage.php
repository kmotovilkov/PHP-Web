<?php

function higherThan5(string $number)
{
            $average = 0;
            $digitsSum = 0;
            $count = strlen($number);
            for ($i = 0; $i < $count; $i++) {
                $digitsSum += $number[$i];
                $average = $digitsSum / $count;
            }
            while ($average <= 5) {
                $number .= 9;
                $digitsSum += 9;
                $count++;
                $average = $digitsSum / $count;

            }
            return $number;
        }


$number = readline();

echo higherThan5($number);
