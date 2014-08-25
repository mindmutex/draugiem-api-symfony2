<?php 

namespace Com\Mindmutex\NaesBundle\Draugiem;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\Security\Http\Firewall\ListenerInterface;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Core\Authentication\AuthenticationManagerInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationServiceException;

class DraugiemListener implements ListenerInterface {
	
    protected $securityContext;
    protected $authenticationManager;
	protected $logger;
	protected $connector; 
	
    public function __construct(SecurityContextInterface $securityContext, 
    		AuthenticationManagerInterface $authenticationManager, $logger, $connector) {
    			
		$this->securityContext = $securityContext;
		$this->authenticationManager = $authenticationManager;
		$this->logger = $logger;
		$this->connector = $connector;
	}
	
	public function handle(GetResponseEvent $event) {
		$request = $event->getRequest();
		
		$token = $this->securityContext->getToken(); 
		if ($token == null) {
			if (!$this->connector->getSession()) {
				// check if the request has parameters that would indicate failed response
				if ($request->query->get('dr_auth_status') == 'failed') {
					$response = new RedirectResponse("/");
					$response->send();
				} else {
					// send redirect to draugiem.lv to authorize request
					$redirect = $this->connector->getLoginURL($request->getUri());
					$this->logger->info("Token not provided, redirecting to draugiem", array($redirect));
					
					$response = new RedirectResponse($redirect);
					$response->send();
				}	
			} else {
				$user = new DraugiemUser($this->connector->getUserData());
				$this->logger->info("Setting user token:", array($user));
				
				$token = new DraugiemToken();
				$token->setUser($user);
				
				$this->securityContext->setToken($token);
			}
		}
	}
	
}