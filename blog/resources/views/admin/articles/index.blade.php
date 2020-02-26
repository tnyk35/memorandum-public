@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2>記事管理</h2>
            <p><a href="/admin/articles/create">新規作成</a></p>

            @include('admin.common._flash')

            @if ($articles)
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">タイトル</th>
                  <th scope="col">URL</th>
                  <th scope="col">公開日</th>
                  <th scope="col">操作</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($articles as $article)
                <tr>
                  <td>{{ $article->id }}</td>
                  <td><a href="/admin/articles/{{ $article->id }}">{{ $article->title }}</td>
                  <td>{{ $article->url }}</td>
                  <td>{{ date('Y/m/d H:i', strtotime($article->release_date)) }}</td>
                  <td><a href="/admin/articles/{{ $article->id }}/edit">編集</a></td>
                </tr>
              @endforeach
              </tbody>
            </table>

            {{ $articles->links() }}
            @endif
        </div>
    </div>
</div>
@endsection
