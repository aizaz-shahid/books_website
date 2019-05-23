<!DOCTYPE html>
<html lang='en'>
<head>

<!-- lgc2014 meta -->
<meta charset='utf-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<meta name='description' content=''>
<meta name='author' content='obooko'>
<title>Obooko CMS - Site Administration</title>



<!-- bootstrap core style -->
 <link href="{{ asset('/psm/bootstrap/css/bootstrap.css') }}" rel='stylesheet'>
     
<!-- lgc2014 custom font-->
<link href="{{ asset('/psm/bootstrap/font-awesome/css/font-awesome.min.css') }}" rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Raleway:300,400,700,900' rel='stylesheet' type='text/css'>

<!-- lgc2014 custom styles -->
<link href="{{ asset('/psm/bootstrap/css/lgc_main.css') }}" rel='stylesheet'>
<link href="{{ asset('/psm/bootstrap/css/lgc_atm.css') }}" rel='stylesheet'>
<link href="{{ asset('/psm/bootstrap/css/lgc_psb.css') }}" rel='stylesheet'>
<link href="{{ asset('/psm/bootstrap/css/fractionslider.css') }}" rel='stylesheet'>

          <link href="{{ asset('/psm/pg/jquery.Jcrop.min.css') }}" rel='stylesheet' type='text/css' />
          <link type='text/css'rel='stylesheet' href="{{ asset('/psm/paji/pajinate.css') }}"  />

  @yield('custom_css')
</head>

<body>
      @include('cms/includes.header')

      <div class='container'>
    <div class='row'>
      <div class='col-sm-3 col-xs-12'>
              @include('cms/includes.sidebar')
      </div>
            <div class='col-sm-9 col-xs-12'>
              <section class="content">
                    @yield('content')
              </section><!-- /.content -->
<hr size=1>
      </div>
    </div> 
    </div>



      <!-- jquery core -->
  <script type='text/javascript' src='http://code.jquery.com/jquery-1.11.1.min.js'></script>
  <script type='text/javascript' src='http://code.jquery.com/qunit/qunit-1.11.0.js'></script>
  <script src="{{asset('/psm/bootstrap/js/bootstrap.js') }}"></script>            
   <script src="{{asset('/psm/pg/jquery.Jcrop.min.js') }}"></script>
        <script src="{{asset('/psm/pg/script.js') }}"></script> 
               
        <script type='text/javascript'>
        <!--
        function calculate(multiplier) {
        var product = multiplier*0.066;
        document.getElementById('total').innerHTML = product;
        }
        -->
        </script> 
        
    
    <script type='text/javascript' src="{{asset('/psm/paji/jquery.pajinate.js') }}"></script>
  @yield('custom_javascript')
    <script type='text/javascript'>
      $(document).ready(function(){
        $('#paging_container1').pajinate({
          items_per_page : 42

          
        });
      });
        </script>

<script src="{{ asset('/psm/ckeditor/ckeditor.js') }}" type='text/javascript'></script>

</body>
</html>