$(document).ready(function() {
    var imgItems = $('.slider li').length;
    var imgPosition = 1;
    
    for(var i = 1; i <= imgItems; i++) {
        $('.pagination').append('<li><span class="fa fa-circle"></span></li>');
    }
    
    $('.slider li').hide();
    $('.slider li:first').show();
    $('.pagination li:first').css({'color' : '#CD6E2E'});
    
    $('.pagination li').click(pagination);
    $('.right span').click(nextSlider);
    $('.left span').click(prevSlider);
    
    function pagination () {
        var paginationPosition = $(this).index() + 1;
        
        $('.slider li').hide();
        $('.slider li:nth-child('+ paginationPosition +')').fadeIn();
        
        $('.pagination li').css({'color' : '#858585'});
        $(this).css({'color' : '#CD6E2E'});
        
        imgPosition = paginationPosition;
    }
    
    function nextSlider () {
        imgPosition++;
        
        if(imgPosition > imgItems)
            imgPosition = 1;
        
        $('.pagination li').css({'color' : '#858585'});
        $('.pagination li:nth-child('+ imgPosition +')').css({'color' : '#CD6E2E'});
                
        $('.slider li').hide();
        $('.slider li:nth-child('+ imgPosition +')').fadeIn();
    }
    
    function prevSlider () {
        imgPosition--;
        
        if(imgPosition == 0)
            imgPosition = imgItems;
        
        $('.pagination li').css({'color' : '#858585'});
        $('.pagination li:nth-child('+ imgPosition +')').css({'color' : '#CD6E2E'});
        
        $('.slider li').hide();
        $('.slider li:nth-child('+ imgPosition +')').fadeIn();
    }
    
    setInterval(function() {
        nextSlider()
    }, 4000);
});