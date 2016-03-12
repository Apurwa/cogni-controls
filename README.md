# cogni-controls

# set-up

To run on localhost add following lines in you `/opt/lampp/etc/httpd.conf`

```
Listen 8081
<VirtualHost *:8081>
    DocumentRoot "/opt/lampp/htdocs/cogni-controls"
    ServerName localhost
</VirtualHost>
```