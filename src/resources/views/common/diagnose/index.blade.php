@extends('layouts.user.default')

@section('page_class', 'l-diagnose')
@section('description', 'このページはミキワメ転職のエンタメコンテンツ、あなたにぴったりの職業を診断する適職診断のスタートページです。')
@section('title', 'あなたの本当の資質は!？適職診断')

@section('content')
  @component('component.user.frame._default')
    @slot('head')
      <p class="c-text__main c-text__lv2 c-text--center">簡単な20の質問に答えるだけで、<br />27のジョブタイプ別にあなたの適職を診断！</p>
    @endslot
    @slot('body')
      <p class="c-text__lv4 c-text--center">
      「基本的なシゴト性格」「シゴトでの強み・弱み」「ストレスを感じる一言」「本領発揮できる職種」など、<br />自分のタイプを発見して、あなたの仕事や転職に適職診断をぜひ役立ててくださいね。
      </p>
    @endslot
    @slot('foot')
    <div class="c-image__diagnose--sign"></div>
      <div class="c-buttonArea__center">
        <a href="{{route('question')}}" class="c-button__lg">適職診断スタート</a>
      </div>
    <div class="c-image__diagnose--thinking"></div>
    @endslot
  @endcomponent

@endsection
