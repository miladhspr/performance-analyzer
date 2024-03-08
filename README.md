# PerformanceAnalyzer

PerformanceAnalyzer is a PHP class that helps you measure the execution time of code segments or operations in your PHP applications. It provides methods for starting and stopping a timer, measuring the execution time of a callback function, and displaying the execution time in a human-readable format.

## Installation

You can install PerformanceAnalyzer via Composer:

```bash
composer require miladhspr/performance-analyzer
```

## Usage

### Starting and Ending Timer

To measure the execution time of a code segment, you can start the timer before the code segment and end it afterward:

```php
use MiladHspr\PerformanceAnalyzer;

PerformanceAnalyzer::startTimer();

// Your code segment or operation goes here

PerformanceAnalyzer::endTimer();
```

### Measuring Execution Time of a Callback Function

You can also measure the execution time of a callback function using the `measureExecutionTime` method:

```php
use MiladHspr\PerformanceAnalyzer;

PerformanceAnalyzer::measureExecutionTime(function () {
    // Your callback function or code segment goes here
});
```

### Example

Here's a simple example demonstrating the usage of PerformanceAnalyzer:

```php
use MiladHspr\PerformanceAnalyzer;

PerformanceAnalyzer::startTimer();

// Code segment or operation to measure goes here

PerformanceAnalyzer::endTimer();
```

## Output

PerformanceAnalyzer displays the execution time in a human-readable format, including milliseconds, microseconds, or nanoseconds, depending on the duration of the operation.

## License

PerformanceAnalyzer is open-source software licensed under the [MIT license](LICENSE.md).
