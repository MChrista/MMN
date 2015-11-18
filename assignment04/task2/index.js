function handle_mousedown(e){
    window.my_dragging = {};
    my_dragging.pageX0 = e.pageX;
    my_dragging.pageY0 = e.pageY;
    my_dragging.elem = this;
    my_dragging.offset0 = $(this).offset();
    function handle_dragging(e){
        var left = my_dragging.offset0.left + (e.pageX - my_dragging.pageX0);
        var top = my_dragging.offset0.top + (e.pageY - my_dragging.pageY0);
        $(my_dragging.elem)
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



