<?php App::setLocale(config('app.http_status_code_locale')); ?>

@extends('layouts.layout_errors')

@section('title', __('Too Many Requests'))

@section('code', '429')

@section('message', __('ただいまアクセスが集中しています'))