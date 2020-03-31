<?php

namespace Core;

class View
{
    private const LAYOUT_FOLDER = 'Views';
    /**
     * @var string
     */
    private $controller_name;

    /**
     * @var string
     */
    private $action_name;

    /**
     * View constructor.
     * @param string $controller_name
     * @param string $action_name
     */
    public function __construct(string $controller_name, string $action_name)
    {
        $this->controller_name = $controller_name;
        $this->action_name = $action_name;
    }

    public function renderView($data=[]){
        include(self::LAYOUT_FOLDER.'/Layout/header.php');
        include(self::LAYOUT_FOLDER.'/'.$this->controller_name.'/'.$this->action_name.'.php');
        include(self::LAYOUT_FOLDER.'/Layout/footer.php');
    }
}