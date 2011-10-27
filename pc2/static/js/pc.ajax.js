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
    }
);