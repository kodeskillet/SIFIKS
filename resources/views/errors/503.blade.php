@extends('errors::custom-layout')

@section('title-code', 'SIFIKS | 503')
@section('title', __('503 Service Unavailable'))
@section('code', '503')
@section('oops', 'Oops ! Service is Unavailable.')
@section('message', __($exception->getMessage() ? : 'The Service is currently Unavailable.'))
