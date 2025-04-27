<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Reservasi Meja</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="@if (request()->route()->getName() == 'reservasi.index')
                active
            @endif">
                <a href="{{route('reservasi.index')}}" class="nav-link"><i
                        class="fas fa-fire"></i><span>Reservasi</span></a>
            </li>
            <li class="@if (request()->route()->getName() == 'reservasi.trashed')
                active
            @endif">
                <a href="{{route('reservasi.trashed')}}" class="nav-link"><i class="fas fa-trash"></i><span>Kotak
                        Sampah</span></a>
            </li>
        </ul>
    </aside>
</div>