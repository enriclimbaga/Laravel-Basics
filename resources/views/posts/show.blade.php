@extends('layouts.app')

@section('laman')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <x-test :post="$post" />
        </div>
    </div>
@endsection