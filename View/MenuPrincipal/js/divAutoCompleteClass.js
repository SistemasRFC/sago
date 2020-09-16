class divAutoCompleteClass{

	constructor{
		this._nmeDiv;
		this._nmeInput;
		this._url;
		this._method;
		this._dataFields;
		this._displayMember;
		this._valueMember;
		this._callback = undefined;
		this._width=0;
		this._maxwidth = 1200;
		this._height = 250;
		this._isModal = false;
		this._autoOpen = false;
		this._showCloseButton = false;
		this._animationType = 'fade';
		this._theme = 'darkcyan';
	}

	CriarDivAutoComplete(){ 
		if ( $("#divAutoComplete").length ){
			$("#divAutoComplete").jqxWindow("destroy");
		}
		$("#"+this._nmeDiv).html("");
		$("#"+this._nmeDiv).html('<div id="divAutoComplete"><div id="windowHeader" style="display: none;"></div><div style="overflow: hidden;" id="windowContent"><div id="listaPesquisa"></div></div> ');
		var largura = $("#"+this._nmeInput).width();
		if (this._width!=0){
			largura = this._width;
		}
		$("#divAutoComplete").jqxWindow({ 
			height: this._height,
			width: largura,
			showCloseButton: this._showCloseButton,
			maxwidth: this._maxwidth,
			position: { x: $("#"+this._nmeInput).offset().left, y: $("#"+this._nmeInput).offset().top+25 },
			animationType: this._animationType,
			showAnimationDuration: 500,
			closeAnimationDuration: 500,
			theme: this._theme,
			isModal: this._isModal,
			autoOpen: this._autoOpen
		});           
		$("#divAutoComplete").jqxWindow("open");
		var dados = this._dataFields.split('|');
		var lista = new Array();
		for (i=0;i<dados.length;i++){
			var data = new Object();
			var campos = dados[i].split(';');
			data.name = campos[1];
			lista.push(data);
		}

		var source =
		{
			datatype: "json",
			dataFields: lista,
			type: "POST",
			id: this._valueMember,
			url: this._url,
			data: {
				method: this._method,
				term: $("#"+this._nmeInput).val()
			}
			
		};
		var dataAdapter = new $.jqx.dataAdapter(source);
		// Create a jqxListBox
		$("#listaPesquisa").jqxListBox({ 
			source: dataAdapter, 
			displayMember: this._displayMember, 
			valueMember: this._valueMember, 
			width: largura-5, 
			height: this._height-10
		});
		$("#listaPesquisa").on('keyup', function(event){       
		   if (event.keyCode==13){
			   this.SelecionaItem($("#listaPesquisa").jqxListBox('getSelectedItem'), dataAdapter);
		   }
		});
		$("#listaPesquisa").on('select', function (event) {
			if (event.args.type=='mouse'){ 
				this.SelecionaItem(event.args.item, dataAdapter);
			}
		});
	}

	SelecionaItem(item, dataAdapter){    
		if (item) {
			var x=[]       
			$.each(dataAdapter.records, function(i,n) {
				x.push(n);
			});        
			for (j=0;j<x.length;j++){
				var dados = this._dataFields.split('|');
				for (i=0;i<dados.length;i++){ 
					if (item.originalItem.id==x[j]['id']){
						
						var campos = dados[i].split(';');
						if (campos[0]!=''){
							$("#"+campos[0]).val(x[j][campos[1]]);
							if ( $("#divAutoComplete").length ){
								$("#divAutoComplete").jqxWindow("destroy");
							}
						}
					}
				}              
			}
			if (this._callback!=undefined){
				eval(this._callback);
			}                
		}
	}
}