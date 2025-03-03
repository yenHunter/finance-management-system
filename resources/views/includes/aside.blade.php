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
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-layout-dashboard"></i>
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
                <li class="menu-item @if (Session::get('active') == 'income_head') {{ 'active' }} @endif">
                    <a href="{{ route('income-head') }}" class="menu-link">
                        <div data-i18n="Income Head">Income Head</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item @if (Session::get('open') == 'expense') {{ 'active open' }} @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-file-dollar"></i>
                <div data-i18n="Expense">Expense</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item @if (Session::get('active') == 'expense_list') {{ 'active' }} @endif">
                    <a href="{{ route('expense-list') }}" class="menu-link">
                        <div data-i18n="List">List</div>
                    </a>
                </li>
                <li class="menu-item @if (Session::get('active') == 'expense_create') {{ 'active' }} @endif">
                    <a href="{{ route('expense-create') }}" class="menu-link">
                        <div data-i18n="Create">Create</div>
                    </a>
                </li>
                <li class="menu-item @if (Session::get('active') == 'expense_head') {{ 'active' }} @endif">
                    <a href="{{ route('expense-head') }}" class="menu-link">
                        <div data-i18n="Expense Head">Expense Head</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item @if (Session::get('active') == 'report') {{ 'active' }} @endif">
            <a href="{{ route('report') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-chart-infographic"></i>
                <div data-i18n="Reports">Reports</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="Users">Users</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('user-list') }}" class="menu-link">
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
        <li class="menu-item @if (Session::get('open') == 'settings') {{ 'active open' }} @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-settings"></i>
                <div data-i18n="Settings">Settings</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item @if (Session::get('active') == 'bank_list') {{ 'active' }} @endif">
                    <a href="{{ route('bank-list') }}" class="menu-link">
                        <div data-i18n="Bank List">Bank List</div>
                    </a>
                </li>
            </ul>
            <ul class="menu-sub">
                <li class="menu-item @if (Session::get('active') == 'branch_list') {{ 'active' }} @endif">
                    <a href="{{ route('branch-list') }}" class="menu-link">
                        <div data-i18n="Branch List">Branch List</div>
                    </a>
                </li>
            </ul>
            <ul class="menu-sub">
                <li class="menu-item @if (Session::get('active') == 'financial_year_list') {{ 'active' }} @endif">
                    <a href="{{ route('financial-year-list') }}" class="menu-link">
                        <div data-i18n="Financial Year List">Financial Year List</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
