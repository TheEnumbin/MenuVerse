<?php
if (!defined('_PS_VERSION_')) {
    exit;
}

class MenuVerse extends Module
{
    public function __construct()
    {
        $this->name = 'menuverse';
        $this->author = 'MenuVerse';
        $this->version = '1.0.0';
        $this->bootstrap = false;

        parent::__construct();

        $this->displayName = $this->l('MenuVerse Navigation');
        $this->description = $this->l('Simple multi-level menu for PrestaShop.');
    }

    public function install()
    {
        return parent::install() &&
            $this->registerHook('displayTop') &&
            $this->registerHook('displayHeader');
    }

    public function hookDisplayHeader()
    {
        $this->context->controller->addCSS($this->_path . 'views/css/menuverse.css');
    }

    public function hookDisplayTop()
    {
        // Hardcoded menu (later you can load from db / config)
        $menu = [
            [
                'title' => 'Omniverse Pricing',
                'subtitle' => 'EU Omnibus Directive Law Compatibility Module',
                'link' => 'https://modules.prestaverse.org/content/6-eu-omnibus-directive-law-compatibility-module-for-prestashop',
                'class' => 'omniverse-menu',
                'children' => [
                    [
                        'title' => 'Demo Single Page',
                        'subtitle' => 'Notice on Product Single Page',
                        'link' => 'https://modules.prestaverse.org/women/2-9-brown-bear-printed-sweater.html#/1-size-s',
                        // 'children' => [
                        //     ['title' => 'Samsung', 'subtitle' => '', 'link' => '#'],
                        //     ['title' => 'iPhone', 'subtitle' => '', 'link' => '#'],
                        // ],
                        'children' => [],
                    ],
                    [
                        'title' => 'Demo Product Card',
                        'subtitle' => 'Notice on Product Card on Home Page, Catalog Page',
                        'link' => 'https://modules.prestaverse.org/3-clothes',
                        'children' => [],
                    ]
                ],
            ],
            // [
            //     'title' => 'Infofields',
            //     'subtitle' => 'Custom Fields, Product Tabs, EU GPSR Compliance Law',
            //     'link' => 'https://addons.prestashop.com/en/additional-information-product-tab/94239-custom-fields-product-tabs-eu-gpsr-compliance-law.html',
            //     'class' => 'infofield-menu',
            //     'children' => [
            //         [
            //             'title' => 'Men',
            //             'subtitle' => '',
            //             'link' => '#',
            //             'children' => [],
            //         ],
            //         [
            //             'title' => 'Women',
            //             'subtitle' => '',
            //             'link' => '#',
            //             'children' => [],
            //         ],
            //     ],
            // ],
        ];

        $this->context->smarty->assign('menuverse_menu', $menu);
        return $this->display(__FILE__, 'views/templates/hook/menuverse.tpl');
    }
}
