<? 

/*
site_cfg.php Should set the following config params:
$sitecfg_remotecmd Determines whether to use SSH for the IRC msgme(optional, default is 0 for disabled).
$sitecfg_target_email Optional email address to send the report url to. Email is disabled if this isn't specified.
$sitecfg_httpbase URL where the pub_html scripts are located.
$sitecfg_emailhost Optional email host portion of the sender email address. Email is disabled if this isn't specified.
$sitecfg_sshhost SSH host used for the SSH IRC msgme(only needed when $sitecfg_remotecmd is non-zero).
$sitecfg_workdir Absolute path to the location of these scripts.
$sitecfg_logplainhttp200 This is optional, default is zero. When non-zero, the following is enabled: writeNormalLog("RESULT: 200")
$sitecfg_mysqldb_username MySQL username.
$sitecfg_mysqldb_pwdpath Path to file containing MySQL password.
$sitecfg_mysqldb_database MySQL database.

$sitecfg_homepage_header Optional HTML to include near the beginning of the "reports.php"(homepage) <body>.
$sitecfg_homepage_footer Optional HTML to include at the very end of the "reports.php"(homepage) <body>.
$sitecfg_reportupdatepage_header Optional HTML to include near the beginning of the reports.php report update-pages <body>.
$sitecfg_reportupdatepage_footer Optional HTML to include at the very end of the reports.php report update-pages <body>.
$sitecfg_sitenav_header Optional HTML to include immediately before the site navigation-bar.

$sitecfg_irc_msg_dirpath Dirpath used when sending IRC messages with appendmsg_tofile, if not specified this functionality is disabled.
$sitecfg_irc_msgtargets["{system}"]= "{filename}"; IRC msgtarget filename to use with the specified system, if not specified IRC messages are disabled. This is used for sysupdate-detected notifs.
$sitecfg_irc_msgtarget Similar to sitecfg_irc_msgtargets, except this is an optional string filename to use for all systems.
$sitecfg_irc_msgtargets_whitelist Array of strings for filenames allowed to be used by appendmsg_tofile. If not specified, this is loaded from sitecfg_irc_msgtarget(s). 'msgme' is hard-coded to be allowed regardless.

$sitecfg_notif_fedi_append Optional string, if set " " followed by this string is appended to fedi notifications. Only used for the main sysupdate-detected notif. This can be used for hashtags for example.
$sitecfg_notif_fedi_append_system["{system}"]= "{str}"; Similar to sitecfg_notif_fedi_append, except this is an array of append-strings to use with the specified system. Handled following sitecfg_notif_fedi_append.

$sitecfg_postproc_cmd This is the command which will be executed by postproc.php, if this is set. The full command passed to system() is: "$sitecfg_postproc_cmd $reportdate $system".

$sitecfg_load_titlelist_cmd See ninsoap.php.

$sitecfg_consoles_deviceid["{system}"]["{regioncode}"] = "{id}"; DeviceId to use, overrides the value from the db.
*/





$sitecfg_httpbase  = "https://xxxxxxxx.com/ninupdates/pub_html/";
$sitecfg_workdir = "/var/www/html/ninupdates/ninupdates/";
$sitecfg_mysqldb_username = "your-mysql-username";
$sitecfg_mysqldb_pwdpath = "your-mysql-password";
$sitecfg_mysqldb_database = "ninupdates-you-need-to-create-mysql-database"




?>
