<?php
namespace Jet\Modules\Navigation\Fixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Jet\Models\ModuleCategory;


class LoadNavigationModuleCategory extends AbstractFixture implements OrderedFixtureInterface
{
    private $data = [
        'name' => 'Navigation',
        'title' => 'Menu',
        'slug' => 'navigation',
        'description' => 'Module pour le menu',
        'icon' => 'fa fa-bars',
        'nav' => true,
        'author' => 'S.Sumugan',
        'version' => '0.1',
        'update_available' => false,
        'access_level' => 2
    ];

    public function load(ObjectManager $manager)
    {
        $cat = (ModuleCategory::where('name',$this->data['name'])->count() == 0)
            ? new ModuleCategory()
            : ModuleCategory::findOneByName($this->data['name']);
        $cat->setName($this->data['name']);
        $cat->setTitle($this->data['title']);
        $cat->setSlug($this->data['slug']);
        $cat->setNav($this->data['nav']);
        $cat->setIcon($this->data['icon']);
        $cat->setAuthor($this->data['author']);
        $cat->setVersion($this->data['version']);
        $cat->setUpdateAvailable($this->data['update_available']);
        $cat->setAccessLevel($this->data['access_level']);
        $cat->setDescription($this->data['description']);
        $manager->persist($cat);
        $this->addReference($this->data['slug'], $cat);
        $manager->flush();
    }


    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 1;
    }
}