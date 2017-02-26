<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Episode;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\TvSeries;
use AppBundle\Entity\UserEpisode;

/**
 * Episode controller.
 *
 * @Route("tvseries/{tvSeries}")
 */
class EpisodeController extends Controller
{
    /**
     * Creates a new episode entity.
     *
     * @Route("/new-episode", name="episode_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $episode = new Episode();
        
        $entityManager = $this->getDoctrine()->getManager();
		$repository = $entityManager->getRepository('AppBundle:TvSeries');
		$tvSeries = $repository->find($request->get('tvSeries'));
				
		$episode->setTvSeries($tvSeries);
        
        $form = $this->createForm('AppBundle\Form\EpisodeType', $episode);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($episode);
            $em->flush($episode);

            return $this->redirectToRoute('tvseries_show', array('id' => $tvSeries->getId()));
        }

        return $this->render('episode/new.html.twig', array(
            'episode' => $episode,
        	'tvSeries' => $tvSeries,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing episode entity.
     *
     * @Route("/{id}/edit", name="tvseries_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Episode $episode)
    {
        $deleteForm = $this->createDeleteForm($episode);
        $editForm = $this->createForm('AppBundle\Form\EpisodeType', $episode);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tvseries_edit', array('id' => $episode->getId()));
        }

        return $this->render('episode/edit.html.twig', array(
            'episode' => $episode,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a episode entity.
     *
     * @Route("/{id}", name="tvseries_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Episode $episode)
    {
        $form = $this->createDeleteForm($episode);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($episode);
            $em->flush($episode);
        }

        return $this->redirectToRoute('tvseries_index');
    }
    
    /**
     * Toggles the watched status for the given $episode
     * @param Episode $episode the episode for which the watched status should be toggled
     * 
     * @Route("/watched/{episode}", name="episode_watched")
     */
    public function toggleWatchedAction(Episode $episode)
    {
    	$em = $this->getDoctrine()->getManager();
    	$rep = $em->getRepository(UserEpisode::class);
    	$ue = $rep->findOneBy([
    			'user' => $this->getUser(),
    			'episode' => $episode
    	]);
    	
    	if($ue == null)
    	{
    		// set the episode watched if it is not
	    	$userEpisode = new UserEpisode();
	    	$userEpisode->setUser($this->getUser());
	    	$userEpisode->setEpisode($episode);
	    	$userEpisode->setWatchedAt(new \DateTime());
	    	
	    	$em->persist($userEpisode);
    	}
    	else
    	{
    		// otherwise set the episode unwatched
    		$em->remove($ue);
    	}
    	
    	$em->flush();
    	
    	return $this->redirectToRoute('tvseries_show', [
    			'id' => $episode->getTvSeries()
    	]);
    
    }

    /**
     * Creates a form to delete a episode entity.
     *
     * @param Episode $episode The episode entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Episode $episode)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tvseries_delete', array('id' => $episode->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
