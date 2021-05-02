<?php

namespace App\Data;

class ArticleDimensionsDTO {

    private const DIMENSION_MIN_LENGTH = 1;
    private const DIMENSION_MAX_LENGTH = 13;
        private const EAN_MAX_LENGTH = 13;
    private const EAN_MIN_LENGTH = 6;

    
    /**
     * 
     * @var string
     */
    private $id;

    /**
     * 
     * @var string
     */
    private $ean;

    /**
     * 
     * @var string
     */
    private $width;

    /**
     * 
     * @var string
     */
    private $length;

    /**
     * 
     * @var string
     */
    private $height;

    /**
     * 
     * @var string
     */
    private $weight;
    
    private $updateDate;
    public function getUpdateDate() {
        return $this->updateDate;
    }

    public function setUpdateDate($updateDate){
        $this->updateDate = $updateDate;
        return $this;
    }

        public function getId(): string {
        return $this->id;
    }

    public function getEan() {
        return $this->ean;
    }

    public function getWidth() {
        return $this->width;
    }

    public function getLength() {
        return $this->length;
    }

    public function getHeight() {
        return $this->height;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function setId(string $id): ArticleDimensionsDTO {
        $this->id = $id;
        return $this;
    }

    public function setEan(string $ean): ArticleDimensionsDTO {
                DTOvalidator::validate(self::EAN_MIN_LENGTH, self::EAN_MAX_LENGTH, "numeric", $ean,  "EAN");
        $this->ean = $ean;
        return $this;
    }

    public function setWidth(string $width): ArticleDimensionsDTO{
        DTOvalidator::validate(self::DIMENSION_MIN_LENGTH, self::DIMENSION_MAX_LENGTH, "text", $width,  "Ширина");
        $this->width = $width;
        return $this;
    }

    public function setLength(string $length): ArticleDimensionsDTO{
                DTOvalidator::validate(self::DIMENSION_MIN_LENGTH, self::DIMENSION_MAX_LENGTH, "text", $length,  "Дължина");
        $this->length = $length;
        return $this;
    }

    public function setHeight(string $height): ArticleDimensionsDTO {
                        DTOvalidator::validate(self::DIMENSION_MIN_LENGTH, self::DIMENSION_MAX_LENGTH, "text", $height,  "Височина");
        $this->height = $height;
        return $this;
    }

    public function setWeight(string $weight): ArticleDimensionsDTO {
                                DTOvalidator::validate(self::DIMENSION_MIN_LENGTH, self::DIMENSION_MAX_LENGTH, "text", $weight,  "Тегло");
        $this->weight = $weight;
        return $this;
    }

}
