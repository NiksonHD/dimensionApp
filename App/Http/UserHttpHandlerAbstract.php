<?php

namespace App\Http;

use Core\TemplateInterface;
use Core\DataBinderInterface;
use App\Data\ErrorDTO;
abstract class UserHttpHandlerAbstract {

    /**
     *
     * @var \Core\TemplateInterface;
     */
    private $template;
    
    /**
     *
     * @var \Core\DataBinderInterface
     */
    
    protected $dataBinder;


    public function __construct(TemplateInterface $template, DataBinderInterface $dataBinder) {
        $this->template = $template;
        $this->dataBinder = $dataBinder;
    }
    
    public function render(string $templateName, $data = null, $error = null): void{
        $this->template->render($templateName, $data, $error);
        
        
    }
    public function redirect(string $url): void {
        header("Location:$url");
    }




}
