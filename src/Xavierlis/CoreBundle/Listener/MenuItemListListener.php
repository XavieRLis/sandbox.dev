<?php
namespace Xavierlis\CoreBundle\Listener;

use Avanzu\AdminThemeBundle\Model\MenuItemModel;
use Avanzu\AdminThemeBundle\Event\SidebarMenuEvent;
use Symfony\Component\HttpFoundation\Request;

class MenuItemListListener
{

    // ...

    public function onSetupMenu(SidebarMenuEvent $event) {

        $request = $event->getRequest();

        foreach ($this->getMenu($request) as $item) {
            $event->addItem($item);
        }

    }

    protected function getMenu(Request $request) {
        // retrieve your menuItem models/entities here
        $earg      = array();
        $rootItems = array(
            $dash = new MenuItemModel('dashboard', 'Dashboard', 'xl_admin_home', $earg, 'fa fa-dashboard'),
            $pages = new MenuItemModel('pages', 'Страницы', '', $earg, 'fa fa-file-text-o')

        );
        $pages->addChild(new MenuItemModel('pages-create', 'Создать', 'xl_content_page_admin_new', $earg))
            ->addChild($icons = new MenuItemModel('pages-index', 'Список', 'xl_content_page_admin_index', $earg));

        return $this->activateByRoute($request->get('_route'), $rootItems);
    }

    protected function activateByRoute($route, $items) {

        foreach($items as $item) {
            if($item->hasChildren()) {
                $this->activateByRoute($route, $item->getChildren());
            }
            else {
                if($item->getRoute() == $route) {
                    $item->setIsActive(true);
                }
            }
        }

        return $items;
    }

}