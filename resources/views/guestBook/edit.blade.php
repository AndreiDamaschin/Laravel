@extends('guestBook.guestBook')
@section('content')
<div class = "text-right"><b>Всего сообщений</b><i class = "badge">{{$count}}</i></div><br/>
<div class="messages">
@if (! $text -> isEmpty())
    @foreach($text as $message)
        <div class = "panel panel-default">
            <div class = "panel-heading">
                <h3 class = "panel-title">
                    <span>{{ $message -> email }}</span>
                    <a href=""> <span>{{$message -> attach}}</span></a>
                    <span class = "pull-right label label-info">{{ $message -> created_at }}</span>
                </h3>
            </div>
            <div class = "overflow-auto panel-body">
                {{ $message -> text }}<hr/>
                <div class = "pull-right">
                    <a class = "btn btn-info" href = "#">
                    <i class = "glyphicon glyphicon-pencil"></i>
                    </a>
                    <button class = "btn btn-danger">
                    <i class = "glyphicon glyphicon-trash"></i>
                    </button>
                </div>
            </div>
        </div> 
        @endforeach
        <div class="text-center">
             {!! $text -> render() !!}
        </div>
        @else
        <h3 class = "panel-title"><span>Нет записей !</span></h3>
    @endif
</div>
@endsection