$(document).ready(function(){

	$("#login").click(function(){
		if($("#username").val()==''){
			alert("用户名不能为为空！");
			return false;
		}else if($("#password").val()==''){
			alert("密码不能为空！");
			return false;
		}
	});

	$("#register").click(function(){
		if($("#username").val()==''){
			alert("用户名不能为为空！");
			return false;
		}else if($("#password").val()==''){
			alert("密码不能为空！");
			return false;
		}
	});

});
