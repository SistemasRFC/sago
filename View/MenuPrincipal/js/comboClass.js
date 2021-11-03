class combo{
	constructor(){
		this._nmeCombo;
		this._disabled= false;
		this._altura = '150px';
		this._largura = '150px';
		this._valorDefault;
		this._listaOptions;
	}
  
	get nome(){
		return this._nome;
	}

	set nome(n){
		this._nome = n;
	}

	get disabled(){
		return this._disabled;
	}

	set disabled(value){
		this._disabled = value;
	}

	get altura(){
		return this._altura;
	}

	set altura(value){
		this._altura = value;
	}

	get largura(){
		return this._largura;
	}

	set largura(value){
		this._largura= value;
	}

	get valorDefault(){
		return this._valorDefault;
	}

	set valorDefault(value){
		this._valorDefault= value;
	}

	get listaOptions(){
		return this._listaOptions;
	}

	set listaOptions(value){
		this._listaOptions= value;
	}
  
	CriarComboDispatch(){ 
		$("#td"+this._nmeCombo).html('');
		var select = '<select id="'+this._nmeCombo+'" class="persist input" style="background-color: white;">';
		for (i=0;i<this._listaOptions[1].length;i++){
			if (this._listaOptions[1][i]['ID']==this._valorDefault){
				select += '<option value="'+this._listaOptions[1][i]['ID']+'" selected>'+this._listaOptions[1][i]['DSC']+'</option>';
			}else{
				select += '<option value="'+this._listaOptions[1][i]['ID']+'">'+this._listaOptions[1][i]['DSC']+'</option>';
			}
		}
		select += '</select>';
		$("#td"+this._nmeCombo).html(select);
		$("#"+this._nmeCombo).jqxDropDownList({dropDownHeight: this._altura+'px', width: this_largura+'px', disabled: this._disabled});
	}
}