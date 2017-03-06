<html>
<head>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
</head>
<body>
	<h1> Register Publisher </h1>
	<table>
		<tr>
			<td>Enter Name : </td>
			<td><input type="text" id="regPubName"/></td>
		</tr>
	</table>
	<input type="button" id="regPublisher" value="Register" />
	<hr>
	<h1> Publish a Movie </h1>
	<table>
		<tr>
		 	<td>Publisher Name : </td>
		 	<td><input type="text" id="pubPubName" /></td>
		</tr>
		<tr>
		 	<td>Movie Name : </td>
		 	<td><input type="text" id="pubMovieName" /></td>
		</tr>
		<tr>
		 	<td>Release Date : </td>
		 	<td><input type="text" id="pubReleaseDate" /></td>
		</tr>
	</table>
	<input type="button" id="pubMovie" value="Publish" />
	<hr>
	<h1> Register User </h1>
	<table>
		<tr>
			<td> Enter Name : </td>
			<td> <input type="text" id="userName" /></td>
		</tr>
	</table>
	<input type="button" id="userRegister" value="Register" />
	<hr>
	<h1> Subscribe to movie </h1>
	<table>
		<tr>
		 	<td>User Name : </td>
		 	<td><input type="text" id="subUserName" /></td>
		</tr>
		<tr>
		 	<td>Movie Name : </td>
		 	<td><input type="text" id="subMovieName" /></td>
		</tr>
	</table>
	<input type="button" id="subMovie" value="Subscribe" />
</body>
</html>


<script>
	$("#userRegister").on('click',function(){
		$.ajax({
			url : '/registerUser.php',
			method : 'POST',
			data : {'name':$("#userName").val()},
			success : function(response){
				response = JSON.parse(response);
				if(response.status == 'fail'){
					alert("Error : "+response.errorMessage);
				}else if(response.status == 'success'){
					alert("User Successfully Registered");
				}
			}
		});
	});
	$("#regPublisher").on('click',function(){
		$.ajax({
			url : '/registerPublisher.php',
			method : 'POST',
			data : {'name':$("#regPubName").val()},
			success : function(response){
				response = JSON.parse(response);
				if(response.status == 'fail'){
					alert("Error : "+response.errorMessage);
				}else if(response.status == 'success'){
					alert("Publisher Successfully Registered");
				}
			}
		});
	});

	$("#pubMovie").on('click',function(){
		$.ajax({
			url: '/publishMovie.php',
			method : 'POST',
			data : {
				'publisherName':$("#pubPubName").val(),
				'movieName':$("#pubMovieName").val(),
				'releaseDate':$("#pubReleaseDate").val()
			},
			success : function(response){
				response = JSON.parse(response);
				if(response.status == 'fail'){
					alert("Error : "+response.errorMessage);
				}else if(response.status == 'success'){
					alert("Movie Successfully Published");
				}
			}
		});
	});

	$("#subMovie").on('click',function(){
		$.ajax({
			url : '/userSubscribeMovie.php',
			method : 'POST',
			data : {'userName':$("#subUserName").val(),'movieName':$("#subMovieName").val()},
			success : function(response){
				response = JSON.parse(response);
				if(response.status == 'fail'){
					alert("Error : "+response.errorMessage);
				}else if(response.status == 'success'){
					alert("User has subscribed to movie!");
				}
			}
		})
	});
</script>