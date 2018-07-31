<?php
/**
 * Created by PhpStorm.
 * User: Walderlan Sena <senawalderlan@gmail.com>
 * Date: 31/07/18
 * Time: 03:39
 */

namespace App\User\Routing;

use Symfony\Component\Config\Loader\Loader;
use Symfony\Component\Routing\RouteCollection;

class AdvanceLoader extends Loader
{
    /**
     * Loads a resource.
     *
     * @param mixed $resource The resource
     * @param string|null $type The resource type or null if unknown
     *
     * @return RouteCollection
     * @throws \Exception If something went wrong
     */
    public function load($resource, $type = null)
    {
        $routes   = new RouteCollection();
        $resource = '@UserBundle/Resource/config/routes.yaml';
        $type     = 'yaml';

        $importRoutes = $this->import($resource, $type);

        $routes->addCollection($importRoutes);

        return $routes;
    }

    /**
     * Returns whether this class supports the given resource.
     *
     * @param mixed $resource A resource
     * @param string|null $type The resource type or null if unknown
     *
     * @return bool True if this class supports the given resource, false otherwise
     */
    public function supports($resource, $type = null)
    {
        return 'advanced_extra' === $type;
    }
}