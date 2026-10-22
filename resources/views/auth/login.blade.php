@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4 p-md-5">
                    
                    <!-- Header Login -->
                    <div class="text-center mb-4">
                        <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow" style="width: 70px; height: 70px; font-size: 2rem;">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4 class="fw-bold text-dark">Login Petugas</h4>
                        <p class="text-muted small">Sistem LaporBanjir BPBD Kab. Bandung</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <!-- Email Input -->
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold text-secondary small">Email Address</label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text bg-white text-muted border-end-0"><i class="fas fa-envelope"></i></span>
                                <input id="email" type="email" class="form-control border-start-0 py-2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="adminbpbd@example.com">
                            </div>
                            @error('email')
                                <span class="text-danger small mt-1 d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Password Input -->
                        <div class="mb-4">
                            <label for="password" class="form-label fw-semibold text-secondary small">Password</label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text bg-white text-muted border-end-0"><i class="fas fa-lock"></i></span>
                                <input id="password" type="password" class="form-control border-start-0 py-2 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="••••••••">
                            </div>
                            @error('password')
                                <span class="text-danger small mt-1 d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="mb-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label small text-muted ms-1" for="remember">Ingat Saya (Remember Me)</label>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill shadow-sm">
                                <i class="fas fa-sign-in-alt me-2"></i>Login ke Sistem
                            </button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection