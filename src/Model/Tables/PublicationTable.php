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

class PublicationTable extends MelisGenericTable
{
    protected $tableGateway;
    protected $idField;

    public function __construct(TableGateway $tableGateway)
    {
        parent::__construct($tableGateway);
        $this->idField = 'publication_id';
    }

    public function getPublication($publicationId, $langId = null)
    {
        $select = $this->tableGateway->getSql()->select();
        $clause = array();

        /**
         * TEMPORARY FIXED
         */
        $publication_text_cols = array(
            'publication_text_id',
            'publication_title',
            'publication_paragraph',
            'publication_lang_id',
        );

        $select->join('melis_cms_site', 'melis_cms_site.site_id = publication.publication_site_id', array('site_name'), $select::JOIN_LEFT);
        $select->join('publication_texts', 'publication_texts.publication_id = publication.publication_id','*', $select::JOIN_LEFT);

        $select->where('publication.publication_id =' . $publicationId);

        if (!is_null($langId))
        {
            $select->where('publication_texts.publication_lang_id ='.$langId);
        }

        $resultData = $this->tableGateway->selectWith($select);
        return $resultData;
    }

    public function getPublicationsList(
        $status = null, $langId = null, $dateMin = null, $dateMax = null, $publishDateMin = null,
        $publishDateMax = null, $unpublishFilter = false, $start = null, $limit = null,
        $orderColumn = null, $order = null, $siteId = null, $search = null
    )

    {
        $select = $this->tableGateway->getSql()->select();

        /**
         * TEMPORARY FIXED
         */

        $select->join('melis_cms_site', 'melis_cms_site.site_id = publication.publication_site_id', array('site_name'), $select::JOIN_LEFT);
        $select->join('publication_texts', 'publication_texts.publication_id = publication.publication_id', '*', $select::JOIN_LEFT);

        if(!is_null($search)){
            $search = '%'.$search.'%';
            $select->where->NEST->like('publication.publication_id', $search)
            ->or->like('publication_texts.publication_title', $search);
        }

        if(!is_null($siteId)){
            $select->where->equalTo('publication_site_id', $siteId);
        }

        if (!is_null($status))
        {
            $select->where('publication_status ='.$status);
        }

        if (!is_null($langId))
        {
            $select->where('publication_texts.publication_lang_id ='.$langId);
        }

        if (!is_null($dateMin))
        {
            $select->where('publication_creation_date >= "'.$dateMin.'"');
        }

        if (!is_null($dateMax))
        {
            $select->where('publication_creation_date <= "'.$dateMax.'"');
        }

        if (!is_null($limit))
        {
            $select->limit( (int) $limit);
        }

        if (!is_null($start))
        {
            $select->offset($start);
        }

        if (!is_null($orderColumn) && !is_null($order))
        {
            if($orderColumn == 'publication_title') {
                $select->order('publication_texts.'.$orderColumn.' '.$order);   // Ordering is temporarily Static to publication table
            } elseif ($orderColumn == 'site_name')  {
                $select->order('melis_cms_site.'.$orderColumn.' '.$order);   // Ordering is temporarily Static to publication table
            } else {
                $select->order('publication.'.$orderColumn.' '.$order);   // Ordering is temporarily Static to publication table
            }

        }

        $select->where('publication_texts.publication_title !=""');

//        var_dump($this->getRawSql($select));die;

        $resultData = $this->tableGateway->selectWith($select);

        return $resultData;
    }

    public function checkForDuplicates($search)
    {
        $search = '%'.$search.'%';
        $sql = "select Number From
        (select publication_documents1 as Number from publication WHERE publication_documents1 LIKE '". $search ."'
        union all
        select publication_image1  as Number from publication WHERE publication_image1 LIKE '". $search ."'
        ) myTab";

        $resultData = $this->tableGateway->getAdapter()->driver->getConnection()->execute($sql);
        return $resultData;
    }

    public function getPublicationsListByMonths($limit = null, $siteId = null)
    {
        $select = $this->tableGateway->getSql()->select();

        $select->columns(array(
            new Expression('MONTH(publication_date) AS month'),
            new Expression('YEAR(publication_date) AS year'),
        ));
        $select->where(array('publication_status' => '1'));

        if(!is_null($siteId)){
            $select->where->equalTo('publication_site_id', $siteId);
        }

        $select->group(array('month', 'year'));
        $select->order(new Expression('month + " " + year'), 'DESC');


        if (!is_null($limit))
        {
            $select->limit($limit);
        }


        $resultData = $this->tableGateway->selectWith($select);
        return $resultData;
    }

    public function getPublicationsByMonthYear($month, $year, $limit = null, $siteId = null)
    {
        $select = $this->tableGateway->getSql()->select();

        $select->join('publication_texts', 'publication_texts.publication_id = publication.publication_id', array('publication_id', 'publication_title'), $select::JOIN_LEFT);

        $select->where(array('publication_status' => '1'));

        if(!is_null($siteId)){
            $select->where->equalTo('publication_site_id', $siteId);
        }

        $select->where('MONTH(publication_date) = '.$month);
        $select->where('YEAR(publication_date) ='.$year);

        $select->order(array('publication_date' => 'DESC'));
        if (!is_null($limit))
        {
            $select->limit($limit);
        }


        $resultData = $this->tableGateway->selectWith($select);
        return $resultData;
    }


    /**
     * get last news record
     * @return Object
     */
    public function getLastPublication()
    {
        $select = $this->tableGateway->getSql()->select();

        $select->order(array('publication_id' => 'DESC'));

        $select->limit(1);

        return $this->tableGateway->selectWith($select);
    }

     /**
     * get last news record
     * @return Object
     */
    public function getPublicationData($where)
    {
        $select = $this->tableGateway->getSql()->select();

        $select->join('publication_texts', 'publication_texts.publication_id = publication.publication_id', array('publication_title', 'publication_lang_id'), $select::JOIN_LEFT);

        $select->where($where);

        return $this->tableGateway->selectWith($select);
    }

}