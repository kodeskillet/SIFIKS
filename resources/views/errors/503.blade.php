@extends('errors::custom-layout')

@section('title', __('503 Service Unavailable'))
@section('code', '503')
@section('oops', 'Oops ! Service is Unavailable.')
@section('message', __($exception->getMessage() ? : 'Service is currently Unavailable'))
