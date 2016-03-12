# cogni-controls
	
Cognizance is the Annual Technical Festival of IIT Roorkee. And this application is required during the participant verification process at registration desk during the fest.

# Control-1

It verify the followings:
	- The person showing you the receipt has actually paid the fee.
	- This ticket buyer has attended the Cognizance.

# Control-2

It accounts for the allotments done.
	
# set-up

To run on localhost add following lines in you `/opt/lampp/etc/httpd.conf`

```
Listen 8081
<VirtualHost *:8081>
    DocumentRoot "/opt/lampp/htdocs/cogni-controls"
    ServerName localhost
</VirtualHost>
```