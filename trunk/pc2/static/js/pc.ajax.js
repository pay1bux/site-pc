//var baseUrl = 'index.php/'; // De scos cand punem pe live
//var baseUrl = 'index.php/'; // De scos cand punem pe live
var baseUrl = ''; // De scos cand punem pe live

function campValid(object) {
    return object.css("background-color", "#aedd71");
}

function campInvalid(object) {
    return object.css("background-color", "#e77373");
}

$(document).ready(

    function () {
        $('#buton_sub_buletin').click(function () {
            var email = $('#subscribe').val();
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/

            if (!emailReg.test(email)) {
                campInvalid($('#subscribe'));
                return false;
            }

            $.ajax({
                type:"POST",
                url:baseUrl + "ajax/abonare-buletin",
                data:{
                    email:email
                },
                success:function (data) {
                    if (data == 'ok')
                        campValid($('#subscribe'));
                }
            });
            return false;
        });
        //pentru hide la gaseste-ti locul
        $('.arataMaiMult').click(function (e) {
            //      console.log(e);
            var $object = $(this).prev().prev();
            //  $object.removeClass('ascuns').addClass("neascuns");

            if ($object.hasClass('ascuns')) {
                $object.switchClass('ascuns', 'neascuns', 0, 'easeOutBounce');

                // $object.removeClass("ascuns", 500);

            }
            else {
                $object.switchClass('neascuns', 'ascuns', 1000, 'easeOutBounce');
                // $object.removeClass("neascuns", 500);
                // $object.addClass("ascuns", 1000);
            }
            e.preventDefault(); //scoate actiunea lui a (ex: hreful)

            //return false();
            e.stopPropagation();// opreste propagarea eventului  bubbling - div din interiorul unui div
        });

//### SUBMITUL DE CERERI RUGACIUNE AJAX #### //ri

        $('#buton_cerere').click(function (e) {
            var nume = $('#nume').val();
            var localitate = $('#localitate').val();
            var mesaj = $('#mesaj').val();
            var publica = 0;
            if ($('#publica').is(':checked') == true) {
                var publica = 1;
            }
            var $object = $('#flashdata');
            if (nume == '' || nume == 'Numele si prenumele*') {
                campInvalid($('#nume'));
                return false;
            }
            else if (mesaj == '') {
                campInvalid($('#mesaj'));
                return false;
            }
            else {
                $.ajax({
                    type:"POST",
                    url:baseUrl + "adauga-cerere",
                    data:{
                        nume:nume,
                        localitate:localitate,
                        mesaj:mesaj,
                        public:publica
                    },
                    success:function (data) {
//                    if (data == 'ok')
//                        campValid($('#subscribe'));
                        // ASTA E   alert($('#publica').is(':checked'));
                        $object.switchClass('invisibil', 'neascuns', 0, 'easeOutBounce');
                        $('#form_cereri').click();

                    }
                });
            }
            //  return false;
            e.preventDefault();
        });




    }
);