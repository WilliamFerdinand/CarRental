<div class="sidebar" data-image="{{ asset('light-bootstrap/img/sidebar-5.jpg') }}" data-color="black">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="" class="simple-text">
                {{ __("Aplikasi Reservasi") }}
            </a>
        </div>
        @php
        $value = session('hak');
         @endphp
        <ul class="nav">
            <li class="nav-item @if($activePage == 'dashboard') active @endif">
                <a class="nav-link" href="/dashboard">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>{{ __("Dashboard") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'buatrental') active @endif">
                <a class="nav-link" href="{{route('addrental')}}">
                    <i class="nc-icon nc-notes"></i>
                    <p>{{ __("Buat Reservasi") }}</p>
                </a>
            </li>
            @if ($value == "Admin")
                <li class="nav-item @if($activePage == 'mobil') active @endif">
                    <a class="nav-link" href="{{route('mobil')}}">
                        <i class="nc-icon nc-bus-front-12"></i>
                        <p>{{ __("Mobil") }}</p>
                    </a>
                </li>
                <li class="nav-item @if($activePage == 'riwayat') active @endif">
                    <a class="nav-link" href="{{route('riwayat')}}">
                        <i class="nc-icon nc-bullet-list-67"></i>
                        <p>{{ __("Riwayat") }}</p>
                    </a>
                </li>
                <li class="nav-item @if($activePage == 'pengambilan') active @endif">
                    <a class="nav-link" href="{{route('pengembalian')}}">
                        <i class="nc-icon nc-icon nc-key-25"></i>
                        <p>{{ __("Pengembalian") }}</p>
                    </a>
                </li>
        @else
            <li class="nav-item @if($activePage == 'riwayatusr') active @endif">
                <a class="nav-link" href="{{route('riwayatrental')}}">
                    <i class="nc-icon nc-bullet-list-67"></i>
                    <p>{{ __("Daftar Transaksi") }}</p>
                </a>
            </li>

        
            @endif
        
                </a>
            </li>
        </ul>
    </div>
</div>
