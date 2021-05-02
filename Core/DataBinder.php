<?php


namespace Core;


class DataBinder implements DataBinderInterface{
    
    /**
     * 
     * @param type $formdata
     * @param type $className
     * @return \Core\className  
     * @throws \ReflectionException
     */
    
    public function bind($formdata, $className) {
        
                $object = new $className;

        
        foreach ($formdata as $key => $value ){
            $methodName = 'set' . implode('', array_map(function ($el){
                                return ucfirst($el);
            },  explode('_', $key)));
                   if(method_exists($object, $methodName)){
                       $object->$methodName($value);
                   }
            }
        
             
        return $object;
    }

}
