<?php

namespace AppBundle\Services\Entities;

use Symfony\Component\Finder\Finder;

/**
 * Description of BaseEntity
 *
 * @author busaev
 */
class BaseEntity {

    // код сущности
    public $entityCode = false;

    /**
     * Получить относительный путь до Сущности из директории Entity
     * Возвращает последнюю найденную по названию сущность
     * 
     * @return string
     */
    public function getEntityLocationInEntityDirectory()
    {
        $root = $this->getContainer()->get('kernel')->getRootDir();

        $finder = new Finder();
        $finder->name($this->getName() . '.php');
        $finder->depth('< 3');

        $finder->files()->in($root . '/../src/AppBundle/Entity');
        
        $path = false;

        foreach ($finder as $file)
        {

            // Удалим из пути все, до директории Entity
            $path = str_replace('/', '\\', str_replace('.php', '', preg_replace('/^.*AppBundle\/Entity\//i', '', $file->getRealpath())));
        }
        
        return $path;
    }

    /**
     * Получить логический путь
     * @return string
     */
    public function getLogicalName() {
        return "AppBundle:" . $this->getEntityLocationInEntityDirectory();
    }

    /**
     * Получить namespace для сущности
     *
     * @return string
     */
    public function getNamespace() {
        return 'AppBundle\\Entity\\' . $this->getEntityLocationInEntityDirectory();
    }

    /**
     * Получить namespace для формы
     *
     * @return string
     */
    public function getTypeNamspace($entityFormType=false, $application=false) {
        
        $name = $entityFormType ? $entityFormType : $this->getName();
        
        $applicationSpace = '';
        if($application)
            $applicationSpace = $application . '\\';
        
        return 'AppBundle\\Form\\' . $applicationSpace . $name . 'Type';
    }

    /**
     * Получить контроллер сущности
     *
     * @param string $application
     * @return bool|string
     */
    public function getApplicationController($application = 'Frontend')
    {
        if(!in_array($application, ['Frontend', 'Backend']))
            $application = 'Frontend';

        $root = $this->getContainer()->get('kernel')->getRootDir();

        $names = [$this->getName() . 'Controller.php', 'ContentController.php'];

        foreach($names as $name)
        {
            $finder = new Finder();
            $finder->name( $name );
            $finder->depth('< 3');

            $finder->files()->in($root . '/../src/AppBundle/Controller/' . $application);

            $path = false;

            foreach ($finder as $file)
            {

                // Удалим из пути все, до директории Entity
                $path = str_replace('Controller', '', str_replace('.php', '', preg_replace('/^.*AppBundle\/Controller\//i', '', $file->getRealpath())));
            }

            if($path)
                return $path;
        }
        return false;
    }


    /**
     * Получинь название класса сущности
     */
    public function getName() {
        return $this->container->get('utils')->getCamelCase($this->entityCode);
    }

    /**
     * Получить код сущности
     *
     * @return string
     */
    public function getCode() {
        return $this->entityCode;
    }

    /**
     * Получить название сущности из аннотаций
     *
     * @return type
     */
    public function getTitle() {
        $title = $this->getName();

        //аннотации
        $annotations = $this->container->get('annotations')->getAll($this->getCode());

        if (isset($annotations['object']['data']) && is_object($annotations['object']['data'])) {
            $title = $annotations['object']['data']->getTitle();
        }

        return $title;
    }

    /**
     * Получить новый объект сущности
     *
     * @return entity
     */
    public function getNew() {
        $entity = $this->getNamespace();

        return new $entity;
    }

    /**
     * Дефолтная инициализация новой сущности
     *
     * @param entity $entity
     * @return entity
     */
    public function init($entity = false) {
        if (!$entity) {
            $entity = $this->getNew();
        }
        
        return $entity;
    }

    /**
     * Базовый запрос на получение выборки
     * 
     * @return type
     */
    public function baseQuery() {
        $doctrine = $this->container->get('doctrine');
        $entities = $this->container->get('app.entities');

        $entityScroll = $entities->scroll_item;

        // Статус
        $status = $doctrine->getRepository($entityScroll->getLogicalName())
                ->findByScrollItemCodeAndScrollCode('delete', 'entry_status');

        // Основной запрос
        return $doctrine->getRepository($this->getLogicalName())
                        ->createQueryBuilder('e')
                        ->select('e')
                        ->where('e.entryStatus != :status')
                        ->setParameter('status', $status->getId());
    }

}
