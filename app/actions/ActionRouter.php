<?php

class ActionRouter {

    private $dirPath;
    private $actionParentPath;
    private $actionPath;
    private $actionClassName;
    private $registry;

    /**
     * @param Registry $registry
     * @throws Exception
     */
    public function __construct($registry) {

        $this->dirPath = __DIR__ . '/';
        $this->actionClassName = $this->getActionClassName($registry['action']);

        if ($this->isAjax()) {
            $subDir = 'ajax/';
        } else {
            $subDir = '';
        }
        $this->actionPath = $this->dirPath . $subDir . $this->actionClassName . '.php';

        if (!file_exists($this->actionPath)) {
            /**
             * @todo add this to log
             */
            throw new Exception($this->actionPath . ' not found');
        }

        $this->registry = $registry;
        $this->actionParentPath = 'AbstractAction.php';
        $this->includeFiles();
        $this->registry->set('action_class_name', $this->actionClassName);

        require_once $this->actionPath;
    }

    /**
     * @throws Exception
     */
    public function run() {
        $action = new $this->actionClassName($this->registry);
        $action->execute();
    }

    private function getActionClassName($action) {
        $parts = explode('_', $action);

        if (sizeof($parts) == 1) {
            return ucfirst($action);
        } else {
            $className = "";
            foreach ($parts as $part) {
                $className = $className . ucfirst($part);
            }
            return $className;
        }
    }

    /**
     * @return boolean
     */
    private function isAjax() {
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
                strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            return true;
        }
        return false;
    }

    private function includeFiles() {
        $root = $this->registry['site_root'];        
        require_once $root . 'app/actions/Action.php';     
        require_once $root . 'app/actions/AbstractAction.php';
        
        require_once $root . 'app/view/AbstractView.php';
        require_once $root . 'app/view/View.php';
        
        require_once $root . 'app/model/QueryHandlerFactory.php';
        require_once $root . 'app/model/DataHandlerFactory.php';
        require_once $root . 'app/model/AbstractQueryHandler.php';                

        if ($this->isAjax()) {
            require_once $root . 'app/actions/ajax/AbstractAjaxAction.php';
        }
    }

}
