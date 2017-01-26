/* The dragging code for '.draggable' from the demo above
 * applies to this demo as well so it doesn't have to be repeated. */

// target elements with the "draggable" class
interact('.draggable').draggable({
    // enable inertial throwing
    inertia: true,
    // keep the element within the area of it's parent
    restrict: {
      //restriction: "parent",
      endOnly: true,
      elementRect: { top: 0, left: 0, bottom: 1, right: 1 }
    },
    // enable autoScroll
    autoScroll: true,

    // call this function on every dragmove event
    onmove: dragMoveListener,
    // call this function on every dragend event
    //onend: function (event) {
      //var textEl = event.target.querySelector('p');

      //textEl && (textEl.textContent =
        //'moved a distance of '
        //+ (Math.sqrt(event.dx * event.dx +
                     //event.dy * event.dy)|0) + 'px');
    //}
  });

  function dragMoveListener (event) {
    var target = event.target,
        // keep the dragged position in the data-x/data-y attributes
        x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx,
        y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;

    // translate the element
    target.style.webkitTransform =
    target.style.transform =
      'translate(' + x + 'px, ' + y + 'px)';

    // update the posiion attributes
    target.setAttribute('data-x', x);
    target.setAttribute('data-y', y);

    //$(target).addClass('shrinkDown');
  }

  // this is used later in the resizing and gesture demos
  window.dragMoveListener = dragMoveListener;

// enable draggables to be dropped into this
interact('.dropzone').dropzone({

  // only accept elements matching this CSS selector
  accept: '#yes-drop',
  // Require a 75% element overlap for a drop to be possible
  overlap: 0.75,

  // listen for drop related events:

  ondropactivate: function (event) {
    // add active dropzone feedback
    event.target.classList.add('drop-active');
  },
  ondragenter: function (event) {
    var draggableElement = event.relatedTarget,
        dropzoneElement = event.target;

    // feedback the possibility of a drop
    dropzoneElement.classList.add('drop-target');
    draggableElement.classList.add('can-drop');
    //draggableElement.textContent = 'Dragged in';
  },
  ondragleave: function (event) {
    // remove the drop feedback style
    event.target.classList.remove('drop-target');
    event.relatedTarget.classList.remove('can-drop');
    //event.relatedTarget.textContent = 'Dragged out';
  },
  ondrop: function (event) {
    var DraggedElement = event.relatedTarget;

    if ( $( DraggedElement ).hasClass( "1" ) ) {

        $( ".dragHere" ).fadeOut(function() {
            $(DraggedElement).fadeOut(200);
            setTimeout(function(){
               $('.candidate1').css({
                    'width' : '94%',
                    'opacity' : '1',
                    'position' : 'relative',
                    'border-radius' : '8px'
                });
               $('.candidate1').addClass('activeCandidate');
               if ($('.activeCandidate').length >= 3) {
                $('.quality').css({
                    'opacity' : '1',
                    'top' : '0px',
                    'transition' : '1.5s'
                });
              };
            });
        });
    };

    if ( $( DraggedElement ).hasClass( "2" ) ) {
        $(DraggedElement).fadeOut(200);
        $( ".dragHere" ).fadeOut(function() {
            setTimeout(function(){
               $('.candidate2').css({
                    'width' : '94%',
                    'opacity' : '1',
                    'position' : 'relative',
                    'border-radius' : '8px'
                });
            });
            $('.candidate2').addClass('activeCandidate');
            if ($('.activeCandidate').length >= 3) {
              $('.quality').css({
                  'opacity' : '1',
                  'top' : '0px',
                  'transition' : '1.5s'
              });
            };
        });
    };

    if ( $( DraggedElement ).hasClass( "3" ) ) {
        $(DraggedElement).fadeOut(200);
        $( ".dragHere" ).fadeOut(function() {
            setTimeout(function(){
               $('.candidate3').css({
                    'width' : '94%',
                    'opacity' : '1',
                    'position' : 'relative',
                    'border-radius' : '8px'
                });
            });
            $('.candidate3').addClass('activeCandidate');
            if ($('.activeCandidate').length >= 3) {
              $('.quality').css({
                  'opacity' : '1',
                  'top' : '0px',
                  'transition' : '1.5s'
              });
            };
        });
    };
    /*$('.dragHere').fadeOut(function({
        $('.candidate1').css(
            'opacity', '1'
        );
        $('.candidate1').css('width', '100%');
    });*/
  },
  ondropdeactivate: function (event) {
    // remove active dropzone feedback
    event.target.classList.remove('drop-active');
    event.target.classList.remove('drop-target');
  }

});
