<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

/**
 * SeoPages Controller (Front-end)
 */
class SeoPagesController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->Auth->allow(['display']);
    }

    /**
     * Display front-end SEO page based on slug
     *
     * @param string|null $slug Page slug.
     * @return \Cake\Http\Response|null|void
     */
    public function display($slug = null)
    {
        if (empty($slug)) {
            return $this->redirect('/');
        }

        $slugClean = trim($slug, '/');
        $slugsToCheck = [$slugClean, '/' . $slugClean];

        $seoPagesTable = TableRegistry::getTableLocator()->get('SeoPages');
        $seoPage = $seoPagesTable->find()->where(['slug IN' => $slugsToCheck])->first();

        if (!$seoPage) {
            // Check in StaticPages as fallback
            $staticPagesTable = TableRegistry::getTableLocator()->get('StaticPages');
            $staticPage = $staticPagesTable->find()->where(['slug IN' => $slugsToCheck])->first();
            if ($staticPage) {
                $this->setMeta($staticPage);
                $this->set('page', $staticPage);
                return $this->render('/StaticPages/index');
            }
            return $this->redirect('/404');
        }

        $this->setMeta($seoPage);
        $this->set('page', $seoPage);
    }
}
