<?php

namespace Source\Support;

use CoffeeCode\Router\Router;
use League\Plates\Engine;
use Source\Models\Postagem;

/**
 * Suporte para Postagens
 */
class PostSupport
{
   /**
    * Recorta um determinado texto
    *
    * @param string $text
    * @param integer $qtdCaracteres
    * @return string
    */
   public static function recortText(string $text, int $qtdCaracteres = 100): string
   {
      $text = filter_var(html_entity_decode($text), FILTER_SANITIZE_STRING);
      $text = substr($text, 0, 100) . "...";

      return $text;
   }

   /**
    * Renderiza a postagem
    *
    * @param Postagem $obPostagen
    * @param Engine $view
    * @param boolean $leiaMais
    * @param string $size sm | xl. sm = small; xl = extra-large
    * @param Router $router controlador de rotas
    * @return string
    */
   public static function renderizaPostagem(Postagem $obPostagen, Engine $view, bool $leiaMais = false, $size = 'xl', Router $router = null): string
   {
      $imgPost = url("source/Views/blog/partials/imgs/$obPostagen->imgPath");
      $imgAutor = asset("img/my.jpeg");

      $title = $obPostagen->titulo;
      $descricao = $obPostagen->descricao;

      // se for um post reduzido apresenta os dados normais, caso não, apresenta o texto recortado.
      $leiaMais == true ? $descricao = self::recortText($descricao) : $descricao = html_entity_decode($descricao);

      $data = date('d/m/y', strtotime($obPostagen->dataPostagem));
      $subtitle = $obPostagen->subtitulo;
      $slug = $obPostagen->slug;

      $categoriasLinks = Categorias::getAllCategoriasByJson($obPostagen->categorias, true, $router);

      $dadosForView = [
         'imgPost' => $imgPost,
         'title' => $title,
         'descricao' => $descricao,
         'subtitle' => $subtitle,
         'data' => $data,
         'categorias' => $categoriasLinks,
         'imgAutor' => $imgAutor,
         'slug' => $slug
      ];

      if ($leiaMais)  $dadosForView['leiaMais'] = true;

      if($size == 'xl') $htmlDaFila = $view->render('blog/partials/post', $dadosForView);
      else if($size == 'sm') $htmlDaFila = $view->render('blog/partials/postSm', $dadosForView);

      return $htmlDaFila;
   }

   /**
    * Método responsável por renderizar as postagens
    *
    * @param array $obPostagens
    * @return string
    */
   public static function renderizaPostagens(array $obPostagens, Engine $view, Router $router = null): string
   {
      $htmlFinal = "";

      foreach ($obPostagens as $post) {
         $htmlFinal .= self::renderizaPostagem($post, $view, true, 'sm', $router);
      }  

      return $htmlFinal;
   }
}
