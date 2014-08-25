<?php 

namespace Com\Mindmutex\NaesBundle\Draugiem;

use Symfony\Component\Security\Core\Authentication\Token\AbstractToken;

class DraugiemToken extends AbstractToken {
	private $authorizationCode;
	
    public function __construct(array $roles = array()) {
        parent::__construct($roles);
        $this->setAuthenticated(count($roles) > 0);
    }
	
	public function getCredentials() {
		return "";
	}
	
}
