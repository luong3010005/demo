
<div class="" style="margin-bottom: 120px;">
    @include('fonend.header')
</div>
<div class="container mt-5">
        <h2 class="font-weight-semibold text-xl text-dark">
            {{ __('Dashboard') }}
        </h2>

        <div class="py-4">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            {{ __('User Information') }}
                        </div>
                        <div class="card-body text-dark">
                            <p><strong>{{ __('Name:') }}</strong> {{ Auth::user()->name }}</p>
                            <p><strong>{{ __('Email:') }}</strong> {{ Auth::user()->email }}</p>
                            <p>{{ __("You're logged in!") }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Logout Button -->
        <div class="d-flex justify-content-end mt-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger">
                    {{ __('Logout') }}
                </button>
            </form>
        </div>
    </div>
<br>
@include('fonend.footer')

