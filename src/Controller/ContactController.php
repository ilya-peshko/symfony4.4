<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     *
     * @return Response
     */
    public function contact():Response
    {
        $form = $this->createForm(ContactType::class);
        return $this->render('contact/contact.html.twig', [
            'our_form' => $form->createView()
        ]);
    }
}
