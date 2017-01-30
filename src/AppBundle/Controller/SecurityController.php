<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * The security controller
 * 
 * @Route("/")
 */
class SecurityController extends Controller
{
	/**
	 * @Route("/", name="index")
	 */
	public function indexAction(Request $request)
	{
		if($this->getUser() == null)
			return $this->redirectToRoute("login");
		
			return $this->redirectToRoute("tvseries_index");
	}
	
	/**
	 * @Route("/login", name="login")
	 */
	public function loginAction(Request $request)
	{
		if($this->getUser() != null)
			return $this->redirectToRoute("tvseries_index");
		
		$authenticationUtils = $this->get('security.authentication_utils');
		$error = $authenticationUtils->getLastAuthenticationError();
		$lastUsername = $authenticationUtils->getLastUsername();
		
		return $this->render('security/login.html.twig', [
				'last_username' => $lastUsername,
				'error' => $error
		]);
	}
}