<?php
namespace Com\Mindmutex\NaesBundle\Draugiem;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\DefinitionDecorator;
use Symfony\Component\Config\Definition\Builder\NodeDefinition;
use Symfony\Bundle\SecurityBundle\DependencyInjection\Security\Factory\SecurityFactoryInterface;

class DraugiemSecurityFactory implements SecurityFactoryInterface {
    public function create(ContainerBuilder $container, $id, $config, $userProvider, $defaultEntryPoint) {
        $listenerId = 'security.authentication.listener.draugiem.' . $id;
        $listener = $container->setDefinition($listenerId, 
        	new DefinitionDecorator('draugiem.security.authentication.listener'));

        return array($userProvider, $listenerId, $defaultEntryPoint);
    }

    public function getPosition() {
        return 'http';
    }

    public function getKey() {
        return 'draugiem';
    }
	
    public function addConfiguration(NodeDefinition $node) {
    }	
}