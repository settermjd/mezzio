<?php
declare(strict_types=1);

namespace Mezzio\Response;

use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @internal
 * @deprecated Will be removed with v4.0.0
 */
final class ResponseFactory implements ResponseFactoryInterface
{
    /**
     * @var callable():ResponseInterface
     */
    private $responseFactory;

    /**
     * @param callable():ResponseInterface $responseFactory
     */
    public function __construct(callable $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }

    public function createResponse(int $code = 200, string $reasonPhrase = ''): ResponseInterface
    {
        return ($this->responseFactory)()->withStatus($code, $reasonPhrase);
    }
}
