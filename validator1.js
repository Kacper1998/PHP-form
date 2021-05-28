function validate() {
      
   if( document.myForm.first_name.value == "" ) {
      alert( "Proszę wpisać imię!" );
      document.myForm.first_name.focus() ;
      return false;
   }
   if( document.myForm.last_name.value == "" ) {
       alert( "Proszę wpisać nazwisko!" );
       document.myForm.last_name.focus() ;
       return false;
    }
   if( document.myForm.email.value == "" ) {
       alert( "Proszę wpisać email!" );
       document.myForm.email.focus() ;
       return false;
    }
   if( document.myForm.phone.value == "" ) {
       alert( "Proszę wpisać numer telefonu!" );
       document.myForm.phone.focus() ;
       return false;
    }
   if( document.myForm.message.value == "" ) {
       alert( "Proszę wpisać wiadomość!" );
       document.myForm.message.focus() ;
       return false;
    }

}