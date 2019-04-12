@extends('errors::custom-layout')

@section('title', __('401 Unauthorized'))
@section('code', '401')
@section('oops', 'Oops ! You are Unauthorized.')
@section('message', __('Unauthorized'))
