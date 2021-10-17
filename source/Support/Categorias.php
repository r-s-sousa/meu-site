<?php

namespace Source\Support;

use CoffeeCode\Router\Router;
use Source\Models\Categoria;
use Source\Models\Postagem;

/**
 * Suporte para DAO Categoria
 */
class Categorias
{
   /**
    * Obtém a quantidade de vezes que uma categoria foi usada
    *
    * @param integer $idCategory
    * @return integer
    */
   public static function getQtdPostsWiteCategory(int $idCategory): int
   {
      $qtdTotal = 0;

      $obPosts = (new Postagem)->find('visivel = true')->fetch(true);
      foreach ($obPosts as $post) {
         $categoriasJsonDecoded = json_decode($post->categorias);
         foreach ($categoriasJsonDecoded as $categoriaId) {
            if ($categoriaId == $idCategory) {
               $qtdTotal++;
            }
         }
      }

      return $qtdTotal;
   }

   /**
    * Obtém o nome da categoria pelo ID
    *
    * @param integer $idCategory
    * @return string|null
    */
   public static function getCategoryNameById(int $idCategory): ?string
   {
      $obCategoria = (new Categoria)->findById($idCategory);
      return isset($obCategoria) ? $obCategoria->categoria : null;
   }

   /**
    * Obtém uma string com todas categorias de um dado post
    *
    * @param string $jsonOb
    * @return string|null
    */
   public static function getAllCategoriasByJson(string $jsonOb, bool $link = false, Router $router = null): ?string
   {
      $categoriaStr = "";

      foreach (json_decode($jsonOb) as $categoria) {
         if ($link) {
            $rotaDaFila = '#';
            if ($router != null) {
               $categoriaForUrl = ltrim(Categorias::getCategoryNameById($categoria), '#');
               $rotaDaFila = $router->route('blog.searchCategoria', ['categoria' => $categoriaForUrl]);
            }

            $categoriaStr .= "<a href='{$rotaDaFila}'>" . Categorias::getCategoryNameById($categoria) . '</a> ';
         } else {
            $categoriaStr .= Categorias::getCategoryNameById($categoria) . "\t";
         }
      }

      $categoriaStr = trim($categoriaStr);
      if (!$link) $categoriaStr = str_replace(" ", "-", $categoriaStr);

      return trim($categoriaStr);
   }

   /**
    * Função responsável encontrar categoria
    *
    * @param string $nome
    * @return Categoria
    */
   public static function getCategoryObjByName(string $nome): ?Categoria
   {
      return (new Categoria)->find('categoria = :ct', "ct=$nome")->fetch();
   }

   /**
    * Retorna uma lista com as postagens que tem a categoria selecionada como uma 
    * das categorias internas
    *
    * @param integer $id
    * @return array
    */
   public static function getPostagensWithContainsCategoryId(int $id): array
   {
      $arrayObPostagens = [];
      $obPostagens = (new Postagem)->find('visivel = true')->order('id DESC')->fetch(true);

      if ($obPostagens) {
         foreach ($obPostagens as $obPostagem) {
            $obJsonDecoded = json_decode($obPostagem->categorias);
            if (in_array($id, $obJsonDecoded)) $arrayObPostagens[] = $obPostagem;
         }
      }

      return $arrayObPostagens;
   }

   /**
    * Obtém a quantidade de posts que cada categoria tem
    *
    * @return array
    */
   public static function getAllQtdCategorys(): array
   {
      $obCategorias = (new Categoria)->find()->fetch(true);
      $arrayCountCategorys = [];
      $obPostagens = (new Postagem)->find('visivel = true', "", 'id,categorias')->fetch(true);

      foreach ($obCategorias as $obCategoria) {
         $arrayCountCategorys[$obCategoria->id] = 0;
         if ($obPostagens) {
            foreach ($obPostagens as $obPostagem) {
               $obJsonDecoded = array_values(json_decode($obPostagem->categorias, true));
               if (in_array($obCategoria->id, $obJsonDecoded))
                  $arrayCountCategorys[$obCategoria->id]++;
            }
         }
      }

      return $arrayCountCategorys;
   }
}
