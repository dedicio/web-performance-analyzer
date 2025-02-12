<?php

declare(strict_types=1);

namespace App\Application\UseCases;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Exception\HttpBadRequestException;
use Slim\Exception\HttpNotFoundException;
use App\Domain\DomainException\DomainRecordNotFoundException;
use App\Application\UseCases\UseCasePayload;

abstract class UseCase {
    protected Request $request;

    protected Response $response;

    protected array $args;

    public function __construct()
    {
        
    }

    /**
     * @throws HttpNotFoundException
     * @throws HttpBadRequestException
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $this->request = $request;
        $this->response = $response;
        $this->args = $args;

        try {
            return $this->exec();
        } catch (DomainRecordNotFoundException $e) {
            throw new HttpNotFoundException($this->request, $e->getMessage());
        }
    }

    abstract protected function exec(): Response;

    /**
     * @param array|object|null $data
     * @param int $statusCode
     * @return Response
     */
    protected function respondWithData($data = null, int $statusCode = 200): Response
    {
        $payload = new UseCasePayload($statusCode, $data);

        return $this->respond($payload);
    }

    /**
     * @param UseCasePayload $payload
     * @return Response
     */
    protected function respond(UseCasePayload $payload): Response
    {
        $json = json_encode($payload, JSON_PRETTY_PRINT);
        $this->response->getBody()->write($json);

        return $this->response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus($payload->getStatusCode());
    }
}