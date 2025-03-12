<?php
namespace WistiaFeed\ErrorHandling;

class ErrorHandler {
    /**
     * Sets up a global exception handler to manage uncaught exceptions.
     * Logs the exception details and sends a JSON response with error information.
     *
     * @param \Exception $e The exception to handle.
     */
    public static function handleException($e) {
        self::logError($e); // Use the internal logging method to log the error.

        header('Content-Type: application/json', true, 500);
        echo json_encode([
            'error' => [
                'code' => 500,
                'message' => 'Internal server error',
                'details' => 'An unexpected error occurred. Please contact AppLovin support if this continues. Error: ' . $e->getMessage()
            ]
        ]);
        exit;
    }

    /**
     * Logs detailed error information.
     * Optionally, could write to a separate log file or a structured log that can be parsed by log management tools.
     *
     * @param \Exception $exception The caught exception.
     */
    public static function logError($exception) {
        // Define the log file path.
        $logFile = __DIR__ . '/../logs.log';
        
        // Append a newline character to ensure each log entry is on a new line
        $message = "Error: " . $exception->getMessage() . 
                   "; File: " . $exception->getFile() . 
                   "; Line: " . $exception->getLine() . "\n";
        
        // Write to the specified log file.
        error_log($message, 3, $logFile);
    }
    
}
