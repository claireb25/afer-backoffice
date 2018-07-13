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
        $menu->addChild('Stagiaires', ['route' => 'stagiaire_index'])->setAttribute('class','onglet');
        $menu->addChild('Stages', ['route' => 'stage_index'])->setAttribute('class','onglet');
        $menu->addChild('Lieux de Stage', ['route' => 'lieu_stage_index'])->setAttribute('class','onglet');
        $menu->addChild('Prefectures', ['route' => 'prefecture_index'])->setAttribute('class','onglet');
        $menu->addChild('Tribunaux', ['route' => 'tribunal_index'])->setAttribute('class','onglet');
        $menu->addChild('Suivis Dossiers', ['route' => 'suivi_dossier_index'])->setAttribute('class','onglet');
        $menu->addChild('Animateurs', ['route' => 'animateur_index'])->setAttribute('class','onglet');
        $menu->addChild('Statuts animateurs', ['route' => 'statut_animateur_index'])->setAttribute('class','onglet');
        $menu->addChild('Fonctions', ['route' => 'fonction_animateur_index'])->setAttribute('class','onglet');
        $menu->addChild('Forfaits', ['route' => 'forfait_animateur_index'])->setAttribute('class','onglet');
        $menu->addChild('Infractions', ['route' => 'infraction_index'])->setAttribute('class','onglet');
        $menu->addChild('Types d\'infractions', ['route' => 'type_infraction_index'])->setAttribute('class','onglet');
        return $menu;
    }
}
