@extends('errors::minimal')

@section('title', __('Erişiminiz Kısıtlandı'))
@section('code', '429')
@section('message', __('Çok Fazla İstek Attınız. Sistem Erişiminizi Kısıtladı'))
