<?php
	$cookies_accepted = (isset($_COOKIE['cookies_accepted']) && $_COOKIE['cookies_accepted'] == 1) ? true : false;
?>
<!DOCTYPE html>
<html>
<head>
<title>Task 1: Cookie Box</title>
<style type="text/css">
body {
	width:100%;
	height:100%;
	margin:0;
	font-family: Helvetica, sans-serif;
	background:#dbdee1;
}
#head {
	width:100%;
	height:100px;
	background:-webkit-linear-gradient(#7194e0 0%, #6983c3 100%);
}

#head h1#title {
	color:#fff;
	margin:0;
	padding:20px 5%;
	font-size:36px;
	font-weight:400;
}

#content {
	margin:auto;
	width:980px;
}

#content .item {
	margin-top:20px;
	background:#fefefe;
	border-radius:6px;
	padding:12px;
}

#content h2 {
	margin-top:0;
	color:#797f8a;
	font-weight:400;
	font-size:30px;
}

#content p {
	font-size:1.1em;
	color:#45474b;
}

#content .read-more {
	width:130px;
	height:34px;
	border:1px solid #4f525c;
	border-radius:17px;
	color:#4f525c;
	font-weight:100;
	font-size:1.2em;
	line-height:32px;
	text-align:center;
	cursor:pointer;
}

#content .read-more:hover {
	background:#f0f1f3;
}

/* cookie banner slide in */
@keyframes slide-in {
    0%   {bottom:-80px;}
    100% {bottom:0;}
}

/* cookie banner slide out */
@keyframes slide-out {
    0%   {bottom:0;}
    100% {bottom:-80px;}
}

#cookie-banner {
	width:100%;
	height:80px;
	position:fixed;
	bottom:-80px;
	left:0;
	background:#292c2d;
	color:#fff;
	animation-name: slide-in;
    animation-duration: 500ms;
    animation-delay: 1s;
    animation-fill-mode:forwards;
}

#cookie-banner.close {
	bottom:0;
	animation-name: slide-out;
}

#cookie-banner h3 {
	float:left;
	width:10%;
	min-width:120px;
	margin-top:12px;
	margin-left:2%;
	margin-right:5%;
	font-weight:200;
}

#cookie-banner .info {
	width:85%;
}

#cookie-banner .ok-button {
	float:right;
	width:80px;
	height:40px;
	border-radius:20px;
	background:#fcff35;
	text-align:center;
	line-height:38px;
	margin-top:16px;
	margin-right:2%;
	color:#444;
	font-size:1.2em;
	cursor:pointer;
}

#cookie-banner .ok-button:hover {
	background:#e5e830;
}

#cookie-banner a {
	color:#8bbfff;
}

</style>
<?php 
if(!$cookies_accepted) {
echo '<script type="text/javascript">
var clicksPerformed = 0;
var shouldStoreCookie = 0;

function clickPerformed() {
	clicksPerformed++;
	if(clicksPerformed > 2) {
		cookiesAccepted();
	}
}

function cookiesAccepted() {
	document.getElementById("cookie-banner").className = "close";
	shouldStoreCookie = 1;
}

window.onscroll = function(ev) {
    if((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
    	cookiesAccepted();
    }
};

// store cookie after 10 seconds if one of the three cases has appeared
setInterval(function(){
	if(shouldStoreCookie == 1) {
		document.cookie="cookies_accepted=1; expires=Thu, 18 Dec 2018 12:00:00 UTC; path=/";
	}
},10000);
</script>';
} ?>
</head>
<body<?php if(!$cookies_accepted) { echo ' onclick="clickPerformed()"'; } ?>>
<div id="head">
	<h1 id="title">Task 1: Cookie Box</h1>
</div>
<div id="content">
	<div class="item">
		<h2>This is a item title</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam elit mi, imperdiet in nunc in, euismod pellentesque ligula. Pellentesque maximus pulvinar justo, vel blandit est cursus ut. Morbi vitae lectus consequat, consectetur metus ut, tincidunt metus. Proin libero felis, mattis in accumsan eu, iaculis dapibus leo. Integer vitae rutrum felis, sed faucibus lorem. Integer ultricies nibh mauris, et cursus urna blandit in. Phasellus semper dictum congue. Vivamus aliquam aliquam rhoncus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque sollicitudin sem ut arcu interdum condimentum. Praesent varius, massa id posuere sagittis, lorem mauris vulputate est, eget aliquet enim lectus vel mi. Maecenas ullamcorper sapien ut auctor tempor.</p>
		<div class="read-more">Read more</div>
	</div>

	<div class="item">
		<h2>This is a second item title</h2>
		<p>Nam sollicitudin odio et odio porttitor pulvinar. Nam a viverra orci. Fusce vel gravida tellus. Nulla molestie, mauris eget commodo condimentum, dolor dui varius mauris, eu malesuada ex metus at quam. Nullam sagittis bibendum risus vel varius. Quisque in accumsan velit. Etiam consectetur sodales felis, sit amet cursus mi pharetra vel. Duis luctus felis vitae odio fermentum, quis imperdiet velit vulputate. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce diam ante, iaculis id diam eu, blandit ultrices enim. Proin sodales quam eu felis vestibulum molestie. Pellentesque dignissim lacus nibh, a aliquam tortor posuere ut.</p>
		<div class="read-more">Read more</div>
	</div>
	<div class="item">
		<h2>This is a third item title</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam elit mi, imperdiet in nunc in, euismod pellentesque ligula. Pellentesque maximus pulvinar justo, vel blandit est cursus ut. Morbi vitae lectus consequat, consectetur metus ut, tincidunt metus. Proin libero felis, mattis in accumsan eu, iaculis dapibus leo. Integer vitae rutrum felis, sed faucibus lorem. Integer ultricies nibh mauris, et cursus urna blandit in. Phasellus semper dictum congue. Vivamus aliquam aliquam rhoncus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque sollicitudin sem ut arcu interdum condimentum. Praesent varius, massa id posuere sagittis, lorem mauris vulputate est, eget aliquet enim lectus vel mi. Maecenas ullamcorper sapien ut auctor tempor.</p>
		<div class="read-more">Read more</div>
	</div>

	<div class="item">
		<h2>This is a fourth item title</h2>
		<p>Nam sollicitudin odio et odio porttitor pulvinar. Nam a viverra orci. Fusce vel gravida tellus. Nulla molestie, mauris eget commodo condimentum, dolor dui varius mauris, eu malesuada ex metus at quam. Nullam sagittis bibendum risus vel varius. Quisque in accumsan velit. Etiam consectetur sodales felis, sit amet cursus mi pharetra vel. Duis luctus felis vitae odio fermentum, quis imperdiet velit vulputate. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce diam ante, iaculis id diam eu, blandit ultrices enim. Proin sodales quam eu felis vestibulum molestie. Pellentesque dignissim lacus nibh, a aliquam tortor posuere ut.</p>
		<div class="read-more">Read more</div>
	</div>

	<div class="item">
		<h2>This is a fifth title</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam elit mi, imperdiet in nunc in, euismod pellentesque ligula. Pellentesque maximus pulvinar justo, vel blandit est cursus ut. Morbi vitae lectus consequat, consectetur metus ut, tincidunt metus. Proin libero felis, mattis in accumsan eu, iaculis dapibus leo. Integer vitae rutrum felis, sed faucibus lorem. Integer ultricies nibh mauris, et cursus urna blandit in. Phasellus semper dictum congue. Vivamus aliquam aliquam rhoncus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque sollicitudin sem ut arcu interdum condimentum. Praesent varius, massa id posuere sagittis, lorem mauris vulputate est, eget aliquet enim lectus vel mi. Maecenas ullamcorper sapien ut auctor tempor.</p>
		<div class="read-more">Read more</div>
	</div>

	<div class="item">
		<h2>This is a sixth item title</h2>
		<p>Nam sollicitudin odio et odio porttitor pulvinar. Nam a viverra orci. Fusce vel gravida tellus. Nulla molestie, mauris eget commodo condimentum, dolor dui varius mauris, eu malesuada ex metus at quam. Nullam sagittis bibendum risus vel varius. Quisque in accumsan velit. Etiam consectetur sodales felis, sit amet cursus mi pharetra vel. Duis luctus felis vitae odio fermentum, quis imperdiet velit vulputate. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce diam ante, iaculis id diam eu, blandit ultrices enim. Proin sodales quam eu felis vestibulum molestie. Pellentesque dignissim lacus nibh, a aliquam tortor posuere ut.</p>
		<div class="read-more">Read more</div>
	</div>

	<br><br>
</div>

<?php 
if(!$cookies_accepted) {
echo '<div id="cookie-banner">
	<h3>Our websites cookie policy</h3>
	<div class="ok-button" onclick="cookiesAccepted()">OK</div>
	<p class="info">This website uses cookies to ensure you get the best experience on our website.<br>By using our website you accept cookies unless manually turning it off in your browser.</p>
</div>';
}
?>

</body>
</html>