<nav id="sidebar">
            <div class="sidebar-header">
                <h1>
                    <a href="/">{{env("APPLICATION_NAME")}}</a>
                </h1>
                <span>A</span>
            </div>
            <div class="profile-bg"></div>
            <ul class="list-unstyled components">
                <li>
                    <a href="/Dashboard">
                        <i class="fas fa-th-large"></i>
                        Dashboard
                    </a>
                </li>
                  <li>
                    <a href="#Users" data-toggle="collapse" aria-expanded="false">
                    <i class="far fa-window-restore"></i>
                       Users
                        <i class="fas fa-angle-down fa-pull-right"></i>
                    </a>
                    <ul class="collapse list-unstyled" id="Users">
                        <li>
                            <a href="/List-User">List Users</a>
                        </li>
                        <li>
                            <a href="/List-User-report"> Individual Records </a>
                        </li>
                        <li>
                            <a href="/Full-Reports-Generate-Now">Master Reports</a>
                        </li>
                    </ul>
                </li>
                 
               </ul>
        </nav>