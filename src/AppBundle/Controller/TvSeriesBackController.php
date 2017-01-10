<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\TvSeries;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TvSeriesBackController extends Controller
{
	/**
	 * @Route("/")
	 */
	public function indexAction()
	{
		$manager = $this->getDoctrine()->getManager();
		$series = $manager->getRepository(TvSeries::class)->findAll();
		
		return $this->render('homepage/index.html.twig', [
				'series' => $series
		]);
	}
	
	/**
	 * @Route("/series/create")
	 */
	public function createSeriesAction(Request $request)
	{
		$s = new TvSeries();
		$s->setAuthor($request->get('author'));
		$s->setName($request->get('name'));
		$s->setDescription($request->get('description'));
		
		$manager = $this->getDoctrine()->getManager();
		$manager->persist($s);
		$manager->flush();
		
		return new Response("OK");
	}
}