<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;
use App\Article;
use Illuminate\Support\Facades\DB;
use App\Libs\CommonFunctions;

class ArticlesController extends Controller
{
    /**
     * 一覧ページ
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('release_date', 'desc')->paginate(10);
        return view('admin.articles.index', compact( 'articles' ));
    }

    /**
     * 作成ページ
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * 作成処理
     *
     * @param  \App\Http\Requests\ArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $article = New Article;
        $article->fill($request->all());

        DB::beginTransaction();
        try {
            $article->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with([
                'flash_message' => 'エラーのため更新できませんでした',
                'flash_class' => 'danger'
            ]);
        }
        return redirect('/admin/articles/' . $article->id)->with([
            'flash_message' => '作成しました',
            'flash_class' => 'success'
        ]);

    }

    /**
     * 詳細ページ
     *
     * @param  \App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $article = CommonFunctions::mdParse($article);
        return view('admin.articles.show', compact( 'article' ));
    }

    /**
     * 編集ページ
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact( 'article' ));
    }

    /**
     * 編集処理
     *
     * @param  \App\Http\Requests\ArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Article $article, ArticleRequest $request)
    {
        $article->fill($request->all());
        DB::beginTransaction();
        try {
            $article->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with([
                'flash_message' => 'エラーのため更新できませんでした',
                'flash_class' => 'danger'
            ]);
        }
        return redirect('admin/articles/' . $article->id)->with([
            'flash_message' => '更新しました',
            'flash_class' => 'success'
        ]);
    }

    /**
     * 削除処理
     *
     * @param  \App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        DB::beginTransaction();
        try {
            $article->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with([
                'flash_message', '削除できませんでした',
                'flash_message_class', 'danger'
            ]);
        }
        return redirect('/admin/articles/')->with([
            'flash_message', '削除しました',
            'flash_message_class', 'success'
        ]);
    }

}
