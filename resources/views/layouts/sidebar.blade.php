<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">

                <li>
                    <a href="{{route('master.index')}}"><i class="menu-icon fa fa-laptop" @class(["nav-link", "active"=> request()->routeIs('dashboard.*') ])></i>Dashboard </a>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti-server"></i>Master</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li class="nav-item"><i class="fa fa-building-o"></i><a class="nav-link" href="{{ route('master.toko.index')}}" @class(["nav-link", "active"=> request()->routeIs('master.toko.index.*') ])>Data Toko</a></li>
                        <li class="nav-item"><i class="fa fa-users"></i><a href="{{ route('master.user.index')}}"> Data User</a></li>
                        <li class="nav-item"><i class="fa fa-laptop"></i><a href="{{ route('master.barang.index')}}"> Data Barang</a></li>
                        <li class="nav-item"><i class="fa fa-tag"></i><a href="{{ route('master.brand.index')}}"> Data Brand</a></li>
                        <li class="nav-item"><i class="fa fa-download"></i><a href="{{ route('master.supplier.index')}}"> Data Supplier</a></li>
                        <li class="nav-item"><i class="fa fa-star"></i><a href="{{ route('master.promo.index')}}"> Data Promo</a></li>
                        <li class="nav-item"><i class="ti-user"></i><a href="{{ route('master.member.index')}}"> Data Member</a></li>
                        <li class="nav-item"><i class="fa fa-shield"></i><a href="{{ route('master.leveluser.index')}}"> Level User</a></li>
                        <li class="nav-item"><i class="fa fa-sitemap"></i><a href="{{route('master.jenisbarang.index')}}"> Jenis Barang</a></li>
                        <li class="nav-item"><i class="fa fa-sitemap"></i><a href="{{ route('master.levelharga.index')}}"> Level Harga</a></li>
                        <li class="nav-item"><i class="fa fa-tasks"></i><a href="{{ route('master.stockbarang.index')}}"> Stock Barang</a></li>
                        <li class="nav-item"><i class="fa fa-edit"></i><a href="{{ route('master.stockopname.index')}}"> Stock Opname</a></li>
                        <li class="nav-item"><i class="fa fa-laptop"></i><a href="{{ route('master.planorder.index')}}"> Plan Order - All Toko</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti-truck"></i>Mutasi Toko</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-table"></i><a href="tables-basic.html">Mutasi Toko1</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-shopping-cart"></i>Transaksi</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li class="nav-item"><i class="fa fa-shopping-cart"></i><a href="{{ route('master.pembelianbarang.index')}}">Pembelian Barang</a></li>
                        <li class="nav-item"><i class="fa fa-truck"></i><a href="{{ route('master.pengirimanbarang.index')}}">Pengiriman Barang</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Laporan</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-fort-awesome"></i><a href="font-fontawesome.html">laporan1</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tags"></i>Addon</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-line-chart"></i><a href="charts-chartjs.html">Addon1</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-book"></i>Reture</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-map-o"></i><a href="maps-gmap.html">Reture1</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Administrator</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-map-o"></i><a href="maps-gmap.html">Admin1</a></li>
                    </ul>
                </li>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <li>
                    <a href="index.html"><i class="menu-icon fa fa-sign-out"></i>Logout </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->
