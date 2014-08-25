<?php

namespace Com\Mindmutex\NaesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller {
	public function indexAction() {
		return $this -> render('NaesBundle:Dashboard:index.html.twig', array(
		));
	}

}
