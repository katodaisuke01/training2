<?php App::setLocale(config('app.http_status_code_locale')); ?>

@extends('layouts.layout_errors')

@section('title', __('Forbidden'))

@section('code', '403')

@section('message', __('ページアクセスが制限されています'))