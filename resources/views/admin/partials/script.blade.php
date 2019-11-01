<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
    $(".discart").hover(function(){
        $(".top-cart-content").css("display","block");
    }, function(){
        $(".top-cart-content").css("display","none");
    });
</script>
<script src="../home/lib/slider/jquery.nivo.slider.pack.js" type="text/javascript"></script>
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
</script>

<!-- Owl Carousel Assets -->
<script src="../home/lib/owlcarousel/owl.carousel.js"></script>
<script>
    $(document).ready(function() {
        $("#slider-tintuc").owlCarousel({
            autoPlay: 3000,
            navigation : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem : true
        });
        $("#spmoi").owlCarousel({
            autoPlay: 3000,
            itemsCustom : [
                [0, 2],
                [600, 3],
                [1200, 4],
            ],
        });
    });
</script>

<script type="text/javascript">
    // hidden-show children menu
    $(document).ready(function () {
        //use event delegation since classes are changed dynamically
        $('.ulspmobi').on('click', '.iconlist', function () {
            //remove the show class and assign hidden
            $(this).toggleClass('iconlist1 iconlist');
            //the subfield is a child of the parent not the next sibling
            $(this).siblings('ul.mnboxl_1').show('slow');
        });
        $('.ulspmobi').on('click', '.iconlist1', function () {
            $(this).toggleClass('iconlist1 iconlist');
            $(this).siblings('ul.mnboxl_1').hide('slow');
        });
    });
</script>
