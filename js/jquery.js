$(document).ready(function () {
    $('#home').hover(function () {
        $('body').css('background-image', 'url("./media/home.jpg")');
    },
        function () {
            $('body').css('background-image', 'none');
        });

    $('#gaming').hover(function () {
        $('body').css('background-image', 'url("./media/gaming.jpg")');
    },
        function () {
            $('body').css('background-image', 'none');
        });

    $('#work').hover(function () {
        $('body').css('background-image', 'url("./media/workstation.jpg")');
    },
        function () {
            $('body').css('background-image', 'none');
        });
});