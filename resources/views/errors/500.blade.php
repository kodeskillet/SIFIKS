@extends('errors::custom-layout')

@section('title', __('500 Server Error'))
@section('code', '500')
@section('oops', 'Oops ! The Server is Error')
@section('message', __('Server is currently having an Error.'))
