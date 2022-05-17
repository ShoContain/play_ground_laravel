@extends('layouts.app')

@section('main')
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">タイトル</th>
            <th scope="col">内容</th>
            <th scope="col">投稿者</th>
            <th scope="col">メール</th>
            <th scope="col">操作</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $index =>$post)
        <tr>
            <th scope="row">{{ intval($index) + 1 }}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->body}}</td>
            <td>{{ $post->user->name }}</td>
            <td>
                {{ $post->user->email }}
            </td>
            <td>
                <a href="{{route('posts.show',['post'=>$post->id])}}">詳細</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection