<?php App::setLocale(config('app.http_status_code_locale')); ?>

@extends('layouts.layout_errors')

@section('title', __('Unauthorized'))

@section('code', '401')

@section('message', __('IDやパスワードを誤っています'))