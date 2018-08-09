<?php

/**
 * Melis Technology (http://www.melistechnology.com)
 *
 * @copyright Copyright (c) 2016 Melis Technology (http://www.melistechnology.com)
 *
 */
namespace Publications\Model\Tables\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Stdlib\Hydrator\ObjectProperty;
use Publications\Model\PublicationTexts;
use Publications\Model\Tables\PublicationTextsTable;

class PublicationTextsTableFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $sl)
    {
        $hydratingResultSet = new HydratingResultSet(new ObjectProperty(), new PublicationTexts());
        $tableGateway = new TableGateway('publication_texts', $sl->get('Zend\Db\Adapter\Adapter'), null, $hydratingResultSet);
        
        return new PublicationTextsTable($tableGateway);
    }
}