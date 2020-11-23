var connector;
function Connector() {
    this.ajax = function(obj,callback){
		$.ajax({
			type: obj.type,
			url: obj.url,
			data: obj.data,
			cache: false,
			timeout: 120000,
			success: function (result,textStatus, xhr) {
					callback(result);
			},
			error:function (xhr, ajaxOptions, thrownError){
    			if(xhr.status==404) {
        			callback(xhr.status);
    			}
    			if(xhr.status==422){
    				callback(xhr.responseJSON);
    			}
			}
		});
    };
    this.ajaxFormData = function(obj,callback){
		$.ajax({
			type: obj.type,
			url: obj.url,
			data: obj.data,
			datatype:obj.datatype,
			cache: false,
			headers:obj.headers,
			timeout: 120000,
			contentType: false,
            processData: false,
			success: function (result,textStatus, xhr) {
					callback(result);
			},
			error:function (xhr, ajaxOptions, thrownError){
    			if(xhr.status==404) {
        			callback(xhr.status);
    			}
    			if(xhr.status==422){
    				callback(xhr.responseJSON);
    			}
			}
		});
    };

}
$(function () {
    connector = new Connector();
});
