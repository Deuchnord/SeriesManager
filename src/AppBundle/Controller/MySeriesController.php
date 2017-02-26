<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Entity\TvSeries;
use AppBundle\Entity\UserEpisode;
use AppBundle\Entity\Episode;

/**
 * The controller that maintains the user's watched series
 * @Route("/my-series")
 */
class MySeriesController extends Controller {
	
	/**
	 * @Route("/", name="myseries_index")
	 */
	public function indexAction()
	{
		$em = $this->getDoctrine()->getManager();
		
		// fetching the user's episodes 
		$userEpisodes = $em->getRepository('AppBundle:UserEpisode')->findByUser($this->getUser());
		
		$userSeries = [];
		
		// for each user's episode, fetch the series
		foreach($userEpisodes as $userEpisode)
		{
			$episode = $userEpisode->getEpisode();
			$tvSeries = $episode->getTvSeries();
			$userSeries[$tvSeries->getId()] = $tvSeries;
		}
		
		return $this->render("myseries/index.html.twig", [
			'userSeries' => $userSeries	
		]);
	}
	
	/**
	 * @Route("/add/{episode}", name="myseries_add")
	 * @Method("GET")
	 */
	public function addAction(Episode $episode)
	{
		$em = $this->getDoctrine()->getManager();
		
		$userEpisode = new UserEpisode();
		$userEpisode->setUser($this->getUser());
		$userEpisode->setEpisode($episode);
		
		$em->persist($userEpisode);
		$em->flush();
		
		return $this->redirectToRoute("myseries_index");
	}
	
}