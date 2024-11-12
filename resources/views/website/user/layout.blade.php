<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Portal Berita Sidowarek </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

		<!-- CSS here -->
            <link rel="stylesheet" href="{{asset('assets2/css/bootstrap.min.css')}}">
            <link rel="stylesheet" href="{{asset('assets2/css/owl.carousel.min.css')}}">
            <link rel="stylesheet" href="{{asset('assets2/css/ticker-style.css')}}">
            <link rel="stylesheet" href="{{asset('assets2/css/flaticon.css')}}">
            <link rel="stylesheet" href="{{asset('assets2/css/slicknav.css')}}">
            <link rel="stylesheet" href="{{asset('assets2/css/animate.min.css')}}">
            <link rel="stylesheet" href="{{asset('assets2/css/magnific-popup.css')}}">
            <link rel="stylesheet" href="{{asset('assets2/css/fontawesome-all.min.css')}}">
            <link rel="stylesheet" href="{{asset('assets2/css/themify-icons.css')}}">
            <link rel="stylesheet" href="{{asset('assets2/css/slick.css')}}">
            <link rel="stylesheet" href="{{asset('assets2/css/nice-select.css')}}">
            <link rel="stylesheet" href="{{asset('assets2/css/style.css')}}">
   </head>

   <body>

    @include('website.user.header')
    @include('website.user.home')
    {{-- @include('website.user.youtube') --}}
    @include('website.user.category')
    @include('website.user.about')
    @include('website.user.contact')
   
    <main>
        @yield('content') 
    </main>
    
  
   
	<!-- JS here -->
	<!-- Content of the page -->
    <script>
        // API key dari OpenWeatherMap
        const apiKey = '58eeab2446342ea74e69baf8213ac725';
        
        // Mendapatkan tanggal saat ini
        const date = new Date();
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        document.getElementById('current-date').textContent = date.toLocaleDateString('id-ID', options);
        
        // Mendapatkan lokasi dan suhu menggunakan OpenWeatherMap
        function getWeather(lat, lon) {
            const url = `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&appid=${apiKey}&units=metric`;
            
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('location').textContent = data.name; // Nama kota
                    document.getElementById('temperature').textContent = `${Math.round(data.main.temp)}º`; // Suhu
                })
                .catch(error => {
                    console.log('Error:', error);
                    document.getElementById('location').textContent = 'Gagal mendapatkan lokasi';
                });
        }
        
        // Menggunakan Geolocation API untuk mendapatkan koordinat pengguna
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                position => {
                    const lat = position.coords.latitude;
                    const lon = position.coords.longitude;
                    getWeather(lat, lon); // Panggil fungsi untuk mendapatkan cuaca
                },
                error => {
                    console.log('Error getting location:', error);
                    document.getElementById('location').textContent = 'Gagal mendapatkan lokasi';
                }
            );
        } else {
            document.getElementById('location').textContent = 'Geolocation tidak didukung di browser ini';
        }
    </script>
        
    
		<!-- All JS Custom Plugins Link Here here -->
        <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="./assets/js/popper.min.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="./assets/js/jquery.slicknav.min.js"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="./assets/js/owl.carousel.min.js"></script>
        <script src="./assets/js/slick.min.js"></script>
        <!-- Date Picker -->
        <script src="./assets/js/gijgo.min.js"></script>
		<!-- One Page, Animated-HeadLin -->
        <script src="./assets/js/wow.min.js"></script>
		<script src="./assets/js/animated.headline.js"></script>
        <script src="./assets/js/jquery.magnific-popup.js"></script>

        <!-- Breaking New Pluging -->
        <script src="./assets/js/jquery.ticker.js"></script>
        <script src="./assets/js/site.js"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="./assets/js/jquery.scrollUp.min.js"></script>
        <script src="./assets/js/jquery.nice-select.min.js"></script>
		<script src="./assets/js/jquery.sticky.js"></script>
        
        <!-- contact js -->
        <script src="./assets/js/contact.js"></script>
        <script src="./assets/js/jquery.form.js"></script>
        <script src="./assets/js/jquery.validate.min.js"></script>
        <script src="./assets/js/mail-script.js"></script>
        <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="./assets/js/plugins.js"></script>
        <script src="./assets/js/main.js"></script>
        
        <script>
            // Mendapatkan parameter 'page' dari URL
            const urlParams = new URLSearchParams(window.location.search);
            const page = urlParams.get('page');
        
            // Menghapus kelas 'active' dari semua tab
            document.querySelectorAll('.nav-item').forEach(tab => {
                tab.classList.remove('active');
            });
        
            // Menambahkan kelas 'active' ke tab sesuai dengan parameter 'page'
            if (page) {
                const activeTab = document.querySelector(`.nav-link[href*="?page=${page}"]`);
                if (activeTab) {
                    activeTab.classList.add('active');
                }
            } else {
                // Jika tidak ada 'page' dalam URL, default ke 'home'
                document.getElementById('nav-home-tab').classList.add('active');
            }
        </script>
        
    </body>
</html>