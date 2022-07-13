<?php App::setLocale(config('app.http_status_code_locale')); ?>

@extends('layouts.layout_errors')

@section('title', __('Service Unavailable'))

@section('code', '503')

@section('message', __('ただいまアクセスが集中しています'))