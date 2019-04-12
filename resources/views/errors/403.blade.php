@extends('errors::custom-layout')

@section('title', __('Forbidden'))
@section('code', '403')
@section('oops', 'Oops ! Access Forbidden.')
@section('message', __($exception->getMessage() ?: 'Forbidden'))
