@extends('errors::custom-layout')

@section('title-code', 'SIFIKS | 403')
@section('title', __('Forbidden'))
@section('code', '403')
@section('oops', 'Oops ! Access Forbidden.')
@section('message', __($exception->getMessage() ?: 'Access to this page is Forbidden.'))
