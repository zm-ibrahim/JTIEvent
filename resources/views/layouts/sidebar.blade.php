<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="#">JTI-EVENT</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="#">JTI-E</a>
    </div>
    <ul class="sidebar-menu">
        <li class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard.index') }}">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-link">
            <a href="#">
                <i class="far fa-file-alt"></i>
                <span>Sertifikat</span>
            </a>
        </li>
        <li class="nav-link {{ Request::is('dashboard/event*') ? 'active' : '' }}">
            <a 
            @switch(auth()->user()->role)
                @case('ADMIN')
                    href="{{ route('dashboard.event.index') }}"
                    @break
                @case('JUDGE')
                    href="{{ route('dashboard.event.judge') }}"
                    @break
                @default
                    href="{{ route('dashboard.event.participant') }}"
            @endswitch
            >
                <i class="fas fa-trophy"></i>
                <span>Lomba</span>
            </a>
        </li>
        @cannot('admin')
            <li class="nav-link {{ Request::is('dashboard/personal-data/*') ? 'active' : '' }}">
                <a
                    href="{{ route('dashboard.personal-data.' . (Auth::user()->role == 'JUDGE' ? 'judge' : 'participant')) }}">
                    <i class="fas fa-file-alt"></i>
                    <span>Data Diri</span>
                </a>
            </li>
        @endcannot
        @can('admin')
            <li class="nav-link {{ Request::is('dashboard/add-judge') ? 'active' : '' }}">
                <a href="{{ route('dashboard.add-judge') }}">
                    <i class="fas fa-file-alt"></i>
                    <span>Tambah Juri</span>
                </a>
            </li>
        @endcan
    </ul>
</aside>
