<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     */
    public function render($request, Throwable $e)
    {
        // Handle specific HTTP exceptions with custom error pages
        if ($e instanceof HttpException) {
            $statusCode = $e->getStatusCode();
            
            // Check if we have a custom error view for this status code
            if (view()->exists("errors.{$statusCode}")) {
                return response()->view("errors.{$statusCode}", [
                    'exception' => $e,
                    'statusCode' => $statusCode,
                ], $statusCode);
            }
        }

        // Handle database errors gracefully
        if ($this->isDatabaseError($e)) {
            if ($request->expectsJson()) {
                return response()->json([
                    'error' => 'Database connection error. Please try again later.',
                    'message' => config('app.debug') ? $e->getMessage() : 'Service temporarily unavailable'
                ], 503);
            }
            
            return response()->view('errors.503', [
                'exception' => $e,
                'statusCode' => 503,
            ], 503);
        }

        return parent::render($request, $e);
    }

    /**
     * Check if the exception is a database-related error
     */
    private function isDatabaseError(Throwable $e): bool
    {
        return $e instanceof \Illuminate\Database\QueryException ||
               $e instanceof \PDOException ||
               str_contains($e->getMessage(), 'database') ||
               str_contains($e->getMessage(), 'SQLSTATE');
    }
}