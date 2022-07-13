<?php App::setLocale(config('app.http_status_code_locale')); ?>

   @extends('layouts.layout_errors')

   @section('title', 'Bad Request')

   @section('code', '401')

   @section('message', __('リクエストにエラーがあります。'))