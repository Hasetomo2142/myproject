@extends('layout')

@section('styles')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Bootflat CSS -->
    <link rel="stylesheet" href="https://bootflat.github.io/bootflat/css/bootflat.css">
    <!-- Google Fonts for Modern Font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        .center-content {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
@endsection

@section('content')
    <div class="container center-content">
        <div class="jumbotron mt-5 text-center p-5">
            <h1 class="display-4">Todoリストへようこそ！</h1>
            <p class="lead">このアプリケーションでは、あなたの日々のタスクを管理するのをお手伝いします。</p>
            <hr class="my-4">
            <p>始めるには、以下のボタンからログインしてください。</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">ログイン</a>
        </div>


    </div>
@endsection

@section('scripts')
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
@endsection
