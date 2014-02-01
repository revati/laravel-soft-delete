<?php namespace Revati\SoftDelete;

use Illuminate\Routing\Router as IlluminateRouter;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class Router extends IlluminateRouter {

    /**
     * The default actions for a resourceful controller.
     *
     * @var array
     */
    protected $resourceDefaults = array('index', 'create', 'store', 'show', 'edit', 'update', 'destroy', 'confirmDestroy', 'forceDestroy', 'restore', 'trash');

    /**
     * Add the show method for a resourceful route.
     *
     * @param  string  $name
     * @param  string  $base
     * @param  string  $controller
     * @param  array   $options
     * @return Route
     */
    protected function addResourceConfirmDestroy($name, $base, $controller, $options)
    {
        $uri = $this->getResourceUri($name).'/{'.$base.'}/confirm';

        return $this->get($uri, $this->getResourceAction($name, $controller, 'confirmDestroy', $options));
    }

    /**
     * Add the force destroy method for a resourceful route.
     *
     * @param  string  $name
     * @param  string  $base
     * @param  string  $controller
     * @param  array   $options
     * @return Route
     */
    protected function addResourceForceDestroy($name, $base, $controller, $options)
    {
        $action = $this->getResourceAction($name, $controller, 'forceDestroy', $options);

        return $this->delete($this->getResourceUri($name).'/{'.$base.'}/force', $action);
    }

    /**
     * Add the restore method for a resourceful route.
     *
     * @param  string  $name
     * @param  string  $base
     * @param  string  $controller
     * @param  array   $options
     * @return void
     */
    protected function addResourceRestore($name, $base, $controller, $options)
    {
        $this->addPutResourceRestore($name, $base, $controller, $options);

        return $this->addPatchResourceRestore($name, $base, $controller);
    }

    /**
     * Add the restore method for a resourceful route.
     *
     * @param  string  $name
     * @param  string  $base
     * @param  string  $controller
     * @param  array   $options
     * @return Route
     */
    protected function addPutResourceRestore($name, $base, $controller, $options)
    {
        $uri = $this->getResourceUri($name).'/{'.$base.'}/restore';

        return $this->put($uri, $this->getResourceAction($name, $controller, 'restore', $options));
    }

    /**
     * Add the restore method for a resourceful route.
     *
     * @param  string  $name
     * @param  string  $base
     * @param  string  $controller
     * @return void
     */
    protected function addPatchResourceRestore($name, $base, $controller)
    {
        $uri = $this->getResourceUri($name).'/{'.$base.'}/restore';

        $this->patch($uri, $controller.'@update');
    }

    /**
     * Add the trash method for a resourceful route.
     *
     * @param  string  $name
     * @param  string  $base
     * @param  string  $controller
     * @param  array   $options
     * @return Route
     */
    protected function addResourceTrash($name, $base, $controller, $options)
    {
        $action = $this->getResourceAction($name, $controller, 'trash', $options);

        return $this->get($this->getResourceUri($name . '/trash'), $action);
    }

}
