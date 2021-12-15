<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Annonces;

class DeposerController extends AbstractController
{
    /**
     * @Route("/deposer", name="deposer")
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
    		$annonce = new Annonces();
    	$annonce->setName($name);
    	$annonce->setEmail($email);
    	$annonce->setSubject($subject);
    	$annonce->setMessage($message);
    	$annonce->setCreated($date);

    	$em->persist($annonce);
    	$em->flush();
    	$this->addFlash('success', 'Annonce envoyé avec succès');
    	}
    	

        return $this->render('deposer/index.html.twig', [
            'controller_name' => 'DeposerController',
        ]);
    }
}
