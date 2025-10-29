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
                'title' => 'Electronics',
                'subtitle' => 'Phones, TV & More',
                'link' => '#',
                'children' => [
                    [
                        'title' => 'Mobile Phones',
                        'subtitle' => 'Android, iOS',
                        'link' => '#',
                        'children' => [
                            ['title' => 'Samsung', 'subtitle' => '', 'link' => '#'],
                            ['title' => 'iPhone', 'subtitle' => '', 'link' => '#'],
                        ],
                    ],
                    [
                        'title' => 'Television',
                        'subtitle' => 'LED, Smart TV',
                        'link' => '#',
                        'children' => [],
                    ]
                ],
            ],
            [
                'title' => 'Fashion',
                'subtitle' => 'Men & Women',
                'link' => '#',
                'children' => [
                    [
                        'title' => 'Men',
                        'subtitle' => '',
                        'link' => '#',
                        'children' => []
                    ],
                    [
                        'title' => 'Women',
                        'subtitle' => '',
                        'link' => '#',
                        'children' => []
                    ]
                ],
            ]
        ];

        $this->context->smarty->assign('menuverse_menu', $menu);
        return $this->display(__FILE__, 'views/templates/hook/menuverse.tpl');
    }
}
