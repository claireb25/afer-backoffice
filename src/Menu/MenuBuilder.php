<?php
namespace App\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class MenuBuilder
{
    private $factory;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createSidebarMenu(RequestStack $requestStack)
    {
        $menu = $this->factory->createItem('root');
       #$presentation = $em->getRepository('App:Presentation')->getId();
        #$menu->addChild('Profil', ['route' => 'presentation_index'])->setAttribute('class','onglet');
        #$menu['Profil']->addChild('Edition',['route' => 'presentation_edit']);
        #'routeParameters' => array('id' => $presentation->getId()) ]);
        #routeParameters' => ['id' => $blog->getId()]
        $menu->addChild('Stagiaire', ['route' => 'stagiaire_index'])->setAttribute('class','onglet');
        $menu->addChild('Stage', ['route' => 'stage_index'])->setAttribute('class','onglet');
        $menu->addChild('Lieu de Stage', ['route' => 'lieu_stage_index'])->setAttribute('class','onglet');
        $menu->addChild('Prefecture', ['route' => 'prefecture_index'])->setAttribute('class','onglet');
        $menu->addChild('Tribunal', ['route' => 'tribunal_index'])->setAttribute('class','onglet');
        $menu->addChild('Suivi Dossier', ['route' => 'suivi_dossier_index'])->setAttribute('class','onglet');
        $menu->addChild('Animateur', ['route' => 'animateur_index'])->setAttribute('class','onglet');
        $menu->addChild('Statut animateur', ['route' => 'statut_animateur_index'])->setAttribute('class','onglet');
        $menu->addChild('Fonction animateur', ['route' => 'fonction_animateur_index'])->setAttribute('class','onglet');
        $menu->addChild('Forfait animateur', ['route' => 'forfait_animateur_index'])->setAttribute('class','onglet');
        $menu->addChild('Infraction', ['route' => 'infraction_index'])->setAttribute('class','onglet');
        $menu->addChild('Type d\'infraction', ['route' => 'type_infraction_index'])->setAttribute('class','onglet');
        return $menu;
    }
}
