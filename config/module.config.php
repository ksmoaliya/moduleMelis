<?php

/**
 * Melis Technology (http://www.melistechnology.com)
 *
 * @copyright Copyright (c) 2015 Melis Technology (http://www.melistechnology.com)
 *
 */

return array(
    'router' => array(
        'routes' => array(
            'melis-backoffice' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/melis[/]',
                ),
                'child_routes' => array(
                    'application-publication' => array(
                        'type'    => 'Literal',
                        'options' => array(
                            'route'    => 'Publications',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Publications\Controller',
                                'controller'    => 'CustomEdition',
                                'action'        => 'renderCustomTableEditor',
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'default' => array(
                                'type'    => 'Segment',
                                'options' => array(
                                    'route'    => '/[:controller[/:action]]',
                                    'constraints' => array(
                                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    ),
                                    'defaults' => array(
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'translator' => array(
    	'locale' => 'en_EN',
	),
    'service_manager' => array(
        'invokables' => array(

        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
            'PublicationTable' => 'Publications\Model\Tables\PublicationTable',
            'PublicationTextsTable' => 'Publications\Model\Tables\PublicationTextsTable',
        ),
        'factories' => array(
            //services
            'PublicationsService' => 'Publications\Service\Factory\PublicationsServiceFactory',

            //tables
            'Publications\Model\Tables\PublicationTable' => 'Publications\Model\Tables\Factory\PublicationTableFactory',
            'Publications\Model\Tables\PublicationTextsTable' => 'Publications\Model\Tables\Factory\PublicationTextsTableFactory',
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Publications\Controller\PublicationsList' => 'Publications\Controller\PublicationsListController',
            'Publications\Controller\Publication' => 'Publications\Controller\PublicationController',
            ),
    ),
    'controller_plugins' => array(
        'invokables' => array(
            'LatestPublicationsPlugin' => 'Publications\Controller\Plugin\PublicationsLatestPublicationsPlugin',
            'ListPublicationsPlugin' => 'Publications\Controller\Plugin\ListPublicationsPlugin',
        )
    ),

    'form_elements' => array(
        'factories' => array(
            'PublicationsSelect' => 'Publications\Form\Factory\PublicationSelectFactory',
            'MelisCmsSitePublicationSelect' => 'Publications\Form\Factory\MelisCmsSitePublicationSelectFactory',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'template_map' => array(
            'Publications/listpublications'                             => __DIR__ . '/../view/publications/plugins/listpublications.phtml',
            'Publications/showpublication'                             => __DIR__ . '/../view/publications/plugins/showpublication.phtml',
            'Publications/list-paginator'                       => __DIR__ . '/../view/publications/plugins/list-paginator.phtml',
            'Publications/plugin/modal/modal-filter-form'       => __DIR__ . '/../view/publications/plugins/modal-filter-form.phtml',
            'Publication/plugin/modal/modal-pagination-form'   => __DIR__ . '/../view/publications/plugins/modal-pagination-form.phtml',
            'Publications/plugin/modal/modal-template-form'     => __DIR__ . '/../view/publications/plugins/modal-template-form.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
);
