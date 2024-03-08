<?php
namespace MiladHspr\Analyzer;

class PerformanceAnalyzer
{
    private static $startTime;

    public static function displayRuntime($endTime, $startTime): void
    {
        $formattedRuntime = self::calculateRuntime($endTime, $startTime);
        self::renderRuntime($formattedRuntime);
    }

    public static function startTimer(): void
    {
        self::$startTime = microtime(true);
    }

    public static function endTimer(): void
    {
        $endTime = microtime(true);
        self::displayRuntime($endTime, self::$startTime);
    }

    public static function measureExecutionTime(callable $callback): void
    {
        self::startTimer();
        $callback();
        self::endTimer();
    }

    private static function renderRuntime(string $formattedRuntime): void
    {
        echo "Execution time: $formattedRuntime\n";
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
