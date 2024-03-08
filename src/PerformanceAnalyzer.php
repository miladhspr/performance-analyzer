<?php

namespace MiladHspr\Analyzer;

class PerformanceAnalyzer
{
    private static $startTime;

    private static function displayRuntime($endTime, $startTime): string
    {
        $formattedRuntime = self::calculateRuntime($endTime, $startTime);
        return self::renderRuntime($formattedRuntime);
    }

    public static function startTimer(): void
    {
        self::$startTime = microtime(true);
    }

    public static function endTimer(): string
    {
        $endTime = microtime(true);
        return self::displayRuntime($endTime, self::$startTime);
    }

    public static function measureExecutionTime(callable $callback): string
    {
        self::startTimer();
        $callback();
        return self::endTimer();
    }

    private static function renderRuntime(string $formattedRuntime): string
    {
        return $formattedRuntime;
    }

    private static function calculateRuntime($endTime, $startTime): string
    {
        $executionTime = $endTime - $startTime;

        if ($executionTime < 1e-6) {
            $runtimeUnit = 'nanoseconds';
            $formattedRuntime = round($executionTime * 1e9) . ' ' . $runtimeUnit;
        } elseif ($executionTime < 1e-3) {
            $runtimeUnit = 'microseconds';
            $formattedRuntime = round($executionTime * 1e6) . ' ' . $runtimeUnit;
        } elseif ($executionTime < 1) {
            $runtimeUnit = 'milliseconds';
            $formattedRuntime = round($executionTime * 1e3) . ' ' . $runtimeUnit;
        } else {
            $runtimeUnit = 'seconds';
            $formattedRuntime = round($executionTime, 2) . ' ' . $runtimeUnit;
        }
        return $formattedRuntime;
    }
}
