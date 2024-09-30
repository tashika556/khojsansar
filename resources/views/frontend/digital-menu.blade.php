@extends('frontend/layout')
@section('page_title', 'Digital Menu')

@section('container')
<section class="bg_img banner d-flex justify-content-center align-items-center dark_bg"
    style="background-image: url({{ asset('uploads/businesscoverimage/'.$business->coverimage) }});">
    <div class="banner_content text-white">
    </div>
</section>
<section class="mb-0 p-0 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-9"></div>
            <div class="col-md-3">
                @if($business->menuPdfs->isNotEmpty())
                    <div class="default-btn-wrapp">
                        <a href="{{ route('menu.pdf', ['id' => $business->id]) }}" target="_blank" class="btn_default w-100">PDF Menu
                            <span>→</span>
                        </a>
                    </div>
                @else
                    <div class="default-btn-wrapp">
                        <a href="#" class="btn_default w-100 disabled">PDF Menu
                            <span>→</span>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

@php
$designToggle = true;
@endphp

@foreach($menus as $menu)
@if($menu->menuItems->isNotEmpty())
@if($designToggle)
<section class="digital-menu">
    <div class="container">
        <div class="digital-menu-content">
            <div class="digital-menu-heading">
                <h2 class="main-heading">{{ $menu->menu_topic }}</h2>
            </div>
            <div class="border-icon text-center">
                <i class="typcn typcn-point-of-interest"></i>
            </div>
            <div class="digital-menu-list">
                <ul>
                    @foreach($menu->menuItems as $item)
                    <li>
                        <div class="d-flex align-items-center justify-content-center">
                            <h5><span>{{ $item->title }}</span></h5>
                            <div class="food-menu-lines"></div>
                            <span class="pt-food-menu-price">{{ $item->price }}</span>
                        </div>
                        <p>{{ $item->caption }}</p>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
@else
<section class="digital-menu digital-bg text-white">
    <div class="digital-bg-overlay"></div>
    <div class="container">
        <div class="digital-menu-content">
            <div class="digital-menu-heading">
                <h2 class="main-heading">{{ $menu->menu_topic }}</h2>
            </div>
            <div class="border-icon text-center">
                <i class="typcn typcn-point-of-interest"></i>
            </div>
            <div class="digital-menu-list">
                <ul>
                    @foreach($menu->menuItems as $item)
                    <li>
                        <div class="d-flex align-items-center justify-content-center">
                            <h5><span>{{ $item->title }}</span></h5>
                            <div class="food-menu-lines"></div>
                            <span class="pt-food-menu-price">{{ $item->price }}</span>
                        </div>
                        <p>{{ $item->caption }}</p>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
@endif

@php
$designToggle = !$designToggle; 
@endphp
@endif
@endforeach

@include('frontend.partner')
@endsection