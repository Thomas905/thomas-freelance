<?php

namespace App\Service;

use App\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class MailerManager extends AbstractController
{
    private MailerInterface $mailerInterface;

    public function __construct(MailerInterface $mailerInterface)
    {
        $this->mailerInterface = $mailerInterface;
    }

    public function sendMail(Contact $contact)
    {
        $email = (new Email())
            ->from($contact->getEmail())
            ->to('thomasclarisse03@gmail.com')
            ->subject($contact->getFirstname() . $contact->getLastname() . 'Viens de vous contacter')
            ->text($contact->getMessage())
            ->html($this->renderView('email/email.html.twig', ['contact' => $contact]));
            $this->mailerInterface->send($email);
    }
}
