<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">

        <!-- Light Logo-->
        <a href="{{route('auth.index')}}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{asset('backend/my-image/abu-beyaz-dikey.svg')}}" alt="" height="40">
                    </span>
            <span class="logo-lg">
                        <img src="{{asset('backend/my-image/abu-beyaz.svg')}}" alt="" height="40">
                    </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>

                @if( Auth::user()->status == 2 or Auth::user()->status==1 )
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarUsers" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                            <i class="ri-shield-user-line"></i> <span data-key="t-dashboards">Kullanıcılar</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarUsers">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item">
                                    <a href="{{route('users.create')}}" class="nav-link"><span data-key="t-job">Yeni Kullanıcı</span> <span class="badge badge-pill bg-success" data-key="t-new">+</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('users.index')}}" class="nav-link" data-key="t-analytics"> Kullanıcıları Listele </a>
                                </li>
                            </ul>
                        </div>
                    </li> <!-- end Dashboard Menu -->
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarCategory" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                            <i class="ri-apps-2-line"></i> <span data-key="t-apps">Kys</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarCategory">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{route('kys.code.create')}}" class="nav-link"><span data-key="t-job">Yeni KYS Kodu Ekle</span> <span class="badge badge-pill bg-success" data-key="t-new">+</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('kys.code.index')}}" class="nav-link"><span data-key="t-job">KYS Kodu Listele</span></a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarProject" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                            <i class="ri-survey-line"></i> <span data-key="t-apps">Topluma Yönelik Sportif Sanatsal Kültürel Etkinlikler</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarProject">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{route('project.create')}}" class="nav-link"><span data-key="t-job">Yeni Proje Ekle</span> <span class="badge badge-pill bg-success" data-key="t-new">+</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('project.index')}}" class="nav-link"><span data-key="t-job">Proje Listele</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarEducation" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                            <i class="ri-book-mark-line"></i> <span data-key="t-apps">Digital Platform veye Kanal</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarEducation">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{route('education.create')}}" class="nav-link"><span data-key="t-job">Yeni Eğitim Faliyeti Ekle</span> <span class="badge badge-pill bg-success" data-key="t-new">+</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('education.index')}}" class="nav-link"><span data-key="t-job">Eğitim Faliyeti Listele</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarSks" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                            <i class="ri-football-line"></i> <span data-key="t-apps">Topluma Direkt Fayda Sağlayan Etkinlikler</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarSks">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{route('sks.create')}}" class="nav-link"><span data-key="t-job">SKS Faliyeti Ekle</span> <span class="badge badge-pill bg-success" data-key="t-new">+</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('sks.index')}}" class="nav-link"><span data-key="t-job">SKS Faliyetleri Listele</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarCultural" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                            <i class="ri-tv-line"></i> <span data-key="t-apps">Protokol İşbirliği Sözleşmeleri</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarCultural">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{route('sks.create')}}" class="nav-link"><span data-key="t-job">Kültürel Faliyeti Ekle</span> <span class="badge badge-pill bg-success" data-key="t-new">+</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('sks.index')}}" class="nav-link"><span data-key="t-job">Kültürel Faliyetleri Listele</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
                @if(Auth::user()->project_activities == 'on')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarProject" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                            <i class="ri-survey-line"></i> <span data-key="t-apps">Proje</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarProject">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{route('project.create')}}" class="nav-link"><span data-key="t-job">Yeni Proje Ekle</span> <span class="badge badge-pill bg-success" data-key="t-new">+</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('project.index')}}" class="nav-link"><span data-key="t-job">Proje Listele</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
                @if(Auth::user()->education_activities == 'on')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarEducation" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                            <i class="ri-book-mark-line"></i> <span data-key="t-apps">Eğitim Faliyetleri</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarEducation">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{route('education.create')}}" class="nav-link"><span data-key="t-job">Yeni Eğitim Faliyeti Ekle</span> <span class="badge badge-pill bg-success" data-key="t-new">+</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('education.index')}}" class="nav-link"><span data-key="t-job">Eğitim Faliyeti Listele</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif

                @if(Auth::user()->ssk_activities == 'on')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarSks" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                            <i class="ri-football-line"></i> <span data-key="t-apps">SKS Faliyetleri</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarSks">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{route('sks.create')}}" class="nav-link"><span data-key="t-job">SKS Faliyeti Ekle</span> <span class="badge badge-pill bg-success" data-key="t-new">+</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('sks.index')}}" class="nav-link"><span data-key="t-job">SKS Faliyetleri Listele</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif

                @if(Auth::user()->cultural_activities == 'on')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarCultural" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                            <i class="ri-tv-line"></i> <span data-key="t-apps">Kültürel Faliyetler</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarCultural">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{route('sks.create')}}" class="nav-link"><span data-key="t-job">Kültürel Faliyeti Ekle</span> <span class="badge badge-pill bg-success" data-key="t-new">+</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('sks.index')}}" class="nav-link"><span data-key="t-job">Kültürel Faliyetleri Listele</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif







            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
