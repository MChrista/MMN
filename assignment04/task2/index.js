function handle_mousedown(e){
    
    var mouseDownPositionX = e.pageX;
    var mouseDownPositionY = e.pageY;
    var elementPosition = $(this).offset();
    var element = this;
    
    function handle_dragging(e){
        
        var left = elementPosition.left + (e.pageX - mouseDownPositionX);
        var top = elementPosition.top + (e.pageY - mouseDownPositionY);
        $(element)
        .offset({top: top, left: left});
    }
    function handle_mouseup(e){
        $('body')
        .unbind('mousemove', handle_dragging)
        .unbind('mouseup', handle_mouseup);
    }
    $('body')
    .bind('mouseup', handle_mouseup)
    .bind('mousemove', handle_dragging);
}

$(document).ready(function(){
    $('.noteDisplay').mousedown(handle_mousedown);
});

function addNote(){
    
}



