<?php

declare(strict_types=1);

namespace App\Controller;

use App\Request\PurchaseRequest;
use App\Service\Purchase\PurchaseService;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;

#[OA\Tag('Purchase')]
#[AsController]
#[Route(path: '/purchase', name: self::class, methods: 'POST')]
final class PurchaseController
{
    public function __construct(
        private PurchaseService $calculatePriceService
    ) {
    }

    public function __invoke(#[MapRequestPayload] PurchaseRequest $request): JsonResponse
    {
      $this->calculatePriceService->purchase(
            processorEnum: $request->paymentProcessor,
            productId: $request->product,
            taxCode: $request->taxNumber,
            couponCode: $request->couponCode
        );

        return new JsonResponse(
            data: [
                'success' => true,
            ]
        );
    }
}
