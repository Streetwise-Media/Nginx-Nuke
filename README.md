##Nginx Nuke

This plugin provides a simple way to flush nginx cache programatically from WordPress. It requires your nginx reverse
proxy to run under the same account as your apache server.

To configure, set the $cache_dir property to the absolute path to your nginx cache folder.

Add any additional events to the actions array that should trigger a cache clear, or simply call NginxNuke::clear() from your
code.