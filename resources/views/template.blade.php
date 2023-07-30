<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!--<title> Drop Down Sidebar Menu | CodingLab </title>-->
    <link rel="stylesheet" href="{{ asset('assets/css/sidebar.css') }}">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="sidebar close">
        <div class="logo-details">
            <i>
                <img src="{{ asset('assets/image/logo-gadai-express.svg') }}" alt="Gadai Express Logo">
            </i>
            <span class="logo_name">Simulasi Gadai</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="/kategori">
                    <i class='bx bx-category-alt'></i>
                    <span class="link_name">Kategori</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="/kategori">Kategori</a></li>
                </ul>
            </li>
            <li>
                <a href="/merk">
                    <i class='bx bx-purchase-tag'></i>
                    <span class="link_name">Merk</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="/merk">Merk</a></li>
                </ul>
            </li>
            <li>
                <a href="/barang">
                    <i class='bx bx-book-alt'></i>
                    <span class="link_name">Barang</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="/barang">Barang</a></li>
                </ul>
            </li>
            <li>
                <a href="/user">
                    <i class='bx bx-user'></i>
                    <span class="link_name">Pengguna</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="/user">Pengguna</a></li>
                </ul>
            </li>
            <li>
                <div class="profile-details">
                    <div class="profile-content">
                        <!--<img src="image/profile.jpg" alt="profileImg">-->
                    </div>
                    <div class="name-job">
                        <div class="profile_name">{{ Auth::user()->name }}</div>
                    </div>
                    <form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('logout') }}"
                        method="POST">
                        @csrf
                        <button class="logout" style="background-color:transparent; border:none" type="submit">
                            <i class='bx bx-log-out'></i>
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
    @yield('content')


    <script>
        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e) => {
                let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
                arrowParent.classList.toggle("showMenu");
            });
        }
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".bx-menu");
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });
    </script>

    <script>
        $('.without-caption').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            closeBtnInside: true,
            mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
            image: {
                verticalFit: true
            },
            zoom: {
                enabled: true,
                duration: 500, // don't foget to change the duration also in CSS
                easing: 'ease-in-out',
                opener: function(openerElement) {
                    // openerElement is the element on which popup was initialized, in this case its <a> tag
                    // you don't need to add "opener" option if this code matches your needs, it's defailt one.
                    return openerElement.is('img') ? openerElement : openerElement.find('img');
                }
            }
        });
    </script>
</body>

</html>
