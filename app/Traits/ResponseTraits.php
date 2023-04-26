<?php

namespace App\Http\Traits;

use App\Exceptions\ValidationResponseException;
use Exception;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;

trait ResponseTrait
{
    /**
     * Return a successful ok HTTP response
     *
     * @param  null  $data
     */
    public function okResponse(string $message, $data = null): JsonResponse
    {
        return $this->successResponse($message, $data, 200);
    }

    /**
     * Return a successful created HTTP response
     */
    public function createdResponse(string $message, $data = null): JsonResponse
    {
        return $this->successResponse($message, $data, 201);
    }

    /**
     * Return a successful no content HTTP response
     */
    public function noContentResponse(): JsonResponse
    {
        return $this->successResponse('', null, 204);
    }

    /**
     * Return a generic successful HTTP response
     */
    public function successResponse(string $message, $data = null, int $status = 200): JsonResponse
    {
        return $this->jsonResponse($message, $status, $data);
    }

    /**
     * Return a validation error response
     */
    public function validationErrorResponse(Validator $validator, Request $request = null): \Symfony\Component\HttpFoundation\Response
    {
        return (new ValidationResponseException($validator, $request))
            ->getResponse();
    }

    /**
     * Return an unauthenticated HTTP error response
     */
    public function unauthenticatedResponse(string $message): JsonResponse
    {
        return $this->clientErrorResponse($message, 401);
    }

    /**
     * Return a bad request HTTP error response
     */
    public function badRequestResponse(string $message, array $error = null): JsonResponse
    {
        return $this->clientErrorResponse($message, 400, $error);
    }

    /**
     * Return a forbidden HTTP error response
     */
    public function forbiddenResponse(string $message, array $error = null): JsonResponse
    {
        return $this->clientErrorResponse($message, 403, $error);
    }

    /**
     * Return a not found HTTP error response
     *
     * @param  null  $error
     */
    public function notFoundResponse(string $message, $error = null): JsonResponse
    {
        return $this->clientErrorResponse($message, 404, $error);
    }

    /**
     * Return a generic client HTTP error response
     *
     * @param  null  $error
     */
    public function clientErrorResponse(string $message, int $status = 400, $error = null): JsonResponse
    {
        return $this->jsonResponse($message, $status, $error);
    }

    /**
     * Return a generic server HTTP error response
     */
    public function serverErrorResponse(string $string, int $status = 503, Exception $exception = null): JsonResponse
    {
        if ($exception !== null) {
            $error = "{$exception->getMessage()}
            on line {$exception->getLine()}
            in {$exception->getFile()}";

            Log::error($error);
            Log::channel('slack')->error($error);
        }

        return $this->jsonResponse($string, $status);
    }

    /**
     * Return a generic HTTP response
     *
     * @param  null  $data
     */
    public function jsonResponse(string $message, int $status, $data = null): JsonResponse
    {
        $is_successful = $this->isStatusCodeSuccessful($status);

        $response_data = [
            'status' => $is_successful,
            'message' => $message,
        ];

        if (! is_null($data)) {
            $response_data[$is_successful ? 'data' : 'error'] = $data;
        }

        return Response::json($response_data, $status);
    }

    /**
     * Determine if a  HTTP status code indicates success
     */
    public function isStatusCodeSuccessful(int $status): bool
    {
        return $status >= 200 && $status < 300;
    }

    public function authResponse($message, $status): JsonResponse
    {
        return $this->jsonResponse($message, $status);
    }

    public function tooManyRequests($message, $status = 429): JsonResponse
    {
        return $this->jsonResponse($message, $status);
    }
}
