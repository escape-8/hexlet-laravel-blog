@extends('layouts.app')

@if (session()->has('status'))
    <div>{{ session('status') }}</div>
@endif

@section ('content')
    <a href="{{ route('articles.create') }}">Добавить статью</a>
    <h1>Список статей</h1>
    @foreach($articles as $article)
        <a href="{{ route('articles.index') }}/{{ $article->id }}"><h2>{{$article->name}}</h2></a>
        <div>
            {{Str::limit($article->body, 200)}}
        </div>
        <a href="{{ route('articles.edit', $article->id) }}">Редактировать Статью</a>
        <a href="{{ route('articles.destroy', $article->id) }}" data-confirm="Вы уверены?" data-method="delete" rel="nofollow">Удалить</a>
    @endforeach
    {{$articles->links()}}
@endsection
