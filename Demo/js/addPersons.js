$(document).ready(function(){

	$('#submit').click(function(){

		//判断输入框是否为空
		if($('#name').val()==''){
			alert('请填入姓名！');
			return false;
		}else if($('#class').val()==''){
			alert('请填入班级！');
			return false;
		}else if($('#phone').val()==''){
			alert('请填入手机号码！');
			return false;
		}else if($('#email').val()==''){
			alert('请填入qq邮箱！');
			return false;
		}else if($('#word').val()==''){
			alert('请填入人生格言！');
			return false;
		}else if($('#lover').val()==''){
			alert('请填入你的偶像！');
			return false;
		}else if($('#sex').val()==''){
			alert('请填入性别！');
			return false;
		}

		//判断输入是否合法
		if($('#phone').val().length!=11){
			alert('手机号码格式错误');
			$('#phone').focus();
			return false;
		}else{
			var email=$("#email").val();
			if(!email.match(/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/)){
			   alert("格式不正确！请重新输入");
			   $("#email").focus();
			   return false;
			}
		}

	});



});
