<?php

return array(
    'plugins' => array(
        'meliscore' => array(
            'datas' => array(),
            'interface' => array(
                'meliscore_leftmenu' => array(
                    'interface' => array(
        			    'meliscore_toolstree' =>  array(
        			    	'interface' => array(
								'lbpam_tools_section' => array(
                                    'conf' => array(
                                        'id' => 'id_lbpam_tools_section',
                                        'name' => 'Lbpam Apps',
                                        'icon' => 'fa-cubes',
                                        'rights_checkbox_disable' => true,
                                    ),
        			    			'interface' => array(
		        			    		'publication_left' => array(
		        			    			'conf' => array(
		        			    				'type' => '/publication/interface/publications_list/interface/publications_left_menu',
		        			    			),
		        			    		),
        			    			),
								),
        			    	),
        			    ),
                    ),
                ),
            ),
        ),
		'meliscore_dashboard' => array(),
        'publication' => array(
            'conf' => array(
                'id' => '',
                'name' => 'tr_Publications_manager',
                'rightsDisplay' => 'none',
                'paragraphs_conf' => array(
                    'max' => 1,
                    'name' => 'publication_paragraph',
                ),
                'files' => array(
                    'minUploadSize' => 1,
                    'maxUploadSize' => 10500000,
                    'imagesPath' => '/media/publications/',
                ),
                'images_conf' => array(
                    'max' => 1,
                    'name' => 'publication_image',
                ),
                'documents_conf' => array(
                    'max' => 1,
                    'name' => 'publication_documents',
                ),
            ),
            'ressources' => array(
                'js' => array(
                    '/Publications/js/tools/publications.tool.js',
                    '/Publications/assets/switch/bootstrap-switch.js',
                ),

                'css' => array(
                    '/Publications/css/news.css',
                ),
                /**
                 * the "build" configuration compiles all assets into one file to make
                 * lesser requests
                 */
                'build' => [
                    'disable_bundle' => true,
                    // lists of assets that will be loaded in the layout
                    'css' => [
                        '/Publications/build/css/bundle.css',

                    ],
                    'js' => [
                        '/Publications/build/js/bundle.js',
                    ]
                ]
            ),
            'datas' => array(

            ),
            'interface' => array(
                'publications_list' => array(
                    'conf' => array(
                        'name' => 'tr_publications_list',
                        'rightsDisplay' => 'referencesonly',
                    ),
                    'interface' => array(
                        'publications_left_menu' => array(
                            'conf' => array(
                                'id' => 'id_publications_left_menu',
                                'name' => 'tr_publications_list_header_title',
                                'melisKey' => 'publications_left_menu',
                                'icon' => 'fa-list-alt',
                                'rights_checkbox_disable' => true,
                                'follow_regular_rendering' => false,
                            ),
                            'forward' => array(
                                'module' => 'Publications',
                                'controller' => 'PublicationsList',
                                'action' => 'render-list-page',
                                'jscallback' => '',
                                'jsdatas' => array()
                            ),
                            'interface' => array(
                                'publications_list_header' => array(
                                    'conf' => array(
                                        'id' => 'id_publications_list_header',
                                        'melisKey' => 'publications_list_header',
                                        'name' => 'tr_publications_list_header',
                                    ),
                                    'forward' => array(
                                        'module' => 'Publications',
                                        'controller' => 'PublicationsList',
                                        'action' => 'render-list-header',
                                    ),
                                    'interface' => array(
                                        'publications_list_header_left' => array(
                                            'conf' => array(
                                                'id' => 'id_publications_list_header_left',
                                                'melisKey' => 'publications_list_header_left',
                                                'name' => 'tr_publications_list_header_left',
                                            ),
                                            'forward' => array(
                                                'module' => 'Publications',
                                                'controller' => 'PublicationsList',
                                                'action' => 'render-list-header-left',
                                            ),
                                            'interface' => array(
                                                'publications_list_header_title' => array(
                                                    'conf' => array(
                                                        'id' => 'id_publications_list_header_title',
                                                        'melisKey' => 'publications_list_header_title',
                                                        'name' => 'tr_publications_list_header_title',
                                                    ),
                                                    'forward' => array(
                                                        'module' => 'Publications',
                                                        'controller' => 'PublicationsList',
                                                        'action' => 'render-list-header-title',
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'publications_list_header_right' => array(
                                            'conf' => array(
                                                'id' => 'id_publications_list_header_right',
                                                'melisKey' => 'publications_list_header_right',
                                                'name' => 'tr_publications_list_header_right',
                                            ),
                                            'forward' => array(
                                                'module' => 'Publications',
                                                'controller' => 'PublicationsList',
                                                'action' => 'render-list-header-right',
                                            ),
                                            'interface' => array(
                                                'publications_list_header_right_add' => array(
                                                    'conf' => array(
                                                        'id' => 'id_publications_list_header_right_add',
                                                        'melisKey' => 'publications_list_header_right_add',
                                                        'name' => 'tr_publications_list_header_right_add',
                                                    ),
                                                    'forward' => array(
                                                        'module' => 'Publications',
                                                        'controller' => 'PublicationsList',
                                                        'action' => 'render-list-header-right-add',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                                'publications_list_content' => array(
                                    'conf' => array(
                                        'id' => 'id_publications_list_content',
                                        'melisKey' => 'publications_list_content',
                                        'name' => 'tr_publications_list_content',
                                    ),
                                    'forward' => array(
                                        'module' => 'Publications',
                                        'controller' => 'PublicationsList',
                                        'action' => 'render-list-content',
                                    ),
                                    'interface' => array(
                                        'publications_list_content_table' => array(
                                            'conf' => array(
                                                'id' => 'id_publications_list_content_table',
                                                'melisKey' => 'publications_list_content_table',
                                                'name' => 'tr_publications_list_content_table',
                                            ),
                                            'forward' => array(
                                                'module' => 'Publications',
                                                'controller' => 'PublicationsList',
                                                'action' => 'render-list-content-table',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'publication' => array(
                    'interface' => array(
                        'publication_page' => array(
                            'conf' => array(
                                'id' => 'id_publication_page',
                                'melisKey' => 'publication_page',
                                'name' => 'tr_publications_list_header_title',
                            ),
                            'forward' => array(
                                'module' => 'Publications',
                                'controller' => 'Publication',
                                'action' => 'render-page',
                            ),
                            'interface' => array(
                                'publication_header' => array(
                                    'conf' => array(
                                        'id' => 'id_publications_header',
                                        'melisKey' => 'publication_header',
                                        'name' => 'tr_publications_header',
                                    ),
                                    'forward' => array(
                                        'module' => 'Publications',
                                        'controller' => 'Publication',
                                        'action' => 'render-header',
                                    ),
                                    'interface' => array(
                                        'publication_header_left' => array(
                                            'conf' => array(
                                                'id' => 'id_publications_header_left',
                                                'melisKey' => 'publication_header_left',
                                                'name' => 'tr_publications_header_left',
                                            ),
                                            'forward' => array(
                                                'module' => 'Publications',
                                                'controller' => 'Publication',
                                                'action' => 'render-header-left',
                                            ),
                                            'interface' => array(
                                                'publication_header_title' => array(
                                                    'conf' => array(
                                                        'id' => 'id_publications_header_title',
                                                        'melisKey' => 'publication_header_title',
                                                        'name' => 'tr_publications_header_title',
                                                    ),
                                                    'forward' => array(
                                                        'module' => 'Publications',
                                                        'controller' => 'Publication',
                                                        'action' => 'render-header-title',
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'publication_header_right' => array(
                                            'conf' => array(
                                                'id' => 'id_publications_header_right',
                                                'melisKey' => 'publication_header_right',
                                                'name' => 'tr_publications_header_right',
                                            ),
                                            'forward' => array(
                                                'module' => 'Publications',
                                                'controller' => 'Publication',
                                                'action' => 'render-header-right',
                                            ),
                                            'interface' => array(
                                                'publication_header_right_save' => array(
                                                    'conf' => array(
                                                        'id' => 'id_publications_header_right_save',
                                                        'melisKey' => 'publication_header_right_save',
                                                        'name' => 'tr_publications_header_right_save',
                                                    ),
                                                    'forward' => array(
                                                        'module' => 'Publications',
                                                        'controller' => 'Publication',
                                                        'action' => 'render-header-right-save',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                                'publication_content' => array(
                                    'conf' => array(
                                        'id' => 'id_publications_content',
                                        'melisKey' => 'publication_content',
                                        'name' => 'tr_publications_content',
                                    ),
                                    'forward' => array(
                                        'module' => 'Publications',
                                        'controller' => 'Publication',
                                        'action' => 'render-page-content',
                                    ),
                                    'interface' => array(
                                        'publication_content_tabs_properties' => array(
                                            'conf' => array(
                                                'id' => 'id_publications_content_tabs_properties',
                                                'melisKey' => 'publication_content_tabs_properties',
                                                'name' => 'tr_publications_content_tabs_properties',
                                                'icon' => 'glyphicons tag',
                                            ),
                                            'forward' => array(
                                                'module' => 'Publications',
                                                'controller' => 'Publication',
                                                'action' => 'render-page-tabs-main',
                                            ),
                                            'interface' => array(
                                                'publication_content_tabs_properties_header' => array(
                                                    'conf' => array(
                                                        'id' => 'id_publications_content_tabs_properties_header',
                                                        'melisKey' => 'publication_content_tabs_properties_header',
                                                        'name' => 'tr_publications_content_tabs_properties_header',
                                                    ),
                                                    'forward' => array(
                                                        'module' => 'Publications',
                                                        'controller' => 'Publication',
                                                        'action' => 'render-tabs-content-header',
                                                    ),
                                                    'interface' => array(
                                                        'publication_content_tabs_properties_header_left' => array(
                                                            'conf' => array(
                                                                'id' => 'id_publications_content_tabs_properties_header_left',
                                                                'melisKey' => 'publication_content_tabs_properties_header_left',
                                                                'name' => 'tr_publications_content_tabs_properties_header_left',
                                                            ),
                                                            'forward' => array(
                                                                'module' => 'Publications',
                                                                'controller' => 'Publication',
                                                                'action' => 'render-tabs-content-header-left',
                                                            ),
                                                            'interface' => array(
                                                                'publication_content_tabs_properties_header_title' => array(
                                                                    'conf' => array(
                                                                        'id' => 'id_publications_content_tabs_properties_header_title',
                                                                        'melisKey' => 'publication_content_tabs_properties_header_title',
                                                                        'name' => 'tr_publications_content_tabs_properties',
                                                                    ),
                                                                    'forward' => array(
                                                                        'module' => 'Publications',
                                                                        'controller' => 'Publication',
                                                                        'action' => 'render-tabs-content-header-title',
                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                                        'publication_content_tabs_properties_header_right' => array(
                                                            'conf' => array(
                                                                'id' => 'id_publications_content_tabs_properties_header_right',
                                                                'melisKey' => 'publication_content_tabs_properties_header_right',
                                                                'name' => 'tr_publications_content_tabs_properties_header_right',
                                                            ),
                                                            'forward' => array(
                                                                'module' => 'Publications',
                                                                'controller' => 'Publication',
                                                                'action' => 'render-tabs-content-header-left',
                                                            ),
                                                            'interface' => array(
                                                                'publication_content_tabs_properties_header_status' => array(
                                                                    'conf' => array(
                                                                        'id' => 'id_publications_content_tabs_properties_header_status',
                                                                        'melisKey' => 'publication_content_tabs_properties_header_status',
                                                                        'name' => 'tr_publications_content_tabs_properties_header_status',
                                                                    ),
                                                                    'forward' => array(
                                                                        'module' => 'Publications',
                                                                        'controller' => 'Publication',
                                                                        'action' => 'render-tabs-content-header-status',
                                                                    ),
                                                                    'interface' => array(
                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                                'publication_content_tabs_properties_details' => array(
                                                    'conf' => array(
                                                        'id' => 'id_publications_content_tabs_properties_details',
                                                        'melisKey' => 'publication_content_tabs_properties_details',
                                                        'name' => 'tr-publication_content_tabs_properties_details',
                                                    ),
                                                    'forward' => array(
                                                        'module' => 'Publications',
                                                        'controller' => 'Publication',
                                                        'action' => 'render-tabs-content-details',
                                                    ),
                                                    'interface' => array(
                                                        'publication_content_tabs_properties_details_main' => array(
                                                            'conf' => array(
                                                                'id' => 'id_publications_content_tabs_properties_details_main',
                                                                'melisKey' => 'publication_content_tabs_properties_details_main',
                                                                'name' => 'tr_publications_content_tabs_properties_details_main',
                                                            ),
                                                            'forward' => array(
                                                                'module' => 'Publications',
                                                                'controller' => 'Publication',
                                                                'action' => 'render-tabs-properties-details-main',
                                                            ),
                                                            'interface' => array(
                                                                'publication_content_tabs_properties_details_left' => array(
                                                                    'conf' => array(
                                                                        'id' => 'id_publications_content_tabs_properties_details_left',
                                                                        'melisKey' => 'publication_content_tabs_properties_details_left',
                                                                        'name' => 'tr_publications_content_tabs_properties_details_left',
                                                                    ),
                                                                    'forward' => array(
                                                                        'module' => 'Publications',
                                                                        'controller' => 'Publication',
                                                                        'action' => 'render-tabs-properties-details-left',
                                                                    ),
                                                                    'interface' => array(
                                                                        'publication_content_tabs_properties_details_left_properties' => array(
                                                                            'conf' => array(
                                                                                'id' => 'id_publications_content_tabs_properties_details_left_properties',
                                                                                'melisKey' => 'publication_content_tabs_properties_details_left_properties',
                                                                                'name' => 'tr_publications_content_tabs_properties_details_left_properties',
                                                                            ),
                                                                            'forward' => array(
                                                                                'module' => 'Publications',
                                                                                'controller' => 'Publication',
                                                                                'action' => 'render-tabs-properties-details-left-properties',
                                                                            ),
                                                                        ),
                                                                    ),
                                                                ),
                                                                'publication_content_tabs_properties_details_right' => array(
                                                                    'conf' => array(
                                                                        'id' => 'id_publications_content_tabs_properties_details_right',
                                                                        'melisKey' => 'publication_content_tabs_properties_details_right',
                                                                        'name' => 'tr_publications_content_tabs_properties_details_right',
                                                                    ),
                                                                    'forward' => array(
                                                                        'module' => 'Publications',
                                                                        'controller' => 'Publication',
                                                                        'action' => 'render-tabs-properties-details-right',
                                                                    ),
                                                                    'interface' => array(
                                                                        'publication_content_tabs_properties_details_left_sites' => array(
                                                                            'conf' => array(
                                                                                'id' => 'id_publications_content_tabs_properties_details_left_sites',
                                                                                'melisKey' => 'publication_content_tabs_properties_details_left_sites',
                                                                                'name' => 'tr_publications_content_tabs_properties_details_left_sites',
                                                                            ),
                                                                            'forward' => array(
                                                                                'module' => 'Publications',
                                                                                'controller' => 'Publication',
                                                                                'action' => 'render-tabs-properties-details-left-sites',
                                                                            ),
                                                                        ),
                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'publication_content_tabs_medias' => array(
                                            'conf' => array(
                                                'id' => 'id_publication_content_tabs_medias',
                                                'melisKey' => 'publication_content_tabs_medias',
                                                'name' => 'tr_publications_content_tabs_medias',
                                                'icon' => 'glyphicons picture',
                                            ),
                                            'forward' => array(
                                                'module' => 'Publications',
                                                'controller' => 'Publication',
                                                'action' => 'render-page-tabs-main',
                                            ),
                                            'interface' => array(
                                                'publication_content_tabs_medias_header' => array(
                                                    'conf' => array(
                                                        'id' => 'id_publication_content_tabs_medias_header',
                                                        'melisKey' => 'publication_content_tabs_medias_header',
                                                    ),
                                                    'forward' => array(
                                                        'module' => 'Publications',
                                                        'controller' => 'Publication',
                                                        'action' => 'render-tabs-content-header',
                                                    ),
                                                    'interface' => array(
                                                        'publication_content_tabs_medias_header_left' => array(
                                                            'conf' => array(
                                                                'id' => 'id_publication_content_tabs_medias_header_left',
                                                                'melisKey' => 'publication_content_tabs_medias_header_left',
                                                            ),
                                                            'forward' => array(
                                                                'module' => 'Publications',
                                                                'controller' => 'Publication',
                                                                'action' => 'render-tabs-content-header-left',
                                                            ),
                                                            'interface' => array(
                                                                'publication_content_tabs_medias_header_title' => array(
                                                                    'conf' => array(
                                                                        'id' => 'id_publication_content_tabs_medias_header_title',
                                                                        'melisKey' => 'publication_content_tabs_medias_header_title',
                                                                        'name' => 'tr_publications_content_tabs_medias',
                                                                    ),
                                                                    'forward' => array(
                                                                        'module' => 'Publications',
                                                                        'controller' => 'Publication',
                                                                        'action' => 'render-tabs-content-header-title',
                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                                        'publication_content_tabs_medias_header_right' => array(
                                                            'conf' => array(
                                                                'id' => 'id_publication_content_tabs_medias_header_right',
                                                                'melisKey' => 'publication_content_tabs_medias_header_right',
                                                            ),
                                                            'forward' => array(
                                                                'module' => 'Publications',
                                                                'controller' => 'Publication',
                                                                'action' => 'render-tabs-content-header-left',
                                                            ),
                                                            'interface' => array(
                                                                'publication_content_tabs_medias_details' => array(
                                                                    'conf' => array(
                                                                        'id' => 'id_publication_content_tabs_medias_details',
                                                                        'melisKey' => 'publication_content_tabs_medias_details',
                                                                    ),
                                                                    'forward' => array(
                                                                        'module' => 'Publications',
                                                                        'controller' => 'Publication',
                                                                        'action' => 'render-tabs-content-details',
                                                                    ),
                                                                    'interface' => array(

                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                                'publication_content_tabs_medias_details_main' => array(
                                                    'conf' => array(
                                                        'id' => 'id_publication_content_tabs_medias_details_main',
                                                        'melisKey' => 'publication_content_tabs_medias_details_main',
                                                    ),
                                                    'forward' => array(
                                                        'module' => 'Publications',
                                                        'controller' => 'Publication',
                                                        'action' => 'render-tabs-properties-details-main',
                                                    ),
                                                    'interface' => array(
                                                        'publication_content_tabs_medias_details_left' => array(
                                                            'conf' => array(
                                                                'id' => 'id_publication_content_tabs_medias_details_left',
                                                                'melisKey' => 'publication_content_tabs_medias_details_left',
                                                            ),
                                                            'forward' => array(
                                                                'module' => 'Publications',
                                                                'controller' => 'Publication',
                                                                'action' => 'render-tabs-properties-details-left',
                                                            ),
                                                            'interface' => array(
                                                                'publication_content_tabs_properties_details_left_images' => array(
                                                                    'conf' => array(
                                                                        'id' => 'id_publication_content_tabs_properties_details_left_images',
                                                                        'melisKey' => 'publication_content_tabs_properties_details_left_images',
                                                                        'name' => 'tr_publications_content_tabs_properties_details_left_images',
                                                                    ),
                                                                    'forward' => array(
                                                                        'module' => 'Publications',
                                                                        'controller' => 'Publication',
                                                                        'action' => 'render-tabs-properties-details-left-images',
                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                                        'publication_content_tabs_medias_details_right' => array(
                                                            'conf' => array(
                                                                'id' => 'id_publication_content_tabs_medias_details_right',
                                                                'melisKey' => 'publication_content_tabs_medias_details_right',
                                                            ),
                                                            'forward' => array(
                                                                'module' => 'Publications',
                                                                'controller' => 'Publication',
                                                                'action' => 'render-tabs-properties-details-right',
                                                            ),
                                                            'interface' => array(
                                                                'publication_content_tabs_properties_details_left_documents' => array(
                                                                    'conf' => array(
                                                                        'id' => 'id_publication_content_tabs_properties_details_left_documents',
                                                                        'melisKey' => 'publication_content_tabs_properties_details_left_documents',
                                                                        'name' => 'tr_publications_content_tabs_properties_details_left_documents',
                                                                    ),
                                                                    'forward' => array(
                                                                        'module' => 'Publications',
                                                                        'controller' => 'Publication',
                                                                        'action' => 'render-tabs-properties-details-left-documents',
                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'publication_content_tabs_texts' => array(
                                            'conf' => array(
                                                'id' => 'id_publications_content_tabs_texts',
                                                'melisKey' => 'publication_content_tabs_texts',
                                                'name' => 'tr_publications_content_tabs_texts',
                                                'icon' => 'glyphicons pencil',
                                            ),
                                            'forward' => array(
                                                'module' => 'Publications',
                                                'controller' => 'Publication',
                                                'action' => 'render-page-tabs-main',
                                            ),
                                            'interface' => array(
                                                'publication_content_tabs_texts_header' => array(
                                                    'conf' => array(
                                                        'id' => 'id_publications_content_tabs_texts_header',
                                                        'melisKey' => 'publication_content_tabs_texts_header',
                                                    ),
                                                    'forward' => array(
                                                        'module' => 'Publications',
                                                        'controller' => 'Publication',
                                                        'action' => 'render-tabs-content-header',
                                                    ),
                                                    'interface' => array(
                                                        'publication_content_tabs_texts_header_left' => array(
                                                            'conf' => array(
                                                                'id' => 'id_publications_content_tabs_texts_header_left',
                                                                'melisKey' => 'publication_content_tabs_texts_header_left',
                                                            ),
                                                            'forward' => array(
                                                                'module' => 'Publications',
                                                                'controller' => 'Publication',
                                                                'action' => 'render-tabs-content-header-left',
                                                            ),
                                                            'interface' => array(
                                                                'publication_content_tabs_texts_header_title' => array(
                                                                    'conf' => array(
                                                                        'id' => 'id_publications_content_tabs_texts_header_title',
                                                                        'melisKey' => 'publication_content_tabs_texts_header_title',
                                                                        'name' => 'tr_publications_content_tabs_texts',
                                                                    ),
                                                                    'forward' => array(
                                                                        'module' => 'Publications',
                                                                        'controller' => 'Publication',
                                                                        'action' => 'render-tabs-content-header-title',
                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                                        'publication_content_tabs_texts_header_right' => array(
                                                            'conf' => array(
                                                                'id' => 'id_publications_content_tabs_texts_header_right',
                                                                'melisKey' => 'publication_content_tabs_texts_header_right',
                                                            ),
                                                            'forward' => array(
                                                                'module' => 'Publications',
                                                                'controller' => 'Publication',
                                                                'action' => 'render-tabs-content-header-left',
                                                            ),
                                                            'interface' => array(
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                                'publication_content_tabs_medias_details_main' => array(
                                                    'conf' => array(
                                                        'id' => 'id_publications_content_tabs_medias_details_main',
                                                        'melisKey' => 'publication_content_tabs_medias_details_main',
                                                    ),
                                                    'forward' => array(
                                                        'module' => 'Publications',
                                                        'controller' => 'Publication',
                                                        'action' => 'render-tabs-properties-details-main',
                                                    ),
                                                    'interface' => array(
                                                        'publication_content_tabs_properties_details_right_paragraphs' => array(
                                                            'conf' => array(
                                                                'id' => 'id_publications_content_tabs_properties_details_right_paragraphs',
                                                                'melisKey' => 'publication_content_tabs_properties_details_right_paragraphs',
                                                                'name' => 'tr_publications_content_tabs_properties_details_right_paragraphs',
                                                            ),
                                                            'forward' => array(
                                                                'module' => 'Publications',
                                                                'controller' => 'Publication',
                                                                'action' => 'render-tabs-properties-details-right-paragraphs',
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'publication_modal' => array(
                    'conf' => array(
                        'id' => 'id_publication_modal',
                        'name' => 'tr_publications_modal',
                        'melisKey' => 'publication_modal',
                    ),
                    'forward' => array(
                        'module' => 'Publications',
                        'controller' => 'Publication',
                        'action' => 'render-modal',
                    ),
                    'interface' => array(
                        'publication_modal_documents_form' => array(
                            'conf' => array(
                                'id' => 'id_publication_modal_documents_form',
                                'name' => 'tr_publications_add_file',
                                'melisKey' => 'publication_modal_documents_form',
                            ),
                            'forward' => array(
                                'module' => 'Publications',
                                'controller' => 'Publication',
                                'action' => 'render-modal-form',
                            ),
                        ),
                        'publication_modal_documents_form_image' => array(
                            'conf' => array(
                                'id' => 'id_publication_modal_documents_form_image',
                                'name' => 'tr_publications_modal_documents_form_image',
                                'melisKey' => 'publication_modal_documents_form_image',
                            ),
                            'forward' => array(
                                'module' => 'Publications',
                                'controller' => 'Publication',
                                'action' => 'render-modal-form',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);