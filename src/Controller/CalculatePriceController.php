<?php

declare(strict_types=1);

namespace App\Controller;

use App\Request\CalculatePriceRequest;
use App\Response\CalculatePriceResponse;
use App\Service\CalculatePriceService;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;

#[OA\Tag('Calculate')]
#[AsController]
#[Route(path: '/calculate-price', name: self::class, methods: 'POST')]
final class CalculatePriceController
{
    public function __construct(
        private readonly CalculatePriceService $calculatePriceService
    ) {
    }

    public function __invoke(#[MapRequestPayload] CalculatePriceRequest $request): CalculatePriceResponse
    {
        $result = $this->calculatePriceService->calculate($request->product, $request->taxNumber, $request->couponCode);

        return new CalculatePriceResponse(
             data: [
                 'result' => $result,
            ]
        );
    }
}
