<?php

namespace Com\Mindmutex\NaesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Com\Mindmutex\NaesBundle\Draugiem;

class DefaultController extends Controller {
	public function indexAction() {
		return $this -> render('NaesBundle:Default:index.html.twig');
	}
}
