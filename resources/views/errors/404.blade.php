@extends('errors::custom-layout')

@section('title-code', 'SIFIKS | 404')
@section('title', __('404 Not Found'))
@section('code', '404')
@section('oops', 'Oops ! Page Not Found.')
@section('message', __($exception->getMessage() ?: 'The Page you are looking for does not exists.'))
