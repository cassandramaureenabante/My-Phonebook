function  signup(){
	
	var name 					= document.getElementById('name');
	var exampleInputEmail1 		= document.getElementById('exampleInputEmail1');
	var exampleInputPassword1	= document.getElementById('exampleInputPassword1');
	
	
	localStorage.setItem('Name',name.value);
	localStorage.setItem('Address',address.value);
	localStorage.setItem('Email',exampleInputEmail1.value);
	localStorage.setItem('Password',exampleInputPassword1.value);
	alert('Record Saved');
	name.value = address.value = exampleInputEmail1.value = exampleInputPassword1.value  = '';
	
	
	
	
}

function login(){
	var exampleInputEmail1 		= document.getElementById('exampleInputEmail1');
	var exampleInputPassword1	= document.getElementById('exampleInputPassword1');
	if(document.getElementById('exampleInputEmail1').value == localStorage.Email && exampleInputPassword1.value == localStorage.Password){
		location.href='phonebook.html';
	}else{
		alert('Invalid Username/Password');