@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2>記事管理 編集</h2>
            <p><a href="/admin/articles">一覧へ戻る</a></p>

            @include('admin.common._flash')
            @include('admin.common._errors')

            <form action="/admin/articles/{{ $article->id }}" method="post">
              {{-- 以下を入れないとエラーになる --}}
              @method('PUT')
              @csrf
              <div class="form-group">
                <label for="title">タイトル</label>
                <input class="form-control" type="text" name="title" placeholder="記事のタイトルを入れる" value="{{ old('title') ?: $article->title ?: '' }}">
              </div>
              <div class="form-group">
                <label for="url">URL</label>
                <input class="form-control" type="text" name="url" placeholder="一意のURL" value="{{ old('url') ?: $article->url ?: '' }}">
              </div>
              <div class="form-group">
                <label for="release_date">公開日</label>
                <input class="form-control datetimepicker" type="text" name="release_date" placeholder="例)2020-01-05 15:00:00" value="{{ old('release_date') ?: $article->release_date ?: '' }}" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="body">内容</label>
                <textarea class="form-control" name="body" rows="8" cols="80" placeholder="記事の内容を入れる">{{ old('body') ?: $article->body ?: '' }}</textarea>
              </div>
              <div class="form-group">
                <input class="btn btn-primary" type="submit" value="更新">
              </div>
            </form>
        </div>
    </div>
</div>
@endsection
