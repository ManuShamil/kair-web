<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width" />
    <title>KairHealth - @yield('title')</title>
  </head>
  <body>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">
    <link rel='stylesheet' id='inspiry-google-fonts-css'  href='//fonts.googleapis.com/css?family=Montserrat%3A300%2C300i%2C400%2C400i%2C500%2C500i%2C600%2C600i%2C700%2C700i&#038;subset=latin%2Clatin-ext&#038;ver=3.0.0' type='text/css' media='all' />
    <link rel='stylesheet' id='font-awesome-css-css'  href='//mpreborn.b-cdn.net/wp-content/themes/inspiry-medicalpress/common/css/vendors/fontawesome-all.min.css?ver=5.0.8' type='text/css' media='all' />
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    
    <div id="app">

        @yield('content')

        

    </div>








    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-149343032-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-149343032-1');
    </script>

    <!--Strt of Tawk.to Script-->
    <script type="text/javascript">
      var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
      (function(){
      var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
      s1.async=true;
      s1.src='https://embed.tawk.to/5ea095b669e9320caac65a39/default';
      s1.charset='UTF-8';
      s1.setAttribute('crossorigin','*');
      s0.parentNode.insertBefore(s1,s0);
      })();
    </script>
    <!--End of Tawk.to Script-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    @component('components.admin.style') @endcomponent
  </body>
</html>