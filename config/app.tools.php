<?php

return array(
    'plugins' => array(
        'publication' => array(
            'tools' => array(
                'publications_list_table' => array(
                    'table' => array(
                        'target' => '#publicationsList',
                        'ajaxUrl' => '/melis/Publications/PublicationsList/renderListData',
                        'dataFunction' => 'initPublicationsList',
                        'ajaxCallback' => '',
                        'filters' => array(
                            'left' => array(
                                'publications-list-publications-filter-limit' => array(
                                    'module' => 'Publications',
                                    'controller' => 'PublicationsList',
                                    'action' => 'render-list-content-filter-limit'
                                ),
                                'publications-list-publications-filter-site' => array(
                                    'module' => 'Publications',
                                    'controller' => 'PublicationsList',
                                    'action' => 'render-list-content-filter-site'
                                ),
                            ),

                            'center' => array(
                                'publications-list-publications-filter-search' => array(
                                    'module' => 'Publications',
                                    'controller' => 'PublicationsList',
                                    'action' => 'render-list-content-filter-search'
                                ),
                            ),

                            'right' => array(
                                'publications-list-publications-filter-refresh' => array(
                                    'module' => 'Publications',
                                    'controller' => 'PublicationsList',
                                    'action' => 'render-list-content-filter-refresh'
                                ),
                            ),
                        ),

                        'columns' => array(
                            'publication_id' => array(
                                'text' => 'tr_publications_list_col_id',
                                'css' => array('width' => '1%', 'padding-right' => '0'),
                                'sortable' => true,
                            ),
                            'publication_status' => array(
                                'text' => 'tr_publications_list_col_status',
                                'css' => array('width' => '1%', 'padding-right' => '0'),
                                'sortable' => true,
                            ),
                            'publication_title' => array(
                                'text' => 'tr_publications_list_col_title',
                                'css' => array('width' => '30%', 'padding-right' => '0'),
                                'sortable' => true,
                            ),
                            'publication_creation_date' => array(
                                'text' => 'tr_publications_list_col_date',
                                'css' => array('width' => '10%', 'padding-right' => '0'),
                                'sortable' => true,
                            ),
                            'publication_date' => array(
                                'text' => 'tr_publications_list_col_publication_date',
                                'css' => array('width' => '10%', 'padding-right' => '0'),
                                'sortable' => true,
                            ),
                            'site_name' => array(
                                'text' => 'tr_publications_site_title',
                                'css' => array('width' => '10%', 'padding-right' => '0'),
                                'sortable' => true,
                            ),
                        ),

                        'searchables' => array(),
                        'actionButtons' => array(
                            'info' => array(
                                'module' => 'Publications',
                                'controller' => 'PublicationsList',
                                'action' => 'render-list-content-action-info'
                            ),
                            'delete' => array(
                                'module' => 'Publications',
                                'controller' => 'PublicationsList',
                                'action' => 'render-list-content-action-delete'
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);
