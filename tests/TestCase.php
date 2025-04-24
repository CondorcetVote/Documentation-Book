<?php

namespace Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    public static string $myCandidatesToParse;
    public static string $myVotesToParse;
}
