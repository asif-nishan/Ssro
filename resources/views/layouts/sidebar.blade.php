<div class="app-sidebar sidebar-shadow bg-vicious-stance sidebar-text-light">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                        data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
                        <span>
                            <button type="button"
                                    class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner mt-2">
            <ul class="vertical-nav-menu">
                <li>
                    <a href="/dashboard" class="{{Request::is('/dashboard') ? 'mm-active' : ''}}">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Dashboard
                    </a>
                </li>

                @if(Request::path() =='profile/create' or Request::path() =='profile')
                    <li class="mm-active">
                @else
                    <!-- <li>
                        @endif
                        <a href="#">
                            <i class="metismenu-icon pe-7s-users"></i>
                            Profile
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <li>
                                <a href="/profile/create"
                                   class="{{Request::path() =='profile/create' ? 'mm-active' : ''}}">
                                    <i class="metismenu-icon">
                                    </i>Create Profile
                                </a>
                            </li>
                            <li>
                                <a href="/profile"
                                   class="{{Request::path() =='profile' ? 'mm-active' : ''}}">
                                    <i class="metismenu-icon">
                                    </i>All Profiles
                                </a>
                            </li>
                        </ul>
                    </li> -->
                    @if(Request::path() =='ticket/create' or Request::path() =='total-tickets' or Request::path() =='ticket' or Request::path() =='tickets/pnr' or Request::path() =='tickets/point')
                        <li class="mm-active">
                    @else
                        <li>
                            @endif
                            <a href="/ticket">
                                <i class="metismenu-icon pe-7s-ticket"></i>
                                Form
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="/ticket/create"
                                       class="{{Request::path() =='ticket/create' ? 'mm-active' : ''}}">
                                        <i class="metismenu-icon">
                                        </i>Create Form
                                    </a>
                                </li>
                                <!-- <li>
                                    <a href="/total-tickets"
                                       class="{{Request::path() =='total-tickets' ? 'mm-active' : ''}}">
                                        <i class="metismenu-icon">
                                        </i>Total Ticket List
                                    </a>
                                </li> -->
                                <li>
                                    <a href="/ticket"
                                       class="{{Request::path() =='ticket' ? 'mm-active' : ''}}">
                                        <i class="metismenu-icon">
                                        </i>All Form Data
                                    </a>
                                </li>
                                <!-- <li>
                                    <a href="/tickets/pnr"
                                       class="{{Request::path() =='tickets/pnr' ? 'mm-active' : ''}}">
                                        <i class="metismenu-icon">
                                        </i>Pnr List
                                    </a>
                                </li> -->
                                <!-- <li>
                                    <a href="/tickets/point"
                                       class="{{Request::path() =='tickets/point' ? 'mm-active' : ''}}">
                                        <i class="metismenu-icon">
                                        </i>Point
                                    </a>
                                </li> -->
                            </ul>
                        </li>

                        @if(Request::path() =='account/create' or Request::path() =='account')
                            <li class="mm-active">
                        @else
                            <!-- <li>
                                @endif
                                <a href="/airline-account">
                                    <i class="metismenu-icon pe-7s-plane"></i>
                                    Airlines Account
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="/account/create"
                                           class="{{Request::path() =='account/create' ? 'mm-active' : ''}}">
                                            <i class="metismenu-icon">
                                            </i>Create Account
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/account"
                                           class="{{Request::path() =='account' ? 'mm-active' : ''}}">
                                            <i class="metismenu-icon">
                                            </i>Account List
                                        </a>
                                    </li>
                                </ul>
                            </li> -->
                            @if(Request::path() =='reports/monthly' or Request::path() =='ticket-report'or Request::path() =='show_ticket_report' or Request::path() =='reports/points' or Request::path() =='show_ticket_report')
                                <li class="mm-active">
                            @else
                                <li>
                                    @endif

                                    <!-- <a href="#">
                                        <i class="metismenu-icon pe-7s-folder"></i>
                                        Report
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a> -->
                                    <ul>
                                       
                                        <!-- <li>
                                            <a href="/ticket-report"
                                               class="{{(Request::path() =='ticket-report' or Request::path() =='show_ticket_report') ? 'mm-active' : ''}}">
                                                <i class="metismenu-icon">
                                                </i> All Form Data
                                            </a>
                                        </li> -->
                                        <!-- <li>
                                            <a href="/reports/points"
                                               class="{{Request::path() =='reports/points' ? 'mm-active' : ''}}">
                                                <i class="metismenu-icon">
                                                </i>Point Report
                                            </a>
                                        </li> -->
                                    </ul>
                                </li>

                                @if(Request::path() =='bonuses/create' or Request::path() =='bonuses')
                                    <li class="mm-active">
                                @else
                                    <!-- <li>
                                        @endif
                                        <a href="#">
                                            <i class="metismenu-icon pe-7s-cash"></i>
                                            Bonus
                                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="/bonuses/create"
                                                   class="{{Request::path() =='bonuses/create' ? 'mm-active' : ''}}">
                                                    <i class="metismenu-icon">
                                                    </i>Create
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/bonuses"
                                                   class="{{Request::path() =='bonuses' ? 'mm-active' : ''}}">
                                                    <i class="metismenu-icon">
                                                    </i>Bonus List
                                                </a>
                                            </li>

                                        </ul>
                                    </li>
                                    @if(Request::path() =='deposit/create' or Request::path() =='deposit')
                                        <li class="mm-active">
                                    @else
                                        <li>
                                            @endif
                                            <a href="#">
                                                <i class="metismenu-icon pe-7s-cash"></i>
                                                Deposit
                                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                            </a>
                                            <ul>
                                                <li>
                                                    <a href="/deposit/create"
                                                       class="{{Request::path() =='deposit/create' ? 'mm-active' : ''}}">
                                                        <i class="metismenu-icon">
                                                        </i>Create
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="/deposit"
                                                       class="{{Request::path() =='deposit' ? 'mm-active' : ''}}">
                                                        <i class="metismenu-icon">
                                                        </i>Deposit List
                                                    </a>
                                                </li>

                                            </ul>
                                        </li> -->
                                        @if(auth()->user()->hasRole('admin'))
                                            @if(Request::path() =='users/create' or Request::path() =='users')
                                                <li class="mm-active">
                                            @else
                                                <li>
                                                    @endif
                                                    <a href="#">
                                                        <i class="metismenu-icon pe-7s-users"></i>
                                                        Users
                                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                                    </a>
                                                    <ul>
                                                        <li>
                                                            <a href="/users/create"
                                                               class="{{Request::path() =='users/create' ? 'mm-active' : ''}}">
                                                                <i class="metismenu-icon">
                                                                </i>Create User
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="/users"
                                                               class="{{Request::path() =='users' ? 'mm-active' : ''}}">
                                                                <i class="metismenu-icon">
                                                                </i>User List
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            @endif
                                            <li>
                                                <a href="/">
                                                    <i class="metismenu-icon pe-7s-home"></i>
                                                    Logout
                                                </a>
                                            </li>

            </ul>
        </div>
    </div>
</div>
