<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

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
		return $this->redirectToRoute("login");
	}
	
	/**
	 * @Route("/login", name="login")
	 */
	public function loginAction(Request $request)
	{
		$authenticationUtils = $this->get('security.authentication_utils');
		$error = $authenticationUtils->getLastAuthenticationError();
		$lastUsername = $authenticationUtils->getLastUsername();
		
		return $this->render('security/login.html.twig', [
				'last_username' => $lastUsername,
				'error' => $error
		]);
	}
}