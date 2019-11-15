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
                    @if($message -> attach)
                    <a href=""><span class = "label label-info">Attached file</span></a>
                    @endif
                    <span class = "pull-right label label-info">{{ $message -> created_at }}</span>
                </h3>
            </div>
            <div class = "overflow-auto panel-body">
                {{ $message -> text }}<hr/>
                <div class = "pull-right">
                    <a class = "btn btn-info" href = "#">
                    <i class = "glyphicon glyphicon-plus" onClick = "code({{$message -> id}})" return false></i>
                    </a>
                    <a class = "btn btn-info" href = "#">
                    <i class = "glyphicon glyphicon-pencil"></i>
                    </a>
                    <button class = "btn btn-danger">
                    <i class = "glyphicon glyphicon-trash"></i>
                    </button>
                </div>
            </div>
            @foreach($text as $mess)
                @if($message -> id == $mess -> mess)
                    <div class = "overflow-auto panel-body badge">
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
                @endif    
            @endforeach
            <div id = "{{$message -> id}}">
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