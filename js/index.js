$.ajax({
	url:'v1/geo/',
	type:'GET',
	async: false,
	// data: {id: "16"},
	dataType:'JSON',
	beforeSend: function(request){
		request.setRequestHeader("Cositec", "C0s1T3c!2ol7$");
	},
	error: function(error){
		console.log(error);
	},
	success: function(data){
		console.log(data.datos)
		
		if (data.estado == "1") {
			var headers = [
				"ID", "ID DISPOSITIVO", "ID SERVICIO", "LATITUD", "LONGITUD", "FECHA HORA" 
			];
			jQueryTable("tableContainer", headers, data.datos, 10, "505px");
		}
		else
			alert("error");
	}
});

// var info = '{"username": "thekamitorres@gmail.com", "password": "TOLA930516HCMRPN00"}';
// $.ajax({
// 	url:'v1/user/login',
// 	type:'POST',
// 	async: false,
// 	// data: info,
// 	data: {info:info},
// 	dataType:'JSON',
// 	beforeSend: function(request){
// 		request.setRequestHeader("authorization", "C0s1T3c!2ol7$");
// 	},
// 	error: function(error){
// 		console.log(error);
// 	},
// 	success: function(data){
// 		console.log(data)
		
// 	}
// });