<header>
    <nav class="navbar navbar-default navbar-fixed-top top-nav-collapse" role="navigation">
        <div class="container" style="margin-left: 10px; margin-right: 10px;">
            <div class="flex-header">
                
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="active"><a href="/" class="nav-link">Ratsuchende/r</a></li>
                        <li class="dropdown"><a href="/" class="nav-link">Addressen/ Kontakt</a></li>
                        <li class="dropdown"><a href="/documentbop/show" class="nav-link">Dokumente</a></li>
                        <li class="dropdown"><a href="/career" class="nav-link">Statistik</a></li>
                    </ul>

                    <!-- Right-side Logout Button -->
                    <ul class="nav navbar-nav navbar-right">
                        @auth
                        <li>
                            <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out-alt"></i> Logout
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        @endauth
                    </ul>
                    
                </div><!-- /.navbar-collapse -->
                
                    
                

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
            </div>
        </div><!-- /.container -->
    </nav>
</header>

<!-- ======== OFFCANVAS MENU ========= -->
<div class="offcanvas-menu offcanvas-effect visible-xs">
    <button type="button" class="close" aria-hidden="true" data-toggle="offcanvas" id="off-canvas-close-btn">&times;</button>
    <h3>iTenology</h3>
    <div>
        <div>
            <ul>
                <li><a href="/"><i class="fa fa-users"></i> Ratsuchende</a></li>
                <li><a href="/aboutus"><i class="fa"></i>Addressen/ Kontakt</a></li>
                <li><a href="/documentbop/show"><i class="fa"></i>Dokumente</a></li>
                <li><a href="/contactus"><i class="fa"></i>Statistik</a></li>

                <!-- Logout in Mobile Menu -->
                @auth
                <li>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out-alt"></i> Logout
                    </a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</div><!-- .offcanvas-menu -->
