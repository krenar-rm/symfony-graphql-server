<?php

declare(strict_types=1);

namespace App\GraphQL\Resolver;

use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserResolver implements ResolverInterface
{
    /**
     * Возвращает профиль пользователя
     *
     * @param string $id
     *
     * @return array
     */
    public function resolve(int $id): array
    {
        if (1 !== $id) {
            throw new NotFoundHttpException('User not found');
        }

        return [
            'username' => 'Имя пользователя',
            'email' => 'test@example.com',
            'phone' => null,
        ];
    }

    /**
     * Получение списка пользователей
     *
     * @return array
     */
    public function resolveCollection(): array
    {
        return [
            $this->resolve(1),
        ];
    }
}
