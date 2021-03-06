<?php
/**
 * Created by PhpStorm.
 * User: Greg
 * Date: 31/01/2017
 * Time: 15:46
 */

namespace oc\plateformBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AdvertController extends Controller
{
	public function indexAction()
	{
		// if page < 1 shoot an error 404 page
		if($page < 1) {
			throw new NotFoundHttpException('Page "' .$page. ' "inexistante.');
		}

		// call index template
		return $this->render('plateformBundle:Advert:index.html.twig', array(
			'listAdverts' => array()
		));
	}

	// id parameter set to fit with route
	public function viewAction($id)
	{
		$advert = array(
			'title'     => 'Seeking for Symfony developer',
			'id'        => '$id',
			'author'    => 'Alex',
			'content'   => 'We are looking for a junior Symfony developer',
			'date'      => new \DateTime()
		);

		// get id from database then return it to view
		return $this->render('plateformBundle:Advert:view.html.twig', array(
			'advert'    => $advert
		));
	}

	public function addAction(Request $request)
	{
		// if request is POST it's because user has sent form
		if ($request->isMethod('POST')) {
			$request->getSession()->getFlashBag()->add('notice', 'Annonce enregistrée');
			// redirection to page related to page related to advert
			return $this->redirectToRoute('oc_plateform_view', array(
				'id' => 5
			));
		}
		// if request isn't in POST, show form
		return $this->render('plateformBundle:Advert:add.html.twig');
	}

	public function editAction($id, Request $request)
	{
		// get advert related to its id
		if($request->isMethod('POST')) {
			$request->getSession()->getFlashBag()->add('notice', 'Annonce modifiée');
			return $this->redirectToRoute('oc_platform_view', array(
				'id' => 5
			));
		}
		return $this->render('platformbundle:Advert:edit.html.twig');
	}

	public function deleteAction($id)
	{
		// get advert related to its id
		// delete said advert

		return $this->render('platformbundle:Advert:delete.html.twig');

	}

	public function menuAction($limit)
	{
		// list set
		$listAdverts = array(
			array('id' => 2, 'title' => 'Seeking for Symfony developer'),
			array('id' => 5, 'title' => 'webmaster mission'),
			array('id' => 9, 'title' => 'webdesigner internship')
		);
		return $this->render('plateformBundle:Advert:menu.html.twig', array(
			'listAdverts' => $listAdverts
		));
	}
}
