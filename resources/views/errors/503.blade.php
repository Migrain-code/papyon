@extends('errors::minimal')

@section('title', __('İşletmeye Erişemezsiniz'))
@section('code', '503')
@section('message', __('Lütfen menüye erişmek için QR kodunuzu okutunuz. Eğer hala erişemiyorsanız, işletme henüz menü eklememiş olabilir.'))
