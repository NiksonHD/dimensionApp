<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repository\Article;

/**
 * Description of ArticleRepository
 *
 * @author nikson
 */
class ArticleRepository extends \App\Data\DatabaseAbstract implements ArticleRepositoryInterface {
    /**
     * 
     * @var \Database\DatabaseInterface
     */
    protected $db;
    public function __construct(\Database\DatabaseInterface $db) {
        $this->db = $db;
    }
    
    public function createDimension(\App\Data\ArticleDimensionsDTO $DTO) {
          
       $result =   $this->db->query("INSERT INTO article_dimension(ean, width, length, height, weight)"
                . "VALUES (?,?,?,?,?)"
        )->execute([
            $DTO->getEan(),
            $DTO->getWidth(),
            $DTO->getLength(),
            $DTO->getHeight(),
            $DTO->getWeight()
          ]);
          
          return $result->rowCount();
    }

    public function getLasrInsertId() {
        $result = $this->db->query('
            Select id FROM article_dimension ORDER BY id DESC LIMIT 1
                ')->execute()
                ->fetchAssoc();
        return $result;
    }

    public function getOneById($id) {
        return $this->db->query('SELECT * FROM article_dimension WHERE id = ?'
                )->execute([$id])
                ->fetchOne(\App\Data\ArticleDimensionsDTO::class);
    }

    public function getOneByEan($ean) {
        return $this->db->query('SELECT '
                . 'ean, width, length, height, weight, update_date as updateDate FROM article_dimension WHERE ean = ?')
                ->execute([$ean])
                ->fetchOne(\App\Data\ArticleDimensionsDTO::class);
        
    }

    public function findAll($date) {
        $result = $this->db->query('SELECT ean, width, length, height, weight FROM article_dimension WHERE update_date LIKE ?');
        return $result->execute([$date])->fetchAssoc();
    }

    public function deleteOne(\App\Data\ArticleDimensionsDTO $DTO) {
        $this->db->query('DELETE FROM article_dimension WHERE id = ?')
                ->execute([$DTO->getId()]);
    }

}
