  <header class='header-main'>
            <div class='navbar navbar-default sticky-nav' role='navigation'>
                <div class='container'>
                    <div class='navbar-header'>
                        <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'>
                            <span class='sr-only'>Toggle navigation</span>
                            <span class='icon-bar'></span>
                            <span class='icon-bar'></span>
                            <span class='icon-bar'></span>
                        </button>
                        <a class='navbar-brand nav-toplogo img-responsive' href='/'><img src='images/obooko.png' alt=''></a>
                    </div>
                    <div class='navbar-collapse collapse'>
                                                  
                        <ul class='nav navbar-nav navbar-right'>
                            <li class='page-scroll'><a href='/'> Home</a></li>
                             <!-- logged script -->
                            <li class='page-scroll'><a href='/admin'> <i class='fa fa-user'></i>&nbsp;{{session('username')}}</a></li>                               
                            <li class='page-scroll'><a href='/logout'> Logout</a></li>                        
                            <!-- logged script end -->
                        </ul>

                    </div><!--/.nav-collapse -->
                </div><!--/.container-->
            </div><!--navigation end-->
        </header><!--header main end-->