<?php
/**
 * Created by PhpStorm.
 * User: Greg
 * Date: 31/01/2017
 * Time: 15:46
 */

namespace oc\plateformBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdvertController extends Controller
{
	public function indexAction()
	{
		$content = $this
			->get('templating')
			->render('ocplateformBundle:Advert:index.html.twig');

		return new Response($content);
	}
}
