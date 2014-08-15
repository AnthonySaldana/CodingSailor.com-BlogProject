function hidethese()
{
	/*document.getElementById("emaillabel").style.display="none";
	document.getElementById("emailsec").style.display="none";
	document.getElementById('signupbutton').style.display="none";
	document.getElementById('registerbutton').style.display="inline"; */
	document.getElementById('login').style.display="none";
	document.getElementById('loadbutton').style.display="block";

}
function register()
{
	document.getElementById('registerbutton').style.display="none";
	document.getElementById('signinbutton').style.display="none";
	document.getElementById("emaillabel").style.display="inline";
	document.getElementById('emailsec').style.display="inline";
	document.getElementById('signupbutton').style.display="inline";
	
}

function loadform()
{
	document.getElementById('login').style.display="block";
	document.getElementById("emaillabel").style.display="none";
	document.getElementById("emailsec").style.display="none";
	document.getElementById('signupbutton').style.display="none";
	document.getElementById('registerbutton').style.display="inline";
	document.getElementById('loadbutton').style.display="none";
	document.getElementById('signinbutton').style.display="inline";
}
