header("Status: 301 Moved Permanently");
header("Location:https://design.studio-shed.com/lookup/?". $_SERVER['QUERY_STRING']);
exit;