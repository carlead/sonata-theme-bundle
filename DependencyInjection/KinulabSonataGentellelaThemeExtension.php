<?php

namespace Carlead\SonataThemeBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class CarleadSonataThemeBundleExtension extends Extension implements PrependExtensionInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
    }

    public function prepend(ContainerBuilder $container)
    {
        $bundles = $container->getParameter('kernel.bundles');
        if (isset($bundles['SonataAdminBundle'])) {
            $config = [
                'templates' => [
                    'user_block'                    => '@CarleadSonataThemeBundle/Core/user_block.html.twig',
                    'add_block'                     => '@CarleadSonataThemeBundle/Core/add_block.html.twig',
                    'layout'                        => '@CarleadSonataThemeBundle/standard_layout.html.twig',
                    'ajax'                          => '@CarleadSonataThemeBundle/ajax_layout.html.twig',
                    'dashboard'                     => '@CarleadSonataThemeBundle/Core/dashboard.html.twig',
                    'search'                        => '@CarleadSonataThemeBundle/Core/search.html.twig',
                    'list'                          => '@CarleadSonataThemeBundle/CRUD/list.html.twig',
                    'filter'                        => '@CarleadSonataThemeBundle/Form/filter_admin_fields.html.twig',
                    'show'                          => '@CarleadSonataThemeBundle/CRUD/show.html.twig',
                    'show_compare'                  => '@CarleadSonataThemeBundle/CRUD/show_compare.html.twig',
                    'edit'                          => '@CarleadSonataThemeBundle/CRUD/edit.html.twig',
                    'history'                       => '@CarleadSonataThemeBundle/CRUD/history.html.twig',
                    'history_revision_timestamp'    => '@CarleadSonataThemeBundle/CRUD/history_revision_timestamp.html.twig',
                    'acl'                           => '@CarleadSonataThemeBundle/CRUD/acl.html.twig',
                    'action'                        => '@CarleadSonataThemeBundle/CRUD/action.html.twig',
                    'short_object_description'      => '@CarleadSonataThemeBundle/Helper/short-object-description.html.twig',
                    'preview'                       => '@CarleadSonataThemeBundle/CRUD/preview.html.twig',
                    'list_block'                    => '@CarleadSonataThemeBundle/Block/block_admin_list.html.twig',
                    'delete'                        => '@CarleadSonataThemeBundle/CRUD/delete.html.twig',
                    'batch'                         => '@CarleadSonataThemeBundle/CRUD/list__batch.html.twig',
                    'select'                        => '@CarleadSonataThemeBundle/CRUD/list__select.html.twig',
                    'batch_confirmation'            => '@CarleadSonataThemeBundle/CRUD/batch_confirmation.html.twig',
                    'inner_list_row'                => '@CarleadSonataThemeBundle/CRUD/list_inner_row.html.twig',
                    'base_list_field'               => '@CarleadSonataThemeBundle/CRUD/base_list_field.html.twig',
                    'pager_links'                   => '@CarleadSonataThemeBundle/Pager/links.html.twig',
                    'pager_results'                 => '@CarleadSonataThemeBundle/Pager/results.html.twig',
                    'tab_menu_template'             => '@CarleadSonataThemeBundle/Core/tab_menu_template.html.twig',
                    'knp_menu_template'             => '@CarleadSonataThemeBundle/Menu/sonata_menu.html.twig',
                    'search_result_block'           => '@CarleadSonataThemeBundle/Block/block_search_result.html.twig',
                    'outer_list_rows_mosaic'        => '@CarleadSonataThemeBundle/CRUD/list_outer_rows_mosaic.html.twig',
                    'outer_list_rows_list'          => '@CarleadSonataThemeBundle/CRUD/list_outer_rows_list.html.twig',
                    'outer_list_rows_tree'          => '@CarleadSonataThemeBundle/CRUD/list_outer_rows_tree.html.twig',
                    'button_acl'                    => '@CarleadSonataThemeBundle/Button/acl_button.html.twig',
                    'button_create'                 => '@CarleadSonataThemeBundle/Button/create_button.html.twig',
                    'button_edit'                   => '@CarleadSonataThemeBundle/Button/edit_button.html.twig',
                    'button_history'                => '@CarleadSonataThemeBundle/Button/history_button.html.twig',
                    'button_list'                   => '@CarleadSonataThemeBundle/Button/list_button.html.twig',
                    'button_show'                   => '@CarleadSonataThemeBundle/Button/show_button.html.twig',
                ],
                'assets'    => [
                    'stylesheets'   => [
                        'bundles/CarleadSonataThemeBundle/css/bootstrap.min.css',
                        'bundles/CarleadSonataThemeBundle/css/font-awesome.min.css',
                        'bundles/CarleadSonataThemeBundle/css/icheck.css',
                        'bundles/sonatacore/vendor/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
                        'bundles/sonatacore/vendor/select2/select2.css',
                        'bundles/sonatacore/vendor/select2-bootstrap-css/select2-bootstrap.min.css',
                        'bundles/CarleadSonataThemeBundle/css/prettify.min.css',
                        'bundles/CarleadSonataThemeBundle/css/custom.min.css',
                        'bundles/CarleadSonataThemeBundle/css/sonata-gentellela.css',
                    ],
                    'javascripts'   => [
//                        'bundles/CarleadSonataThemeBundle/js/jquery.min.js',
                        /* JQuery has been moved in header. This is bad, but necessary until https://github.com/sonata-project/SonataAdminBundle/pull/3647 complete.
                         * This will be cleaned up with the version 4.0 of sonata admin */

                        'bundles/sonataadmin/vendor/jquery.scrollTo/jquery.scrollTo.min.js',
                        'bundles/CarleadSonataThemeBundle/js/moment.min.js',
                        'bundles/CarleadSonataThemeBundle/js/bootstrap.min.js',
                        'bundles/sonatacore/vendor/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
                        'bundles/sonataadmin/vendor/jqueryui/ui/minified/jquery-ui.min.js',
                        'bundles/sonataadmin/vendor/jqueryui/ui/minified/i18n/jquery-ui-i18n.min.js',
                        'bundles/sonataadmin/vendor/jquery-form/jquery.form.js',
                        'bundles/sonataadmin/jquery/jquery.confirmExit.js',
                        'bundles/sonataadmin/vendor/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.min.js',
                        'bundles/CarleadSonataThemeBundle/js/custom.min.js',
                        'bundles/sonatacore/vendor/select2/select2.min.js',
                        'bundles/sonataadmin/vendor/iCheck/icheck.min.js',
                        'bundles/sonataadmin/vendor/slimScroll/jquery.slimscroll.min.js',
                        'bundles/sonataadmin/vendor/waypoints/lib/jquery.waypoints.min.js',
                        'bundles/sonataadmin/vendor/waypoints/lib/shortcuts/sticky.min.js',
                        'bundles/sonataadmin/vendor/readmore-js/readmore.min.js',

                        'bundles/sonataadmin/Admin.js',
                        'bundles/sonataadmin/treeview.js',
                    ]
                ]
            ];
            $container->prependExtensionConfig('sonata_admin', $config);
        }
    }
}
