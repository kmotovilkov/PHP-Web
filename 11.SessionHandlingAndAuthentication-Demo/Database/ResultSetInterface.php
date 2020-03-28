<?php

namespace Database;

use Generator;

interface ResultSetInterface
{
    /**
     * @param $className
     * @return Generator
     */
    public function fetch($className): Generator;
}

