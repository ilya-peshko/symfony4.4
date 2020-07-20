<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Mailer\Emailer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     * @param Request $request
     * @param \Swift_Mailer $mailer
     *
     * @return Response
     */
    public function contact(Request $request, \Swift_Mailer $mailer, Emailer $emailer):Response
    {
        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $contactFormData = $form->getData();

            $message = (new \Swift_Message('You got mail'))
                ->setFrom($contactFormData['email'])
                ->setTo('alkatras4321@gmail.com')
                ->setBody(
                   $contactFormData['message'], 'text/plain'
                );

            $mailer->send($message);
            $this->addFlash('success', 'Message was sent');
            return $this->redirectToRoute('contact');
        }

        return $this->render('contact/contact.html.twig', [
            'our_form' => $form->createView()
        ]);
    }
}
