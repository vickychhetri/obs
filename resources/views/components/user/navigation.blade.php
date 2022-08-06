<nav id="sidebar" >
    <div class="sidebar-header" style="background-color:#030924;">
        <h1>
            <a href="/UDashboard">{{env("APPLICATION_NAME")}}</a>
        </h1>
        <span><svg xmlns="http://www.w3.org/2000/svg" width="30" height="25" fill="white" class="bi bi-activity"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2Z" />
            </svg></span>
    </div>
    <div class="profile-bg"></div>
    <ul class="list-unstyled components">
        <li>
            <a href="/UDashboard">
                <i class="fas fa-th-large"></i>
                Dashboard
            </a>
        </li>

        <li>
            <a href="#Tutorials" data-toggle="collapse" aria-expanded="false">
                <i class="far fa-window-restore"></i>
                My Learning
                <i class="fas fa-angle-down fa-pull-right"></i>
            </a>
            <ul class="collapse list-unstyled" id="Tutorials">
                <li>
                    <a href="/User/Start-Course"> Obstetrical Emergencies</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#Report" data-toggle="collapse" aria-expanded="false">
                <i class="far fa-window-restore"></i>
                Report
                <i class="fas fa-angle-down fa-pull-right"></i>
            </a>
            <ul class="collapse list-unstyled" id="Report">
                <li>
                    <a href="/User/View/Test">Test</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#SupportTeam" data-toggle="collapse" aria-expanded="false">
                <i class="far fa-window-restore"></i>
                Support
                <i class="fas fa-angle-down fa-pull-right"></i>
            </a>
            <ul class="collapse list-unstyled" id="SupportTeam">
          
                <li>
                    <a href="https://helpdesk.learnvirtual.in/">Help Desk</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>