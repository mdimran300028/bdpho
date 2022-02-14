<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Dashboards</span>
                    </a>
                </li>


                    @if(Auth::user()->role=='s_admin' or Auth::user()->role=='admin')
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-user-friends"></i>
                        <span>Participants</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('district-wise-participants') }}">District Wise</a></li>
                        <li><a href="{{ route('division-wise-participants') }}">Divisional</a></li>
                        <li><a href="{{ route('category-wise-participants') }}">Category Wise</a></li>
                        <li><a href="ecommerce-products.html">National</a></li>
                        <li><a href="{{ route('participants-reg-no-edit') }}">Reg. No. Edit</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-cog"></i>
                        <span>Event Module</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('bdpho') }}">Manage Event</a></li>
                        <li><a href="{{ route('round') }}">Manage Round</a></li>
                        <li><a href="{{ route('notice') }}">Manage Notice</a></li>
                        <li><a href="{{ route('pages') }}">Manage Pages</a></li>
                    </ul>
                </li>



                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-envelope"></i>
                        <span>SMS</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('district-wise-sms') }}">District Wise</a></li>
                        <li><a href="{{ route('division-wise-sms') }}">Division Wise</a></li>
                    </ul>
                </li>

                    @if(Auth::user()->role=='s_admin')
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="bx bx-user"></i>
                                <span>User Module</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('admin.roles.index') }}">Manage User Role</a></li>
                                <li><a href="{{ route('users') }}">Manage User</a></li>
                            </ul>
                        </li>
                    @endif
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-edit"></i>
                            <span>Exam Module</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('syllabus') }}">Manage Syllabus</a></li>
                            <li><a href="{{ route('question-paper') }}">Manage Question Paper</a></li>
                            <li><a href="{{ route('question-images') }}">Manage Question Images</a></li>
                            <li><a href="{{ route('division-wise-result') }}">Manage Result</a></li>
                            <li><a href="{{ route('participant-selection') }}">Participant Selection</a></li>
                            <li><a href="{{ route('selected-participant') }}">Selected Participants</a></li>
                            <li><a href="{{ route('past-paper') }}">Manage Past Papers</a></li>
                            <li><a href="#">Manage Resources</a></li>
                            <li><a href="{{ route('exam-participant') }}">Exam Participant</a></li>
                        </ul>
                    </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-world"></i>
                        <span>IPhO Module</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">To Be Added</a></li>
                        <li><a href="#">To Be Added</a></li>
                    </ul>
                </li>

                    <li>
                        <a href="{{ route('file-manager') }}" >
                            <i class="bx bx-folder"></i>
                            <span>Uploaded File Manager</span>
                        </a>
                    </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-cog"></i>
                        <span>Setting Module</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('division') }}">Manage Division</a></li>
                        <li><a href="{{ route('district') }}">Manage District</a></li>
                        <li><a href="{{ route('region') }}">Manage Region</a></li>
                        <li><a href="{{ route('class') }}">Manage Class</a></li>
                        <li><a href="{{ route('category') }}">Manage Category</a></li>
                        <li><a href="{{ route('central-member') }}">Manage Central Committee</a></li>
                        <li><a href="{{ route('organizer') }}">Manage Organizer</a></li>
                        <li><a href="{{ route('partner') }}">Manage Partner</a></li>
                        <li><a href="{{ route('slider') }}">Manage Slider</a></li>
                        <li><a href="{{ route('gallery') }}">Manage Gallery</a></li>
                        <li><a href="{{ route('site-info') }}">Site Basic Info</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-share-alt"></i>
                        <span>Multi Level</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="javascript: void(0);">Level 1.1</a></li>
                        <li><a href="javascript: void(0);" class="has-arrow">Level 1.2</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);">Level 2.1</a></li>
                                <li><a href="javascript: void(0);">Level 2.2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                @else
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fa fa-user-friends"></i>
                            <span>Participants</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('district-wise-participants') }}">District Wise</a></li>
                            <li><a href="{{ route('division-wise-participants') }}">Divisional</a></li>
                            <li><a href="{{ route('category-wise-participants') }}">Category Wise</a></li>
                        </ul>
                    </li>
                @endif

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
