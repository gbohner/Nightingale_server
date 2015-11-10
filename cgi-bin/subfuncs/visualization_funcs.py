#!/usr/bin/python

import numpy as np
from collections import OrderedDict
import simplejson as json

def plot_disease_types(headers, results_list):
	field_headers = [headers[i] for i in (1,4)]
	data_set = []
	for field in field_headers:
	    data_set.append([results_list[i][field] for i in range(len(results_list))])

	#sorted bar chart by disease type
	inds = np.argsort(data_set[1])[::-1][:len(data_set[1])]
	if len(inds)<=5:
	    y_pos = range(len(data_set[1]))
	else:
	    y_pos = range(5)

	out_json =OrderedDict();
	out_json['y_pos'] = y_pos
	out_json['values'] = [data_set[1][inds[i]]/1000 for i in y_pos]
	out_json['yticks'] = [data_set[0][inds[i]] for i in y_pos]
	out_json['xlabel'] = 'Diagnoses (1000 people)'
	out_json = json.dumps(out_json)

	return out_json
	#imgdata = StringIO.StringIO()
	#fig.savefig(imgdata, format='png')
	#imgdata.seek(0)  # rewind the data

	#print "Content-type: image/png\n"
	#uri = 'data:image/png;base64,' + urllib.quote(base64.b64encode(imgdata.buf))
	#print '<img src = "%s"/>' % uri
