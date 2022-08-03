{{--<x-guest-layout>--}}
{{--    <x-auth-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <a href="/">--}}
{{--                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />--}}
{{--            </a>--}}
{{--        </x-slot>--}}

{{--        <div class="mb-4 text-sm text-gray-600">--}}
{{--            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}--}}
{{--        </div>--}}

{{--        @if (session('status') == 'verification-link-sent')--}}
{{--            <div class="mb-4 font-medium text-sm text-green-600">--}}
{{--                {{ __('A new verification link has been sent to the email address you provided during registration.') }}--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        <div class="mt-4 flex items-center justify-between">--}}
{{--            <form method="POST" action="{{ route('verification.send') }}">--}}
{{--                @csrf--}}

{{--                <div>--}}
{{--                    <x-button>--}}
{{--                        {{ __('Resend Verification Email') }}--}}
{{--                    </x-button>--}}
{{--                </div>--}}
{{--            </form>--}}

{{--            <form method="POST" action="{{ route('logout') }}">--}}
{{--                @csrf--}}

{{--                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">--}}
{{--                    {{ __('Log Out') }}--}}
{{--                </button>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </x-auth-card>--}}
{{--</x-guest-layout>--}}
@extends('layouts.front_layout')

@section('page_title', 'تأكيد البريد الإلكتروني')

@section('content')
{{--    <x-guest-layout>--}}
<div style="width: 490px;
    display: flex;
    margin: auto;
    height: 500px;">
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="{{ asset('Front_Assets/img/Group 404.png') }}" style="width: 100px;
    height: 100px;
    display: flex;
    margin: auto;
    margin-top: 60px;">
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('قمنا بإرسال رابط إلى البريد الخاص بك ، يرجى تفقد بريدك ، في حال لم يصلك بريد يرجى الضغط على "إرسال مرة اخرى"') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('لقد تم إرسال بريد جديد') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div style="display:flex; justify-content: end;">
                    <button style="background-color: #002c7f;padding: 10px 15px; border: none; border-radius: 10px; color: white;">
                        {{ __('إرسال مرة آخرى') }}
                    </button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}" style="margin-top: -25px;">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900" style="border: none; background: transparent;color: #AAA;">
                    {{ __('تسجيل خروج') }}
                </button>
            </form>
        </div>
    </x-auth-card>

</div>
{{--    </x-guest-layout>--}}
@endsection
