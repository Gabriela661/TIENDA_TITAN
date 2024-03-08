<head>
    <!-- Para las fuentes -icono de whatssapp -->
    <link rel="stylesheet" href="assets/plugin/components/Font Awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/plugin/whatsapp-chat-support.css">
</head>
<div class="whatsapp_chat_support wcs_fixed_right" id="button-w">
    <div class="wcs_button_label">
        Contáctanos
    </div>
    <div class="wcs_button wcs_button_circle">
        <span class="fa fa-whatsapp"></span>
    </div>

    <div class="wcs_popup">
        <div class="wcs_popup_close">
            <span class="fa fa-close"></span>
        </div>
        <div class="wcs_popup_header">
            <span class="fa fa-whatsapp"></span>
            <strong>Servicio al cliente</strong>

            <div class="wcs_popup_header_description">¿Necesidad de ayuda? Chatea con nosotros en Whatsapp</div>

        </div>
        <div class="wcs_popup_input" data-number="51996445089" data-availability='{ "monday":"07:00-22:30", "tuesday":"07:00-22:30", "wednesday":"07:7030-22:30", "thursday":"07:00-22:30", "friday":"07:00-22:30", "saturday":"09:00-18:30", "sunday":"09:00-22:30" }'>
            <input type="text" placeholder="Escribir pregunta!" />
            <i class="fa fa-play"></i>
        </div>
        <div class="wcs_popup_avatar">
            <img src="" alt="">
        </div>
    </div>
</div>
<script src="assets/js/jquery-1.11.0.min.js"></script>
<script src="assets/plugin/components/moment/moment.min.js"></script>
<script src="assets/plugin/components/moment/moment-timezone-with-data.min.js"></script> <!-- spanish language (es) -->
<script src="assets/plugin/whatsapp-chat-support.js"></script>
<script>
    $('#button-w').whatsappChatSupport({
        defaultMsg: '',
    });
</script>