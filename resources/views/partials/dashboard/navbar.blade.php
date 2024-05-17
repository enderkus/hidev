<nav class="py-3 bg-black shadow">
    <div class="container">
        <div class="row text-white">
            <div class="col-6 d-flex align-items-center gap-2">
                <span class="bg-white rounded-circle d-block" style="width: 35px; height: 35px;"></span>
                <span class="logo fs-4 text-white">hi.dev</span>
            </div>

            <div class="col-6 d-flex align-items-center justify-content-end">
                <ul class="list-unstyled d-flex align-items-center gap-4 mb-0">
                    <li><a href="{{ route('dashboard') }}" class="text-decoration-none text-white">Dashboard</a></li>
                    <li><a href="{{ route('dashboard.customize') }}" class="text-decoration-none text-white">Customize</a></li>
                    <li><a href="{{ route('dashboard.settings') }}" class="text-decoration-none text-white">Settings</a></li>
                    <x-form action="{{ route('logout') }}">
                        @csrf
                        <input type="submit" class="btn btn-emerald fw-medium" value="Logout">
                    </x-form>
                </ul>
            </div>
        </div>
    </div>
</nav>
