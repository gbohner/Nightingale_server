#!/usr/bin/python
import sys
from subfuncs.mytestclass import *

url = "http://www.hscic.gov.uk/catalogue/PUB16719/hosp-epis-stat-admi-diag-2013-14-tab.xlsx"
output_folder = "/data/"



print "Content-type: text/html"
print
print "<html><head>"
print ""
print "</head><body>"
print "Hello. This is python speaking.\n"
print sys.version
print sys.prefix

print "</body></html>"


#print sys.version
#print sys.prefix
