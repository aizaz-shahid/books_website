<!doctype html>
<html>
<body>
	<h1>Welcome to obooko.com</h1>
	<p>Hi {{$name}},<br>
	@if($name!="Admin")
	 Thank you for registering at obooko.<br><br>
	 You may now download e-books free of charge. And we mean FREE: you will never be asked for money to download free e-books from our website.<br><br>
	 Important: all e-books are officially authorized for free distribution via the obooko website and are fully protected by international Copyright law. You are licensed to use them strictly for your personal use only. It is illegal to sell these books. It is also an offence to host and distribute them on any other website without written permission from the author.<br><br>
	 For your peace of mind, all books are checked for viruses and malware before being made available for download.
	 <br><p>
Don’t forget to share a link to <a href="http://www.obooko.com/ebooks-books">obooko.com</a> with your friends.
<br><br>
Enjoy reading!
<br><br>
Sarah Bainbridge<br>
Membership Administration</p>
	@else
	This is to inform you that a member named {{$Name}} has been registered on the site.
	@endif
	</p><br>
	
</body>
</html>