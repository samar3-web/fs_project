<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Contact;

class ContactController extends AbstractController
{
/**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request): Response
    {
    	$em = $this->getDoctrine()->getManager();
    	$name = $request->get('name');
    	$subject =  $request->get('subject');
    	$email =  $request->get('email');
    	$message =  $request->get('message');
    	$date = new \DateTime();
    	if($request->getMethod() == 'POST'){
    		$contact = new Contact();
    	$contact->setName($name);
    	$contact->setEmail($email);
    	$contact->setSubject($subject);
    	$contact->setMessage($message);
    	$contact->setCreatedAt($date);

    	$em->persist($contact);
    	$em->flush();
    	$this->addFlash('success', 'Message envoyé avec succès');
    	}
    	

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }
}
