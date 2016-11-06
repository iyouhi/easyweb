$(document).ready(function(){
  $("#countBtn").click(function(){
	  str = $("#fcount").text();
	  $("#fcount").html("<input name='fcount' value='" + str + "'/>");
	  $("#countBtn").css('display',"none");
	  $("#countBtnSubmit").css('display',"block");
  });
});

function delConfirm(){
	return confirm("确定要执行删除操作吗？");
}

function replyMessage(id){
	reply_obj = $("#reply_" + id);
	reply_btn_obj = $("#reply_btn_" + id);
	str = reply_obj.text().trim();
	str1 = reply_btn_obj.text().trim();
	if(str1 == "提交"){
		value = $("#reply_input_"+id).attr("value").trim();
		$.post("http://l.njc.com/admin/message/aj_reply.php", {id: id, reply: value },
				  function(data){
						reply_obj.html(value);
						if(value){
							reply_btn_obj.html("更改回复");
						}else{
							reply_btn_obj.html("回复");
						}
						if(data == 'M0001'){							
							alert("修改成功");
						}else{
							alert("修改失败");
						}
				  });
	}else{
		reply_obj.html("<input id='reply_input_"+id+"' type='text' value='" + str + "'/>");
		reply_btn_obj.html("提交");
	}
}

function deleteMessage(id){
	re = delConfirm();
	if(!re)return;
	$.post("http://l.njc.com/admin/message/aj_delete.php", {id:id},
			  function(data){
					if(data == 'M0001'){							
						$("#message_"+id).fadeOut("slow");
					}else{
						alert("修改失败");
					}
			  });
}

function deleteDownload(id){
	re = delConfirm();
	if(!re)return;
	$.post("http://l.njc.com/admin/download/aj_delete.php", {id:id},
			  function(data){
					if(data == 'M0001'){							
						$("#download_"+id).fadeOut("slow");
					}else{
						alert("修改失败");
					}
			  });
}

