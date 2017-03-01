'use strict';

var gForm = function(){


    this._formFields = [];
    this._formLabels = [];
    this._error = "";
 
}

gForm.prototype = {

    getFormFields:function(){

        if(!this.checkGform()){
       
            this._formFields = g_form.getEditableFields();

        }else{            
            this.error = "You can't perform this action.. g_form object is not available.. ";
        }

    },

    getFormLabels:function(){

        this.getFormFields();

        for(var i =0 ; i < this._formFields.length; i++){

            this._formLabels.push(g_form.getLabel(this._formFields[i]).innerText);
        }

        console.log(this._formFields);
        console.debug(this._formLabels);

    },

    checkGform:function(){

        if(g_form == undefined){
            return true;
        }

    }



}

var gform = new gForm();
gform.getFormLabels();
