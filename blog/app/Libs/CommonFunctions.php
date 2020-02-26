<?php

namespace App\Libs;

class CommonFunctions
{
  /**
   * MarkdownをHTMLに変換
   */
  public static function mdParse($article)
  {
      $parser = new \cebe\markdown\Markdown();
      $article->body = $parser->parse($article->body);
      return $article;
  }

  /**
   * 日付を整形
   */
  public static function dateFormatting($articles)
  {
      if (isset($articles->release_date)) {
          $articles->release_date = date('Y/m/d', strtotime($articles->release_date));
      } else {
          foreach ($articles as $key => $article) {
              $articles[$key]->release_date = date('Y/m/d', strtotime($article->release_date));
          }
      }
      return $articles;
  }
}