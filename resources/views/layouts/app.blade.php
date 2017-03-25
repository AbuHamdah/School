<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 sidebar sidebar-discover"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 sidebar sidebar-discover"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 sidebar sidebar-discover"> <![endif]-->
<!--[if gt IE 8]> <html class="ie sidebar sidebar-discover"> <![endif]-->
<!--[if !IE]><!-->
<html class="sidebar sidebar-discover">
<!-- <![endif]-->
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <!-- 
	**********************************************************
	In development, use the LESS files and the less.js compiler
	instead of the minified CSS loaded by default.
	**********************************************************
	{{!! Html::style('assets/less/admin/module.admin.stylesheet-complete.sidebar_type.discover.less')!!}}
	{{!! Html::style('assets/less/admin/module.admin.stylesheet-complete.sidebar_type.collapse.less')!!}}
	
	-->
    <!--[if lt IE 9]><link rel="stylesheet" href="assets/components/library/bootstrap/css/bootstrap.min.css" /><![endif]-->
    {!! Html::style('assets/css/admin/module.admin.stylesheet-complete.sidebar_type.discover.min.css')!!}
    {!! Html::style('assets/css/style.css')!!}
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    
	-->
   <style>
	  ul#menu_tables a {
    font-size: 11px !important;
}
	   ul#menu_table a {
    font-size: 11px !important;
}
	</style>
    <!--[if lt IE 9]><link rel="stylesheet" href="assets/components/library/bootstrap/css/bootstrap.min.css" /><![endif]-->
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
      {!! Html::script('assets/js/phone.js')!!}
    
    {!! Html::script('assets/js/crud1.js')!!}
    {!! Html::script('assets/js/jquery.printElement.min.js')!!}
    {!! Html::script('assets/css/admin/module.admin.stylesheet-complete.sidebar_type.collapse.min.css')!!}
    {!! Html::script('assets/components/library/jquery/jquery.min.js?v=v1.0.3-rc2&sv=v0.0.1.1')!!}
    {!! Html::script('assets/components/library/jquery/jquery-migrate.min.js?v=v1.0.3-rc2&sv=v0.0.1.1')!!}
    {!! Html::script('assets/components/library/modernizr/modernizr.js?v=v1.0.3-rc2&sv=v0.0.1.1')!!}
    {!! Html::script('assets/components/plugins/less-js/less.min.js?v=v1.0.3-rc2&sv=v0.0.1.1')!!}
    {!! Html::script('assets/components/modules/admin/charts/flot/assets/lib/excanvas.js?v=v1.0.3-rc2')!!}
    {!! Html::script('assets/components/plugins/browser/ie/ie.prototype.polyfill.js?v=v1.0.3-rc2&sv=v0.0.1.1')!!}
    <script>
    if ( /*@cc_on!@*/ false && document.documentMode === 10)
    {
        document.documentElement.className += ' ie ie10';
    }
    </script>
  <title>
  	
  	school
  	|
  	@yield('title')
  </title>  
  @yield('header')
</head>
<body >
  @if (!Auth::guest())
        <div class="container-fluid menu-hidden">
        <!-- Sidebar Menu -->
        <div id="menu" class="hidden-print hidden-xs ">
            <div id="sidebar-discover-wrapper">
                <ul class="list-unstyled">
                   
                           <li >
                        <a href="#sidebar-discover-social" class="glyphicons plus" data-toggle="sidebar-discover">
                            <i></i>
                            <span>Admission</span>
                        </a>
                        <div id="sidebar-discover-social" class="sidebar-discover-menu">
                            <div class="innerAll text-center border-bottom text-muted-dark">
                                <strong>Admission</strong>
                                <button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                            <ul class="animated fadeIn">
                                <li class="active"><a href="{{ url('/classes')}}">Classes</a>
                                </li>
                                <li><a href="{{ url('/subjects')}}">Subjects</a>
                                </li>
                                <li><a href="{{ url('/student')}}">students</a>
                                </li>
                                <li><a href="{{ url('/questions')}}">Questions</a>
                                </li>
                                <li><a href="{{ url('/social')}}">Add social </a>
                                </li>
                                <li><a href="{{ url('/exam')}}">Go To exam</a>
                                </li>
                                <li><a href="{{ url('/Socialexam')}}">Go To social exam</a>
                                </li>
                              <li><a href="{{ url('/report')}}">View exam report</a>
                                </li>  
                            </ul>
                        </div>
                    </li>
                    <li >
                        <a href="#sidebar-discover-register" class="glyphicons book " data-toggle="sidebar-discover">
                            <i></i>
                            <span>Registration</span>
                        </a>
                        <div id="sidebar-discover-register" class="sidebar-discover-menu">
                            <div class="innerAll text-center border-bottom text-muted-dark">
                                <strong>Registration</strong>
                                <button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                            <ul class="animated fadeIn">
                                <li class="active"><a href="{{ url('/Register_student')}}">Add student</a>
                                </li>
                                <li><a href="{{ url('/Register_parent')}}">Add parent</a>
                                </li>
                                <li><a href="{{ url('/Manage_students')}}">Manage students</a>
                                </li>
                                <li><a href="{{ url('/Withdraw_students')}}">Withdraw students</a>
                                </li>
                                <li><a href="{{ url('/Manage_parents')}}">Manage parents</a>
                                </li>
                                <li><a href="{{ url('/Attendance')}}">Attendance </a>
                                
                           <li >
                       <li class="hasSubmenu">
                                    <a href="#menu_tables" data-toggle="collapse">
                                        
                                        <span>Attendance Report</span>
                                    </a>
                                    <ul class="collapse animated fadeIn" id="menu_tables">
                                        <li class=""><a href="{{url('Attendance_Today')}}">Absence & Tardiness Today</a>
                                        </li>
                                        <li class=""><a href="{{url('Attendance_ByDate')}}">Absence & Tardiness by Date</a>
                                        </li>
                                        <li class=""><a href="{{url('Attendance_Calculate')}}">Attendance Calculation</a>
                                        </li>
                                    </ul>
                                </li>
                    </li>
                                <li><a href="{{ url('/Student_accept')}}">Student list</a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>
                    <li >
                        <a href="#sidebar-discover-HR" class="glyphicons user" data-toggle="sidebar-discover">
                            <i></i>
                            <span>HR</span>
                        </a>
                        <div id="sidebar-discover-HR" class="sidebar-discover-menu">
                            <div class="innerAll text-center border-bottom text-muted-dark">
                                <strong>HR</strong>
                                <button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                            <ul class="animated fadeIn">
                                <li class="active"><a href="{{ url('/Register_employee')}}">Add employee</a>
                                </li>
                                <li><a href="{{ url('/Manage_employee')}}">Manage employees</a>
                                </li>
                                <li><a href="{{ url('/employee_Attendance')}}">Attendance </a>
                                
                           <li >
                       <li class="hasSubmenu">
                                    <a href="#menu_table" data-toggle="collapse">
                                        
                                        <span>Attendance  Report</span>
                                    </a>
                                    <ul class="collapse animated fadeIn" id="menu_table">
                                        <li class=""><a href="{{url('employee_Attendance_Today')}}">Absence & Tardiness Today</a>
                                        </li>
                                        <li class=""><a href="{{url('employee_Attendance_ByDate')}}">Absence & Tardiness by Date</a>
                                        </li>
                                        <li class=""><a href="{{url('emloyee_Attendance_Calculate')}}">Attendance Calculation</a>
                                        </li>
                                    </ul>
                                </li>
                    </li>
                                <li><a href="{{ url('/Leave_applicant')}}">Leave application</a>
                                </li>
                                <li><a style="font-size:12px" href="{{ url('/Leave_applicant_report')}}">Leave application manage</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                     <li >
                        <a href="#sidebar-discover-control" class="glyphicon glyphicon-list-alt " data-toggle="sidebar-discover">
                            <i></i>
                            <span>Marks</span>
                        </a>
                        <div id="sidebar-discover-control" class="sidebar-discover-menu">
                            <div class="innerAll text-center border-bottom text-muted-dark">
                                <strong>Marks</strong>
                                <button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                            <ul class="animated fadeIn">
                                
                
                              <li><a href="{{ url('/Assign_subject')}}">Assign subject</a>
                                </li>
                                <li><a href="{{ url('/Manage_assign')}}">Manage assign subject</a>
                                </li>
                              <li class="hasSubmenu">
                                    <a href="#mark_table" data-toggle="collapse">
                                        
                                        <span>Marks</span>
                                    </a>
                                    <ul class="collapse animated fadeIn" id="mark_table">
                                        <li class=""><a href="{{url('EnterMark')}}">Enter & update marks</a>
                                        </li>
                                        <li class=""><a href="{{url('MarksRecord')}}">Marks record</a>
                                        </li>
                                       
                                    </ul>
                                </li>
                            </ul>
                         </div>
    </li>
                                <li >
                        <a href="#sidebar-discover-contro" class="glyphicons wrench " data-toggle="sidebar-discover">
                            <i></i>
                            <span>Control</span>
                        </a>
                        <div id="sidebar-discover-contro" class="sidebar-discover-menu">
                            <div class="innerAll text-center border-bottom text-muted-dark">
                                <strong>Marks</strong>
                                <button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                            <ul class="animated fadeIn">
                              <li class=""><a href="{{url('Year')}}">Year</a>
                                        </li>
                                        <li class=""><a href="{{url('Term')}}">Term</a>
                                        </li>
                                        <li class=""><a href="{{url('ControlGrade')}}">Grade</a>
                                        </li>
                                        <li class=""><a href="{{url('ControlSubject')}}">Subject</a>
                                        </li>
                                        <li class=""><a href="{{url('Bus')}}">Bus</a>
                                        </li>
                                        <li class=""><a href="{{url('Location')}}">Location</a>
                                        </li>
                                         <li class=""><a href="{{url('Week')}}">Week</a>
                                        </li>
                                         <li class=""><a href="{{url('Assigment')}}">Assigment</a>
                                        </li>
                                         <li class=""><a href="{{url('Position')}}">Position</a>
                                        </li>
                                        <li class=""><a href="{{url('behaviour_type')}}">Behaviour type</a>
                                        </li>
                                        <li class=""><a href="{{url('behaviour_option')}}">Behaviour option</a>
                                        </li>
                                        <li class=""><a href="{{url('observation_type')}}">Observation type</a>
                                        </li>
                                        <li class=""><a href="{{url('observation_option')}}">Observation option</a>
                                        </li>
                            
                          
                            </ul>
                        </div>
                    </li>
                        <li >
                        <a href="#sidebar-discover-Behaviour" class="glyphicon glyphicon-ok-sign " data-toggle="sidebar-discover">
                            <i></i>
                            <span> Behaviour </span>
                        </a>
                        <div id="sidebar-discover-Behaviour" class="sidebar-discover-menu">
                            <div class="innerAll text-center border-bottom text-muted-dark">
                                <strong>Behaviour</strong>
                                <button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                            <ul class="animated fadeIn">
                              <li class=""><a href="{{url('BehaviourAssign')}}">Behaviour Assignemnt</a>
                                        </li>
                                        <li class=""><a href="{{url('BehaviourReport')}}">Behaviour Report</a>
                                        </li>
                                        <li class=""><a href="{{url('BehaviourAnalysis')}}">Behaviour Analysis</a>
                                        </li>
                          
                            </ul>
                        </div>
                    </li>
       <li >
                        <a href="#sidebar-discover-observ" class="glyphicons edit " data-toggle="sidebar-discover">
                            <i></i>
                            <span> Observation </span>
                        </a>
                        <div id="sidebar-discover-observ" class="sidebar-discover-menu">
                            <div class="innerAll text-center border-bottom text-muted-dark">
                                <strong>Behaviour</strong>
                                <button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                            <ul class="animated fadeIn">
                              <li class=""><a href="{{url('AddObservation')}}">Add observation</a>
                                        </li>
                                        <li class=""><a href="{{url('ObservationReport')}}">Observation Report</a>
                                        </li>
                            </ul>
                        </div>
                    </li>
                    </li>
                </ul>
            </div>
        </div>
   @endif
   <div id="content">
  
   <nav class="navbar hidden-print main " role="navigation">
    <div class="navbar-header pull-left">
        <div class="user-action user-action-btn-navbar pull-left border-right">
            <button class="btn btn-sm btn-navbar btn-inverse btn-stroke"><i class="fa fa-bars fa-2x"></i>
            </button>
        </div>
    </div>
    <ul class="main pull-right ">

        <li class="dropdown username">
          
             <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
        </li>
    </ul>
    <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">

            <li><a href="{{ url('/home') }}">Home</a></li>

        </ul>
    </div>
</nav>
    

    @yield('content')
	   </div>
            <div class="clearfix"></div>
        <!-- // Sidebar menu & content wrapper END -->
        <div id="footer" class="hidden-print">
            <!--  Copyright Line -->
            <div class="copy">&copy; 2012 - 2014 - <a href="http://www.mosaicpro.biz">MosaicPro</a> -
                All Rights Reserved. <a href="http://themeforest.net/?ref=mosaicpro"
                target="_blank">Purchase BUSINESS on ThemeForest</a> - Current version:
                v1.0.3-rc2 / <a target="_blank" href="assets/../../CHANGELOG.txt?v=v1.0.3-rc2">changelog</a>
            </div>
            <!--  End Copyright Line -->
        </div>
        <!-- // Footer END -->
    </div>
    <!-- // Main Container Fluid END -->
    <!-- Global -->
    <script data-id="App.Config">
    var App = {};
    var basePath = '',
        commonPath = '../assets/',
        rootPath = '../',
        DEV = false,
        componentsPath = 'assets/components/';
    var primaryColor = '#3695d5',
        dangerColor = '#b55151',
        successColor = '#609450',
        infoColor = '#4a8bc2',
        warningColor = '#ab7a4b',
        inverseColor = '#45484d';
    var themerPrimaryColor = primaryColor;
    </script>
 
    {!! Html::script('assets/components/library/bootstrap/js/bootstrap.min.js?v=v1.0.3-rc2&sv=v0.0.1.1')!!}
    {!! Html::script('assets/components/plugins/nicescroll/jquery.nicescroll.min.js?v=v1.0.3-rc2&sv=v0.0.1.1')!!}
    {!! Html::script('assets/components/plugins/breakpoints/breakpoints.js?v=v1.0.3-rc2&sv=v0.0.1.1')!!}
    {!! Html::script('assets/components/plugins/preload/pace/pace.min.js?v=v1.0.3-rc2&sv=v0.0.1.1')!!}
    {!! Html::script('assets/components/plugins/preload/pace/preload.pace.init.js?v=v1.0.3-rc2&sv=v0.0.1.1')!!}
    {!! Html::script('assets/components/core/js/animations.init.js?v=v1.0.3-rc2')!!}
    {!! Html::script('assets/components/core/js/sidebar.main.init.js?v=v1.0.3-rc2')!!}
    {!! Html::script('assets/components/core/js/sidebar.discover.init.js?v=v1.0.3-rc2')!!}
    {!! Html::script('assets/components/core/js/core.init.js?v=v1.0.3-rc2')!!}
    {!! Html::script('export/tableExport.js')!!}
    {!! Html::script('export/jquery.base64.js')!!}
  

@yield('footer')
    
</body>
</html>
