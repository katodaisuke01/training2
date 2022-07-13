<?php App::setLocale(config('app.http_status_code_locale')); ?>

@extends('layouts.layout_errors')

@section('title', __('Page Expired'))

@section('code', '419')

@section('message', __('ページの有効期限が切れています'))