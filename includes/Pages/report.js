$(document).ready(function(){

 


    $('#SelctLevel').on('change', function() {

      if ( this.value == 'January')
      {

        $("#January").show();
        $("#February").hide();
        $("#March").hide();
        $("#April").hide();
        $("#May").hide();
        $("#June").hide();
        $("#July").hide();
        $("#August").hide();
        $("#September").hide();
        $("#October").hide();
        $("#November").hide();
        $("#December").hide();


      }
      else if(this.value=='February')
      {

 

        $("#February").show();
        $("#January").hide();
        $("#March").hide();
        $("#April").hide();
        $("#May").hide();
        $("#June").hide();
        $("#July").hide();
        $("#August").hide();
        $("#September").hide();
        $("#October").hide();
        $("#November").hide();
        $("#December").hide();

 


      }
       else if(this.value=='March')
      {
        $("#March").show();
        $("#February").hide();
        $("#January").hide();
        $("#April").hide();
        $("#May").hide();
        $("#June").hide();
        $("#July").hide();
        $("#August").hide();
        $("#September").hide();
        $("#October").hide();
        $("#November").hide();
        $("#December").hide();

 


      } 
      else if(this.value=='April')
      {
        $("#April").show();
        $("#February").hide();
        $("#March").hide();
        $("#January").hide();
        $("#May").hide();
        $("#June").hide();
        $("#July").hide();
        $("#August").hide();
        $("#September").hide();
        $("#October").hide();
        $("#November").hide();
        $("#December").hide();

 

      }
      else if(this.value=='May')
      {
        $("#May").show();
        $("#February").hide();
        $("#March").hide();
        $("#April").hide();
        $("#January").hide();
        $("#June").hide();
        $("#July").hide();
        $("#August").hide();
        $("#September").hide();
        $("#October").hide();
        $("#November").hide();
        $("#December").hide();
      } 
      else if(this.value=='June')
      {
        $("#June").show();
        $("#February").hide();
        $("#March").hide();
        $("#April").hide();
        $("#May").hide();
        $("#January").hide();
        $("#July").hide();
        $("#August").hide();
        $("#September").hide();
        $("#October").hide();
        $("#November").hide();
        $("#December").hide();
      }
      else if(this.value=='July')
      {
        $("#July").show();
        $("#February").hide();
        $("#March").hide();
        $("#April").hide();
        $("#May").hide();
        $("#June").hide();
        $("#January").hide();
        $("#August").hide();
        $("#September").hide();
        $("#October").hide();
        $("#November").hide();
        $("#December").hide();
      }
      else if(this.value=='August')
      {
        $("#August").show();
        $("#February").hide();
        $("#March").hide();
        $("#April").hide();
        $("#May").hide();
        $("#June").hide();
        $("#July").hide();
        $("#January").hide();
        $("#September").hide();
        $("#October").hide();
        $("#November").hide();
        $("#December").hide();
      }
      else if(this.value=='September')
      {
        $("#September").show();
        $("#February").hide();
        $("#March").hide();
        $("#April").hide();
        $("#May").hide();
        $("#June").hide();
        $("#July").hide();
        $("#August").hide();
        $("#January").hide();
        $("#October").hide();
        $("#November").hide();
        $("#December").hide();
      }

 

      else if(this.value=='October')
      {

        $("#October").show();
        $("#February").hide();
        $("#March").hide();
        $("#April").hide();
        $("#May").hide();
        $("#June").hide();
        $("#July").hide();
        $("#August").hide();
        $("#September").hide();
        $("#January").hide();
        $("#November").hide();
        $("#December").hide();

      }

      else if(this.value=='November')
      {

        $("#November").show();
        $("#February").hide();
        $("#March").hide();
        $("#April").hide();
        $("#May").hide();
        $("#June").hide();
        $("#July").hide();
        $("#August").hide();
        $("#September").hide();
        $("#January").hide();
        $("#January").hide();
        $("#December").hide();

      }

    else if(this.value=='December')
      {

        $("#December").show();
        $("#February").hide();
        $("#March").hide();
        $("#April").hide();
        $("#May").hide();
        $("#June").hide();
        $("#July").hide();
        $("#August").hide();
        $("#September").hide();
        $("#January").hide();
        $("#November").hide();
        $("#January").hide();

      }
    else if(this.value=='all')
      {

        $("#December").show();
        $("#February").show();
        $("#March").show();
        $("#April").show();
        $("#May").show();
        $("#June").show();
        $("#July").show();
        $("#August").show();
        $("#September").show();
        $("#January").show();
        $("#November").show();
        $("#January").show();
      }

    });
});