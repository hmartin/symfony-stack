<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Serializer\SerializerInterface;

final class AdminController extends EasyAdminController
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(
        SerializerInterface $serializer,
        UserPasswordEncoderInterface $encoder
    ) {
        $this->serializer = $serializer;
        $this->encoder = $encoder;
    }

    private function setUserPlainPassword(User $user): void
    {
        if ($user->getPlainPassword()) {
            $user->setPassword($this->encoder->encodePassword($user, $user->getPlainPassword()));
        }
    }

    public function persistUserEntity(User $user): void
    {
        $this->setUserPlainPassword($user);

        $this->persistEntity($user);
    }

    public function updateUserEntity(User $user): void
    {
        $this->setUserPlainPassword($user);

        $this->updateEntity($user);
    }
}
