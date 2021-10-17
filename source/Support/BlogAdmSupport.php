<?php

namespace Source\Support;

use Source\Models\Postagem;

/**
 * Suporte para controlador BlogAdmController
 */
class BlogAdmSupport
{
   /**
    * AJAX - Verifica se slug já existe
    *
    * @param array $data
    * @return void
    */
   public static function verificaSeSlugDigitadoEhValido(array $data): void
   {
      $slugValided = filter_var($data['slug'], FILTER_SANITIZE_STRING);

      if (!$slugValided) {
         echo json_encode(['resultado' => false, 'message' => "digite um slug válido!"]);
         return;
      }

      $slug = trim(filter_var($data['slug'], FILTER_SANITIZE_STRING));

      if (isset($data['id'])) {
         $id = filter_var($data['id'], FILTER_VALIDATE_INT);
         if (!$id) {
            echo json_encode(['resultado' => false, 'message' => "digite um slug válido!"]);
            return;
         }

         $obSlugCadastrado = (new Postagem)->findById($id);

         if (!$obSlugCadastrado) {
            echo json_encode(['resultado' => false, 'message' => "Não foi encontrado um slug cadastrado pra essa postagem!"]);
            return;
         }

         $slugAntigo = $obSlugCadastrado->slug;

         if ($slug === $slugAntigo) {
            echo json_encode(['resultado' => true, 'message' => "Esse é o slug cadastrado referente a esta postagem!"]);
            return;
         }
      }

      // verifica se existe algum slug desse tipo cadastrado no banco
      $obSlugsSemelhantes = (new Postagem)->find('visivel = true AND slug = :sl', "sl=$slug")->fetch(true);

      // se encontrar algum slug igual ao que foi digitado
      if ($obSlugsSemelhantes) echo json_encode(['resultado' => false, 'message' => "slug já existente, tente outro"]);
      // se não encontrar algum slug igual ao que foi digitado
      else echo json_encode(['resultado' => true, 'message' => "slug disponível"]);

      return;
   }
}
