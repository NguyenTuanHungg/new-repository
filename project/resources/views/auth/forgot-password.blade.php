@extends('layouts.login')

@section('content')
<div class="card">
    <div class="card-header">{{ __('Quên mật khẩu') }}</div>

    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('forgotPassword') }}">
            @csrf

            <div class="form-group">
                <label for="email">{{ __('Địa chỉ Email') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group mb-0">
                <button type="submit" class="btn btn-primary">
                    {{ __('Gửi liên kết đặt lại mật khẩu') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection