@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2>記事管理 詳細</h2>
            <p><a href="/admin/articles">一覧へ戻る</a></p>

            @include('admin.common._flash')

            @if ($article)
            <table class="table table-striped table-bordered">
              <tbody>
                <tr>
                  <th>ID</th>
                  <td>{{ $article->id }}</td>
                </tr>
                <tr>
                  <th>URL</th>
                  <td>{{ $article->url }}</td>
                </tr>
                <tr>
                  <th>公開日</th>
                  <td>{{ date('Y/m/d H:i', strtotime($article->release_date)) }}</td>
                </tr>
                <tr>
                  <th>操作</th>
                  <td>
                    <div class="d-flex justify-content-between aling-items-center">
                      <a href="/admin/articles/{{ $article->id }}/edit" class="btn btn-primary btn-sm">編集</a>
                      <form action="/admin/articles/{{ $article->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="削除" class="btn btn-danger btn-sm" onclick="return confirm('ほんとうに削除してもいいですか？');">
                      </form>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>

            <p>記事プレビュー</p>
            <article>
              <h1>{{ $article->title }}</h1>
              <div class="articleBody">{!! $article->body !!}</div>
            </article>
            @endif
        </div>
    </div>
</div>
@endsection
