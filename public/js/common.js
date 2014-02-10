/**
 * 通用js功能
 */
$(document).ready(function(){
	//反馈信息闪烁
	for(i=0;i<3;i++){
		$("#fbmsg").fadeTo('slow', 0.1).fadeTo('slow', 1.0);
	}
	
	$("#fbmsg").on('click','#fbclose',function(){
		$("#fbmsg").remove();
	});
});