	
	//会员信息渲染
	function hyinfo(url,data){
		$.ajax({
			url: url,
			data: {"_username":data},
			type: "POST",
			dataType: 'json',
			success: function(data) {
				console.log(data);
				for(key in data){
					//a lert(data.data.id);
				}
			}
		});
	};