<div class="mb-4 sidebar-widget category-widget">
    <div class="widget-title">
        <h4>Category</h4>
    </div>
    <div class="widget-content">
        <ul class="category-list ">

            <li class="current"> <a href="{{ route('member.dashboard') }}"><i class="fab fa fa-thermometer "></i>
                    Dashboard
                </a></li>

            <li class="current"> <a href="{{ route('member.download.documents') }}"><i class="fab fa fa-download"></i>
                    Download Documents
                </a></li>


            <li><a href="{{route('member.password.view')}}"><i class="fa fa-cog" aria-hidden="true"></i> Settings</a>
            </li>

            <li>
                <a href="{{route('member.profile.view')}}">
                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                    Profile
                    @if(auth()->user()->photo == null)
                    <span class="p-1 shadow badge badge-danger">
                        Update profile
                    </span>
                    @endif

                </a>
            </li>
            <li>
                <a href="{{route('member.active.assignment')}}">
                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                    Assignment
                    @if(\App\Models\Task::where('user_id', auth()->user()->id)->where('status', 'active')->exists())
                    <span class="p-1 shadow badge badge-success">
                        Active
                    </span>
                    @endif
                </a>
            </li>
            <li><a href="{{route('member.notice.view')}}"><i class="fa fa-bells" aria-hidden="true"></i> Notifications
                </a></li>
            <li><a href="{{route('member.all.allPreviousAssignments')}}"><i class="fa fa-tasks" aria-hidden="true"></i>
                    Activities </a></li>

            <li><a href="{{route('apostolic.history.view')}}"><i class="fa fa-tasks" aria-hidden="true"></i> Apostolic
                    work
                    History
                </a></li>
            <li><a href="{{ route('member.logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout </a>
            </li>
        </ul>
    </div>
</div>
