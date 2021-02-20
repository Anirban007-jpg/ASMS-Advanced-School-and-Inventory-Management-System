@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

@endphp


<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="{{ url('/admin/dashboard') }}">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="{{ asset('adminbackend/images/logo-dark.png')}}" alt="">
						  <h3><b>Admin</b></h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		<li class="header nav-small-cap" style="color:  rgb(22, 236, 69);"><strong>General</strong>
		<li class=" {{ ($route == 'admin.dashboard') ? 'active' : '' }} ">
          <a href="{{ url('/admin/dashboard') }}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>
		<li class="treeview {{ ($route == 'profile.view') || ($route == 'password.change') || ($route == 'profile.edit') ? 'active' : '' }} ">
			<a href="">
				<i data-feather="mail"></i>
				<span>Manage Profile</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-right pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li><a href="{{ route('profile.view') }}"><i class="ti-more"></i>Your Profile</a></li>
				<li><a href="{{ route('password.change') }}"><i class="ti-more"></i>Change Password</a></li>
			</ul>
		</li>
		
		@if(Auth('admin')->user()->usertype == 'Admin')
		<li class="treeview {{ ($route == 'verify.user') ? 'active' : '' }} ">
			<a href="">
				<i data-feather="message-circle"></i>
				<span>Verify Email</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-right pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				@if(Auth('admin')->user()->is_email_verified == 0)
					<li><a href="{{ route('verify.user') }}"><i class="ti-more"></i>Verify User through Verification Code</a></li>
				@endif
				@if(Auth('admin')->user()->is_phone_verified == 0)
					<li><a href=""><i class="ti-more"></i>Verify Phone Number</a></li>
				@endif
			</ul>
		</li> 
		@endif

		@if(Auth('admin')->user()->usertype == 'Super-Admin')

		<li class="header nav-small-cap" style="color:  rgb(22, 236, 69);"><b>Account Details Verification</b></li>
		<li class="treeview {{ ($route == 'verify.email') || ($route == 'verify.user') ? 'active' : '' }} ">
			<a href="">
				<i data-feather="message-circle"></i>
				<span>Verify Email</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-right pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li><a href="{{ route('verify.email') }}"><i class="ti-more"></i>Verify Email</a></li>
				@if(Auth('admin')->user()->is_email_verified == 0)
					<li><a href="{{ route('verify.user') }}"><i class="ti-more"></i>Verify Email through Verification Code</a></li>
				@endif
				@if(Auth('admin')->user()->is_phone_verified == 0)
					<li><a href=""><i class="ti-more"></i>Verify Phone Number</a></li>
				@endif
			</ul>
		</li> 

		<li class="header nav-small-cap" style="color:  rgb(22, 236, 69);"><b>For School Use</b></li>
		<li class="treeview {{ ($route == 'user.view') || ($route == 'user.add') || ($route == 'user.edit') ? 'active' : '' }} ">
			<a href="">
				<i data-feather="message-circle"></i>
				<span>Manage User</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-right pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li><a href="{{ route('user.view') }}"><i class="ti-more"></i>View User</a></li>
				<li><a href="{{ route('user.add') }}"><i class="ti-more"></i>Add User</a></li>
			</ul>
		</li> 
		<li class="treeview {{ ($route == 'student.class.view') || ($route == 'student.class.add') ? 'active' : '' }}">
			<a href="">
				<i data-feather="file"></i>
				<span>Class Management</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-right pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li><a href=" {{ route('student.class.view') }} "><i class="ti-more"></i>Student Class</a></li>
				{{-- <li><a href=""><i class="ti-more"></i>Add User</a></li> --}}
			</ul>
		</li>   
		<li class="treeview {{ ($route == 'student.year.view') || ($route == 'student.year.add') || ($route == 'student.year.edit')  ? 'active' : '' }}">
			<a href="">
				<i data-feather="file"></i>
				<span>Year Management</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-right pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li><a href=" {{ route('student.year.view') }} "><i class="ti-more"></i>Student Year</a></li>
				{{-- <li><a href=""><i class="ti-more"></i>Add User</a></li> --}}
			</ul>
		</li>
   
		@endif
          
      </ul>
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>
