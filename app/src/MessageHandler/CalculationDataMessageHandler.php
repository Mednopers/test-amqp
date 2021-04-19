<?php

declare(strict_types=1);

namespace App\MessageHandler;

use App\DTO\CalculationData;
use App\Entity\CalculationResult;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class CalculationDataMessageHandler implements MessageHandlerInterface
{
    private EntityManagerInterface $entityManager;
    private LoggerInterface $logger;

    public function __construct(EntityManagerInterface $entityManager, LoggerInterface $logger)
    {
        $this->entityManager = $entityManager;
        $this->logger = $logger;
    }

    public function __invoke(CalculationData $data)
    {
        try {
            $result = new CalculationResult();
            $result->setValue($data->firstNumber + $data->secondNumber);

            $this->entityManager->persist($result);
            $this->entityManager->flush();
        } catch (\Exception $exception) {
            $this->logger->error($exception->getMessage(), $exception->getTrace());
        }
    }
}
