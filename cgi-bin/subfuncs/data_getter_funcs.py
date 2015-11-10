#/usr/bin/python

import urllib2
import os

def download_url_to_file(url, output_folder):
	file_name = url.split('/')[-1]
	u = urllib2.urlopen(url)
	if os.path.exists(output_folder+file_name):
		return output_folder+file_name
	f = open(output_folder+file_name, 'wb')
	meta = u.info()
	file_size = int(meta.getheaders("Content-Length")[0])
	
	file_size_dl = 0
	block_sz = 8192
	while True:
	    buffer = u.read(block_sz)
	    if not buffer:
        	break

	    file_size_dl += len(buffer)
	    f.write(buffer)
	
	f.close()
	os.chmod(output_folder+file_name,0777)
	return output_folder+file_name

def extract_from_hscic_excel(file_name, query_phrase):
	import xlrd #importing excel reader
	from collections import OrderedDict
	import simplejson as json
	
	#remove white spaces and make everything lower case
	query_phrase= ''.join(c.lower() for c in query_phrase if not c.isspace())

	wb = xlrd.open_workbook(file_name)
	sh = wb.sheet_by_name("All Diagnoses 4 Character")

	headers = sh.row_values(16)
	results_list = []

	for i1 in range(18,sh.nrows):
	    disease = sh.row_values(i1)[1]
	    disease = ''.join(c.lower() for c in disease if not c.isspace())
	    if query_phrase in disease:
	        row_values = sh.row_values(i1)
	        result = OrderedDict()
        	for colnum in range(len(headers)):
	            result[headers[colnum]] = row_values[colnum]
            
        	results_list.append(result)

	results_json = json.dumps(results_list)

	return (headers, results_list, results_json)
