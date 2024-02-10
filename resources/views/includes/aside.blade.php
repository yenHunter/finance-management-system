<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('assets/img/logo/mohajon.png') }}" alt="">
            </span>
            <span class="app-brand-text demo menu-text fw-bold">Mohajon</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item @if (Session::get('active') == 'dashboard') {{ 'active' }} @endif">
            <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboards">Dashboard</div>
            </a>
        </li>
        <li class="menu-item @if (Session::get('open') == 'income') {{ 'active open' }} @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-discount-2"></i>
                <div data-i18n="Income">Income</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item @if (Session::get('active') == 'income_list') {{ 'active' }} @endif">
                    <a href="{{ route('income-list') }}" class="menu-link">
                        <div data-i18n="List">List</div>
                    </a>
                </li>
                <li class="menu-item @if (Session::get('active') == 'income_create') {{ 'active' }} @endif">
                    <a href="{{ route('income-create') }}" class="menu-link">
                        <div data-i18n="Create">Create</div>
                    </a>
                </li>
                <li class="menu-item @if (Session::get('active') == 'bank_list') {{ 'active' }} @endif">
                    <a href="{{route('bank-list')}}" class="menu-link">
                        <div data-i18n="Bank List">Bank List</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-file-dollar"></i>
                <div data-i18n="Expense">Expense</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="app-invoice-list.html" class="menu-link">
                        <div data-i18n="List">List</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="app-invoice-preview.html" class="menu-link">
                        <div data-i18n="Create">Create</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="app-invoice-preview.html" class="menu-link">
                        <div data-i18n="Expense Head">Expense Head</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="Users">Users</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="app-user-list.html" class="menu-link">
                        <div data-i18n="List">List</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <div data-i18n="View">View</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="app-user-view-account.html" class="menu-link">
                                <div data-i18n="Account">Account</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="app-user-view-security.html" class="menu-link">
                                <div data-i18n="Security">Security</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="app-user-view-billing.html" class="menu-link">
                                <div data-i18n="Billing & Plans">Billing & Plans</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="app-user-view-notifications.html" class="menu-link">
                                <div data-i18n="Notifications">Notifications</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="app-user-view-connections.html" class="menu-link">
                                <div data-i18n="Connections">Connections</div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-user-check"></i>
                <div data-i18n="Roles & Permissions">Roles & Permissions</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="app-access-roles.html" class="menu-link">
                        <div data-i18n="Roles">Roles</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="app-access-permission.html" class="menu-link">
                        <div data-i18n="Permission">Permission</div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Cards -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-settings"></i>
                <div data-i18n="Settings">Settings</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="cards-basic.html" class="menu-link">
                        <div data-i18n="Basic">Basic</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="cards-advance.html" class="menu-link">
                        <div data-i18n="Advance">Advance</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="cards-statistics.html" class="menu-link">
                        <div data-i18n="Statistics">Statistics</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="cards-analytics.html" class="menu-link">
                        <div data-i18n="Analytics">Analytics</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="cards-actions.html" class="menu-link">
                        <div data-i18n="Actions">Actions</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
