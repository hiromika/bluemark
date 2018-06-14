<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Cooperative System</title>

  <style>
        @import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
        @import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

body {
    background-image: url("<?php echo theme_path(); ?>/img/background.jpg");
    color: #fff;
    font-family: Arial;
    font-size: 12px;
    margin: 0;
    padding: 0;
    background-size: cover;
}

.body {
    background-size: cover;
    bottom: -40px;
    height: auto;
    left: -20px;
    opacity: 0.7;
    position: absolute;
    right: -40px;
    top: -20px;
    width: auto;
    z-index: 0;
}

.grad{
	position: absolute;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: auto;
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */
	z-index: 1;
	opacity: 0.7;
}

.header{
    left: calc(58% - 240px);
    position: absolute;
    top: calc(65% + 10px);
    z-index: 2;
}

.header div{
	float: left;
	color: #333;
	font-family: 'Exo', sans-serif;
	font-size: 30px;
	font-weight: 200;
}

.header div span{
	color: #fff !important;
}

.frm-login {
    margin-left: 545px;
    margin-top: 460px;
}

.login {
    position: relative;
    height: 150px;
    padding: 10px;
    top: calc(50% - 40px);
    width: 350px;
    z-index: 2;
    margin-top:400px;
    display:inline;
    padding: 77px 10px 20px;


}

.login input[type=text]{
    background: none repeat scroll 0 0 #f8f8f8;
    border: 1px solid rgba(255, 255, 255, 0.6);
    border-radius: 2px;
    color: #333;
    font-family: "Exo",sans-serif;
    font-size: 16px;
    font-weight: 400;
    height: 30px;
    padding: 4px;
    width: 250px;
}

.login input[type=password]{
    background: none repeat scroll 0 0 #f8f8f8;
    border: 1px solid rgba(255, 255, 255, 0.6);
    border-radius: 2px;
    color: #333;
    font-family: "Exo",sans-serif;
    font-size: 16px;
    font-weight: 400;
    height: 30px;
    padding: 4px;
    width: 250px;
    margin-top: 4px;
    opacity: 1;
}

.login input[type=submit]{
	width: 160px;
	height: 40px;
	background: #0092DC;
	border: 1px solid #fff;
	cursor: pointer;
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: bold;
	padding: 6px;
	margin-top: 10px;
    opacity: 1;
}

.login input[type=submit]:hover{
	background: #ce3970;
}

.login input[type=button]:active{
	opacity: 0.6;
}

.login input[type=text]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=password]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=button]:focus{
	outline: none;
}

::-webkit-input-placeholder{
   color: rgba(255,255,255,0.6);
}

::-moz-input-placeholder{
   color: rgba(255,255,255,0.6);
}
</style>

    <script src="<?php echo theme_path(); ?>/js/prefixfree.min.js"></script>

</head>

<body>
    <div class="header"><div><span>Cooperative System</span></div></div>
    <div style="border:1px solid #e3e3e3; left:545px;z-index:1;opacity: .3;background: #000;border-radius: 5px;height: 100px;position: absolute;top: 433px;width: 705px;"></div>
    <br>
    <?php echo form_open('login',array('class' => 'frm-login')); ?>

        <div class="login">
            <input type="text" placeholder="username" name="username" id="username">
            <input type="password" placeholder="password" name="password" id="password">
            <input type="submit" value="Login" id="login">
        </div>

    </form>

    <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>
    <script>
    $("#login").click(function() {
        var username = $("#username").val();
        var password = $("#password").val();
        var token = $('input[name=insya_allah]').val();
        $.ajax({
            type: "POST",
            url: "login",
            data: "username=" + username + "&password=" + password + "&insya_allah=" + token,
            success: function(resp) {
                var obj = jQuery.parseJSON( resp );
                if(obj.success === true){
                    window.location = "";
                } else {
                    alert(obj.msg);
                }
            },
            beforeSend: function()
            {
                
            }
        });
        return false;
    });
    </script>
</body>

</html>