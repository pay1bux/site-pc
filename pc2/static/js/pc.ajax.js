var baseUrl = 'index.php/'; // De scos cand punem pe live
$(document).ready(

    function () {
        /* handles resources flagging actions */
        $('#buton_sub_buletin').click(function() {
            var email =$('#subscribe').val();
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/

            if(!emailReg.test(email)) {
                alert("Adresa de email nu este valida!");
                return false;
            }

            $.ajax({
                type: "POST",
                url: baseUrl + "ajax/abonare-buletin",
                data: {
                    email: email
                },
                success: function(data){
                    if (data == '')
                        alert("Ati fost abonat si veti primi buletinul duminical in fiecare saptamana.");
                    else
                        alert(data);
                }
            });
            return false;
        });
		//pentru hide la gaseste-ti locul
		    $('.arataMaiMult').click(function(e) {
          //      console.log(e);
       var $object = $(this).prev().prev();
              //  $object.removeClass('ascuns').addClass("neascuns");

                if($object.hasClass('ascuns'))
                {
                   $object.switchClass('ascuns','neascuns',0,'easeOutBounce');

                   // $object.removeClass("ascuns", 500);

                }
                else
                {
                    $object.switchClass('neascuns','ascuns',1000,'easeOutBounce');
                   // $object.removeClass("neascuns", 500);
                   // $object.addClass("ascuns", 1000);
                }
                e.preventDefault(); //scoate actiunea lui a (ex: hreful)

                //return false();
                e.stopPropagation();// opreste propagarea eventului  bubbling - div din interiorul unui div
});






    }
);