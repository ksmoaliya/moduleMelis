<?php

/**
 * Melis Technology (http://www.melistechnology.com)
 *
 * @copyright Copyright (c) 2016 Melis Technology (http://www.melistechnology.com)
 *
 */

namespace Publications\Model\Tables;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Expression;
use MelisEngine\Model\Tables\MelisGenericTable;

class PublicationTextsTable extends MelisGenericTable
{
    protected $tableGateway;
    protected $idField;
    
    public function __construct(TableGateway $tableGateway)
    {
        parent::__construct($tableGateway);
        $this->idField = 'publication_text_id';
    }

    public function updatePublicationText($set, $where)
    {
        $update = $this->tableGateway->getSql()->update();
        $update->set($set);
        $update->where($where);

        // Execute the query
        return $this->tableGateway->updateWith($update);
    }

    /**
     * get last news record
     * @return Object
     */
    public function getPublicationDataByCnd($where, $title = null)
    {
        $select = $this->tableGateway->getSql()->select();
        if ($title) {
             $select->where('publication_title !=""');
        }
       
        $select->where($where);

        return $this->tableGateway->selectWith($select);
    }


}