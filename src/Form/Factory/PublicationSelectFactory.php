<?php

/**
 * Melis Technology (http://www.melistechnology.com)
 *
 * @copyright Copyright (c) 2016 Melis Technology (http://www.melistechnology.com)
 *
 */

namespace Publications\Form\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use MelisCore\Form\Factory\MelisSelectFactory;
use Zend\Session\Container;

/**
 * MelisCms news select factory
 */
class PublicationSelectFactory extends MelisSelectFactory
{
	protected function loadValueOptions(ServiceLocatorInterface $formElementManager)
	{
		$sliders = array();
	    $serviceManager = $formElementManager->getServiceLocator();		
		$publicationSvc        = $serviceManager->get('PublicationsService');
		$publicationData       = [];
		
		$container = new Container('melisplugins');
		$langId = $container['melis-plugins-lang-id'];

		foreach($publicationSvc->getPublicationsList(null, $langId) as $publication){
		    if($publication['publication_status']) {
                $publicationData[$publication['publication_id']] = $publication['publication_title'];
            }
		}

		return $publicationData;
	}

}