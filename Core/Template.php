<?php

/*
 * Here comes the text of your license
 * Each line should be prefixed with  * 
 */

namespace Core;

/**
 * Description of Template
 *
 * @author nikson
 */
class Template implements TemplateInterface {
    const TEMPLATE_FOLDER = 'App/Templates/';
    const TEMPLATE_EXTENSION = '.php';

    public function render(string $templateName, $data = [], $errors = []): void {
        require_once self::TEMPLATE_FOLDER
                .$templateName
                .self::TEMPLATE_EXTENSION;
    }

}
