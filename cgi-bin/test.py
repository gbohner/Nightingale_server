#!/usr/bin/python
import cgi, cgitb
cgitb.enable()
from subfuncs.data_getter_funcs import *
from subfuncs.visualization_funcs import *
url = "http://www.hscic.gov.uk/catalogue/PUB16719/hosp-epis-stat-admi-diag-2013-14-tab.xlsx"
output_dir = "/var/www/html/data/"

file_path = download_url_to_file(url, output_dir)

# post_data = cgi.FieldStorage()
# query = post_data["query"].value
query = "diabetes"

headers, results_list, results_json = extract_from_hscic_excel(file_path, query)

json_barh = plot_disease_types(headers, results_list)  

print "Content-type: application/json" 
print 
print json_barh
