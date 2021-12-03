<h1>Laravel Command Job Event Queue And Log</h1>

<b> Purpose : </b>
 <p>
    I make this repository to learn command job event log in laravel
 </p>
    
<b> Run Command : </b>
 <p> php artisan laravel-app:test-command</p>

<b> Run Queue : </b>
<ul>
    <li> php artisan queue:work job_users </li>
    <li >php artisan queue:work job_admins </li> 
</ul>

<b>Using Supervisor For Production</b>
<ul>
    <li>http://supervisord.org/</li>
    <li> Example Config : 
    <code>
    <pre>
    [program:email-queue]
    process_name=%(program_name)s_%(process_num)02d
    command=/usr/bin/php /home/user/Project/ispm/api/artisan queue:work
    autostart=true
    autorestart=true
    user=user
    numprocs=1
    redirect_stderr=true
    stdout_logfile=/home/user/Project/ispm/api/storage/logs/supervisord.log
    </pre>
    </code>
    </li>
</ul>
