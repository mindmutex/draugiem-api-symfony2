<?php

namespace Com\Mindmutex\NaesBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

use Com\Mindmutex\NaesBundle\Draugiem\DraugiemSecurityFactory;

class NaesBundle extends Bundle {
	public function build(ContainerBuilder $container) {
		parent::build($container);
		
        $extension = $container->getExtension('security');
        $extension->addSecurityListenerFactory(new DraugiemSecurityFactory());
	}
}
