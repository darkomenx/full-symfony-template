<?php

namespace App\Security;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;
use SymfonyCasts\Bundle\VerifyEmail\VerifyEmailHelperInterface;

class EmailVerifier
{
    public function __construct(private VerifyEmailHelperInterface $verifyEmailHelper, private MailerInterface $mailer, private EntityManagerInterface $entityManager)
    {
    }

    public function sendEmailConfirmation(string $verifyEmailRouteName, UserInterface $user, TemplatedEmail $email): void
    {
        var_dump('ici 2');

        $signatureComponents = $this->verifyEmailHelper->generateSignature(
            $verifyEmailRouteName,
            $user->getId(),
            $user->getEmail()
        );

        var_dump('ici 3');

        $context = $email->getContext();

        var_dump('ici 4');

        $context['signedUrl'] = $signatureComponents->getSignedUrl();
        var_dump('ici 5');

        $context['expiresAtMessageKey'] = $signatureComponents->getExpirationMessageKey();
        var_dump('ici 6');
        $context['expiresAtMessageData'] = $signatureComponents->getExpirationMessageData();
        var_dump('ici 7');

        $email->context($context);

        $this->mailer->send($email);
    }

    /**
     * @throws VerifyEmailExceptionInterface
     */
    public function handleEmailConfirmation(Request $request, UserInterface $user): void
    {
        $this->verifyEmailHelper->validateEmailConfirmationFromRequest($request, $user->getId(), $user->getEmail());

        $user->setVerified(true);

        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }
}
