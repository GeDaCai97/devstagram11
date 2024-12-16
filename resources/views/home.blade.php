@extends('layouts.app')

@section('titulo')

@endsection

@section('contenido')
    <x-listar-post :posts="$posts" />
@endsection