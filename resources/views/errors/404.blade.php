@extends('errors::custom-layout')

@section('title', __('404 Not Found'))
@section('code', '404')
@section('oops', 'Oops ! Page Not Found.')
@section('message', __($exception->getMessage() ?: 'Page you are looking for does not exists.'))
