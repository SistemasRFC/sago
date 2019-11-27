class dispatch{
	constructor(){
		this._controller;
		this._method;
		this._parametros = undefined;
		this._callback = undefined;
		this._mensagemAguarde = undefined;
		this._mensagemRetorno = undefined;
		this._objetoParametro = new Object();
		this._valorDefault;
		this._disabled;
	}
	
	ExecutaDispatch(){
		if (this._mensagemAguarde!=undefined){
			swal({
				title: this._mensagemAguarde,
				imageUrl: PATH_RAIZ+"Resources/images/preload.gif",
				showConfirmButton: false
			});
		}
		this.RetornaObj();
		$.post(PATH_RAIZ+"Dispatch.php",
			obj,
			function(retorno){
				retorno = eval ('('+retorno+')');
				if (retorno[0]==true){
					if (this._mensagemRetorno!=undefined){
						$(".jquery-waiting-base-container").fadeOut({modo:"fast"});
						swal({
							title: "Sucesso!",
							text: this._mensagemRetorno,
							showConfirmButton: false,
							type: "success"
						});
						setTimeout(function(){
							swal.close();
						}, 2000);
					}
					if (this._callback!=undefined){
						this._callback(retorno);
					}
				}else{
					$(".jquery-waiting-base-container").fadeOut({modo:"fast"});
					swal({
						title: "Erro ao executar!",
						text: "Erro: "+retorno[1],
						type: "error",
						confirmButtonText: "Fechar"
					});
				 }
			}
		);     
	}

	ExecutaDispatchUpload(){
		if (this._mensagemAguarde!=undefined){
			swal({
				title: this._mensagemAguarde,
				imageUrl: PATH_RAIZ+"Resources/images/preload.gif",
				showConfirmButton: false
			});
		}
		$.ajax({
			url: PATH_RAIZ+'Dispatch.php?controller='+this._controller+'&method='+this._method,
			type: 'POST',
			// Form data
			data: this._parametros,
			//Options to tell JQuery not to process data or worry about content-type
			cache: false,
			contentType: false,
			processData: false,
			success: function(data){
				data = eval('('+data+')');
				if(data[0] == true){
					if (this._mensagemRetorno!=undefined){
						$(".jquery-waiting-base-container").fadeOut({modo:"fast"});
						swal({
							title: "Sucesso!",
							text: this._mensagemRetorno,
							showConfirmButton: false,
							type: "success"
						});
						setTimeout(function(){
							swal.close();
						}, 2000);
					}                
					if (this._callback!=undefined){
						this._callback(data);
					}
				} else {
					$(".jquery-waiting-base-container").fadeOut({modo:"fast"});
					swal({
						title: "Erro!",
						text: "Erro ao fazer upload do arquivo!",
						type: "error",
						confirmButtonText: "Fechar"
					});
				}
			}
		});     
	}

	ExecutaDispatchValor(){
		if (this._mensagemAguarde!=undefined){
			swal({
				title: this._mensagemAguarde,
				imageUrl: PATH_RAIZ+"Resources/images/preload.gif",
				showConfirmButton: false
			});
		}
		this.RetornaObj();
		$.post(PATH_RAIZ+'Dispatch.php',
			this._objetoParametro,
			function(retorno){
				retorno = eval ('('+retorno+')');
				if (retorno[0]==true){
					if (MensagemRetorno!=undefined){
						$(".jquery-waiting-base-container").fadeOut({modo:"fast"});
						swal({
							title: "Sucesso!",
							text: MensagemRetorno,
							showConfirmButton: false,
							type: "success"
						});
						setTimeout(function(){
							swal.close();
						}, 2000);
					}
					if (this._callback!=undefined){
						this._callback(retorno, this._valorDefault, this._disabled;);
					}
				}else{
					$(".jquery-waiting-base-container").fadeOut({modo:"fast"});
					swal({
						title: "Erro ao executar!",
						text: "Erro: "+retorno[1],
						type: "error",
						confirmButtonText: "Fechar"
					});
				 }
			}
		);     
	}

	RetornaObj(){
		Object.defineProperty(this._objetoParametro, 'method', {
			__proto__: null,
			enumerable : true,
			configurable : true,
			value: this._method
		});    
		Object.defineProperty(this._objetoParametro, 'controller', {
			__proto__: null,
			enumerable : true,
			configurable : true,
			value: this._controller
		});
		if (Parametros != undefined){
			var dados = Parametros.split('|'); 
			for (i=0;i<dados.length;i++){
				var campos = dados[i].split(';');
				Object.defineProperty(this._objetoParametro, campos[0], {
									__proto__: null,
									enumerable : true,
									configurable : true,
									value: campos[1] });
			}    
		}		
	}
}