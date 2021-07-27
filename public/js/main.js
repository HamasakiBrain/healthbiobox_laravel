$(document).ready(function() {
    $('#table').DataTable({
        responsive: !0,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json"
        }
    });
    let mobile = $("body").width() < 550
    console.info("Width: ", $("body").width())
    console.info("Mobile: ",mobile)
    $(".burger-mobile, .my-close").on('click', function (){
        $(".fixed-menu").toggleClass('active')
    })
    if (mobile){
        let aside = $(".aside")
        $(".fixed-menu").append(aside)
    }
    $(".pay input").on('click', function (){
        $(".pay input").removeAttr("checked")
        $(this).is(":checked") ? $(this).prop("checked", true) : $(this).prop("checked", false)
        $(this).is(":checked") ? console.info("checked") : console.info("unchecked")
        console.info("PayBonus: ", $(".pay input:checked").val())
    })


} );
function copyToClipboard(elementId) {
    let aux = document.createElement("input");
    aux.setAttribute("value", document.getElementById(elementId).innerHTML);
    document.body.appendChild(aux);
    aux.select();
    document.execCommand("copy");
    document.body.removeChild(aux);
    alertify.success('Успешно скопировали');

}