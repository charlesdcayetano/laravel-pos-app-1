<aside class="sidebar js-sidebar" id="sidebar">
    <div class="h-100">

        {{-- Sidebar Logo --}}
        <div class="sidebar-logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }} Logo" class="">
                <span class="logo-text">{{ config('app.name') }}</span>
            </a>
        </div>

        {{-- Sidebar Menu --}}
        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a href="{{ route('home') }}" class="sidebar-link">
                    <i class="material-symbols-outlined">dashboard</i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('cart.index') }}" class="sidebar-link">
                    <i class="material-symbols-outlined">point_of_sale</i>
                    <span>Point of Sales</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('products.index') }}" class="sidebar-link">
                    <i class="material-symbols-outlined">box</i>
                    <span>Products</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="material-symbols-outlined">orders</i>
                    <span>Orders</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="material-symbols-outlined">group</i>
                    <span>Customers</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#miscellaneous"
                    data-bs-toggle="collapse" aria-expanded="false">
                    <i class="material-symbols-outlined">event_list</i>
                    <span>Miscellaneous</span>
                </a>
                <ul class="sidebar-dropdown list-unstyled collapse" id="miscellaneous" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="{{ route('users.index') }}" class="sidebar-link">
                            Users
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('categories.index') }}" class="sidebar-link">
                            Categories
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('suppliers.index') }}" class="sidebar-link">
                            Suppliers
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('discounts.index') }}" class="sidebar-link">
                            Discounts
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('genders.index') }}" class="sidebar-link">
                            Genders
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('roles.index') }}" class="sidebar-link">
                            Roles
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('payment-methods.index') }}" class="sidebar-link">
                            Payment Methods
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
