$(document).ready(function(){
    $(".view").on('click',function(){

        let sr = $(this).attr("data-srid");


        $("#exampleModal").modal('show');
        $.ajax({
            url: "salesrep/"+sr,
            type: "GET",
            success: function( response ) {
                let salesRep = response.salesRep;
                $("#modal_sp_name").html(salesRep.name),
                    $("#modal_sr_id").html(salesRep.id);
                $("#modal_sr_fullname").html(salesRep.name);
                $("#modal_sr_email").html(salesRep.email);
                $("#modal_sr_tp").html(salesRep.telephone);
                $("#modal_sr_joindate").html(salesRep.joined_date);
                $("#modal_sr_route").html(salesRep.route.name);
                $("#modal_sr_comments").html(salesRep.comments);

                console.log(response);
            }
        });


    });

});
