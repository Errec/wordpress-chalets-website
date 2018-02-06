(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
'use strict';

require('./wp/skip-link-focus-fix');

require('./menu');

require('./masonry');

},{"./masonry":2,"./menu":3,"./wp/skip-link-focus-fix":4}],2:[function(require,module,exports){
'use strict';

var $ = window.jQuery;

$(document).ready(function () {

    if (!window.Masonry || !$('body').hasClass('layout--masonry')) {
        return;
    }

    var $content = $('.masonry-posts');

    $content.addClass('is-loading').imagesLoaded(function () {

        $content.masonry({
            itemSelector: '.post',
            columnWidth: '.post'
        });

        $content.addClass('images-loaded');
    });
});

},{}],3:[function(require,module,exports){
'use strict';

var $ = jQuery;
var $document = $(document);

var open = function open($el) {
    $el.addClass('is-open');

    return true; // true triggers e.preventDefault()
};

var close = function close($el) {
    $el.removeClass('is-open');

    return true; // true triggers e.preventDefault()
};

var toggle = function toggle($el) {
    var func = $el.hasClass('is-open') ? close : open;
    return func($el);
};

/*
    Toggle the responsive menu popup
 */
$document.on('click', '.site-menu-toggle', function (e) {

    var $el = $(this);
    var $dropdown = $('#primary-menu');

    if (toggle($dropdown)) {
        e.preventDefault();
    }
});

/*
    Open Dropdowns
 */
$document.on('click', '.menu-item-has-children > a', function (e) {
    var $el = $(this);
    var $parent = $el.parent();
    var $dropdown = $parent.find('> .sub-menu');

    if (!$dropdown.length) {
        return; // no children, no dropdown action
    }

    if (toggle($parent)) {
        e.preventDefault();
    }
});

/*
    Listen for the ESC Key and close the menu
 */
$document.on('keyup', function (e) {
    if (e.key === 'Escape' && $('#site-menu .is-open').length > 0) {
        close($('#site-menu .is-open'));
    }
});

/*
    Close when clicked outside the menu
 */
$document.on('click', function (e) {
    if (!$(e.target).closest('#site-menu').length) {
        close($('#site-menu').find('.is-open'));
    }
});

},{}],4:[function(require,module,exports){
'use strict';

/**
 * File skip-link-focus-fix.js.
 *
 * Helps with accessibility for keyboard only users.
 *
 * Learn more: https://git.io/vWdr2
 */
(function () {
    var isIe = /(trident|msie)/i.test(navigator.userAgent);

    if (isIe && document.getElementById && window.addEventListener) {
        window.addEventListener('hashchange', function () {
            var id = location.hash.substring(1),
                element;

            if (!/^[A-z0-9_-]+$/.test(id)) {
                return;
            }

            element = document.getElementById(id);

            if (element) {
                if (!/^(?:a|select|input|button|textarea)$/i.test(element.tagName)) {
                    element.tabIndex = -1;
                }

                element.focus();
            }
        }, false);
    }
})();

},{}],5:[function(require,module,exports){
'use strict';

require('./app/app');

},{"./app/app":1}]},{},[5])
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIm5vZGVfbW9kdWxlcy9icm93c2VyLXBhY2svX3ByZWx1ZGUuanMiLCJhc3NldHMvc2NyaXB0cy9hcHAvYXBwLmpzIiwiYXNzZXRzL3NjcmlwdHMvYXBwL21hc29ucnkuanMiLCJhc3NldHMvc2NyaXB0cy9hcHAvbWVudS5qcyIsImFzc2V0cy9zY3JpcHRzL2FwcC93cC9za2lwLWxpbmstZm9jdXMtZml4LmpzIiwiYXNzZXRzL3NjcmlwdHMvdGhlbWUtc2NyaXB0LmpzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBOzs7QUNBQTs7QUFDQTs7QUFDQTs7Ozs7QUNGQSxJQUFJLElBQUksT0FBTyxNQUFmOztBQUVBLEVBQUcsUUFBSCxFQUFjLEtBQWQsQ0FBcUIsWUFBTTs7QUFFdkIsUUFBSyxDQUFDLE9BQU8sT0FBUixJQUFtQixDQUFDLEVBQUcsTUFBSCxFQUFZLFFBQVosQ0FBc0IsaUJBQXRCLENBQXpCLEVBQXFFO0FBQ2pFO0FBQ0g7O0FBSUQsUUFBTSxXQUFXLEVBQUcsZ0JBQUgsQ0FBakI7O0FBR0EsYUFBUyxRQUFULENBQW1CLFlBQW5CLEVBQWtDLFlBQWxDLENBQWdELFlBQU07O0FBRWxELGlCQUFTLE9BQVQsQ0FBa0I7QUFDZCwwQkFBYyxPQURBO0FBRWQseUJBQWM7QUFGQSxTQUFsQjs7QUFLQSxpQkFBUyxRQUFULENBQW1CLGVBQW5CO0FBRUgsS0FURDtBQVlILENBdkJEOzs7OztBQ0ZBLElBQUksSUFBSSxNQUFSO0FBQ0EsSUFBSSxZQUFZLEVBQUUsUUFBRixDQUFoQjs7QUFHQSxJQUFNLE9BQU8sU0FBUCxJQUFPLENBQUUsR0FBRixFQUFXO0FBQ3BCLFFBQUksUUFBSixDQUFjLFNBQWQ7O0FBRUEsV0FBTyxJQUFQLENBSG9CLENBR1I7QUFDZixDQUpEOztBQU1BLElBQU0sUUFBUSxTQUFSLEtBQVEsQ0FBRSxHQUFGLEVBQVc7QUFDckIsUUFBSSxXQUFKLENBQWlCLFNBQWpCOztBQUVBLFdBQU8sSUFBUCxDQUhxQixDQUdUO0FBQ2YsQ0FKRDs7QUFNQSxJQUFNLFNBQVMsU0FBVCxNQUFTLENBQUUsR0FBRixFQUFXO0FBQ3RCLFFBQUksT0FBUyxJQUFJLFFBQUosQ0FBYyxTQUFkLENBQUYsR0FBZ0MsS0FBaEMsR0FBd0MsSUFBbkQ7QUFDQSxXQUFPLEtBQU0sR0FBTixDQUFQO0FBQ0gsQ0FIRDs7QUFNQTs7O0FBR0EsVUFBVSxFQUFWLENBQWMsT0FBZCxFQUF1QixtQkFBdkIsRUFBNEMsVUFBVyxDQUFYLEVBQWU7O0FBRXZELFFBQUksTUFBWSxFQUFHLElBQUgsQ0FBaEI7QUFDQSxRQUFJLFlBQVksRUFBRyxlQUFILENBQWhCOztBQUdBLFFBQUssT0FBUSxTQUFSLENBQUwsRUFBMkI7QUFDdkIsVUFBRSxjQUFGO0FBQ0g7QUFFSixDQVZEOztBQVlBOzs7QUFHQSxVQUFVLEVBQVYsQ0FBYyxPQUFkLEVBQXVCLDZCQUF2QixFQUFzRCxVQUFXLENBQVgsRUFBZTtBQUNqRSxRQUFJLE1BQVksRUFBRyxJQUFILENBQWhCO0FBQ0EsUUFBSSxVQUFZLElBQUksTUFBSixFQUFoQjtBQUNBLFFBQUksWUFBWSxRQUFRLElBQVIsQ0FBYyxhQUFkLENBQWhCOztBQUVBLFFBQUssQ0FBQyxVQUFVLE1BQWhCLEVBQXlCO0FBQ3JCLGVBRHFCLENBQ2Q7QUFDVjs7QUFFRCxRQUFLLE9BQVEsT0FBUixDQUFMLEVBQXlCO0FBQ3JCLFVBQUUsY0FBRjtBQUNIO0FBR0osQ0FkRDs7QUFnQkE7OztBQUdBLFVBQVUsRUFBVixDQUFjLE9BQWQsRUFBdUIsVUFBVyxDQUFYLEVBQWU7QUFDbEMsUUFBSyxFQUFFLEdBQUYsS0FBVSxRQUFWLElBQXNCLEVBQUcscUJBQUgsRUFBMkIsTUFBM0IsR0FBb0MsQ0FBL0QsRUFBbUU7QUFDL0QsY0FBTyxFQUFFLHFCQUFGLENBQVA7QUFDSDtBQUNKLENBSkQ7O0FBTUE7OztBQUdBLFVBQVUsRUFBVixDQUFjLE9BQWQsRUFBdUIsVUFBVyxDQUFYLEVBQWU7QUFDbEMsUUFBSyxDQUFFLEVBQUcsRUFBRSxNQUFMLEVBQWMsT0FBZCxDQUF1QixZQUF2QixFQUFzQyxNQUE3QyxFQUFzRDtBQUNsRCxjQUFPLEVBQUUsWUFBRixFQUFnQixJQUFoQixDQUFxQixVQUFyQixDQUFQO0FBQ0g7QUFDSixDQUpEOzs7OztBQ3BFQTs7Ozs7OztBQU9BLENBQUMsWUFBVztBQUNSLFFBQUksT0FBTyxrQkFBa0IsSUFBbEIsQ0FBd0IsVUFBVSxTQUFsQyxDQUFYOztBQUVBLFFBQUssUUFBUSxTQUFTLGNBQWpCLElBQW1DLE9BQU8sZ0JBQS9DLEVBQWtFO0FBQzlELGVBQU8sZ0JBQVAsQ0FBeUIsWUFBekIsRUFBdUMsWUFBVztBQUM5QyxnQkFBSSxLQUFLLFNBQVMsSUFBVCxDQUFjLFNBQWQsQ0FBeUIsQ0FBekIsQ0FBVDtBQUFBLGdCQUNJLE9BREo7O0FBR0EsZ0JBQUssQ0FBSSxnQkFBZ0IsSUFBaEIsQ0FBc0IsRUFBdEIsQ0FBVCxFQUF3QztBQUNwQztBQUNIOztBQUVELHNCQUFVLFNBQVMsY0FBVCxDQUF5QixFQUF6QixDQUFWOztBQUVBLGdCQUFLLE9BQUwsRUFBZTtBQUNYLG9CQUFLLENBQUksd0NBQXdDLElBQXhDLENBQThDLFFBQVEsT0FBdEQsQ0FBVCxFQUE2RTtBQUN6RSw0QkFBUSxRQUFSLEdBQW1CLENBQUMsQ0FBcEI7QUFDSDs7QUFFRCx3QkFBUSxLQUFSO0FBQ0g7QUFDSixTQWpCRCxFQWlCRyxLQWpCSDtBQWtCSDtBQUNKLENBdkJEOzs7OztBQ0ZBIiwiZmlsZSI6ImdlbmVyYXRlZC5qcyIsInNvdXJjZVJvb3QiOiIiLCJzb3VyY2VzQ29udGVudCI6WyIoZnVuY3Rpb24gZSh0LG4scil7ZnVuY3Rpb24gcyhvLHUpe2lmKCFuW29dKXtpZighdFtvXSl7dmFyIGE9dHlwZW9mIHJlcXVpcmU9PVwiZnVuY3Rpb25cIiYmcmVxdWlyZTtpZighdSYmYSlyZXR1cm4gYShvLCEwKTtpZihpKXJldHVybiBpKG8sITApO3ZhciBmPW5ldyBFcnJvcihcIkNhbm5vdCBmaW5kIG1vZHVsZSAnXCIrbytcIidcIik7dGhyb3cgZi5jb2RlPVwiTU9EVUxFX05PVF9GT1VORFwiLGZ9dmFyIGw9bltvXT17ZXhwb3J0czp7fX07dFtvXVswXS5jYWxsKGwuZXhwb3J0cyxmdW5jdGlvbihlKXt2YXIgbj10W29dWzFdW2VdO3JldHVybiBzKG4/bjplKX0sbCxsLmV4cG9ydHMsZSx0LG4scil9cmV0dXJuIG5bb10uZXhwb3J0c312YXIgaT10eXBlb2YgcmVxdWlyZT09XCJmdW5jdGlvblwiJiZyZXF1aXJlO2Zvcih2YXIgbz0wO288ci5sZW5ndGg7bysrKXMocltvXSk7cmV0dXJuIHN9KSIsImltcG9ydCAnLi93cC9za2lwLWxpbmstZm9jdXMtZml4J1xuaW1wb3J0ICcuL21lbnUnXG5pbXBvcnQgJy4vbWFzb25yeSdcbiIsImxldCAkID0gd2luZG93LmpRdWVyeVxuXG4kKCBkb2N1bWVudCApLnJlYWR5KCAoKSA9PiB7XG5cbiAgICBpZiAoICF3aW5kb3cuTWFzb25yeSB8fCAhJCggJ2JvZHknICkuaGFzQ2xhc3MoICdsYXlvdXQtLW1hc29ucnknICkgKSB7XG4gICAgICAgIHJldHVyblxuICAgIH1cblxuXG5cbiAgICBjb25zdCAkY29udGVudCA9ICQoICcubWFzb25yeS1wb3N0cycgKVxuXG5cbiAgICAkY29udGVudC5hZGRDbGFzcyggJ2lzLWxvYWRpbmcnICkuaW1hZ2VzTG9hZGVkKCAoKSA9PiB7XG5cbiAgICAgICAgJGNvbnRlbnQubWFzb25yeSgge1xuICAgICAgICAgICAgaXRlbVNlbGVjdG9yOiAnLnBvc3QnLFxuICAgICAgICAgICAgY29sdW1uV2lkdGggOiAnLnBvc3QnLFxuICAgICAgICB9IClcblxuICAgICAgICAkY29udGVudC5hZGRDbGFzcyggJ2ltYWdlcy1sb2FkZWQnIClcblxuICAgIH0gKVxuXG5cbn0gKVxuIiwibGV0ICQgPSBqUXVlcnlcbmxldCAkZG9jdW1lbnQgPSAkKGRvY3VtZW50KVxuXG5cbmNvbnN0IG9wZW4gPSAoICRlbCApID0+IHtcbiAgICAkZWwuYWRkQ2xhc3MoICdpcy1vcGVuJyApXG5cbiAgICByZXR1cm4gdHJ1ZSAvLyB0cnVlIHRyaWdnZXJzIGUucHJldmVudERlZmF1bHQoKVxufVxuXG5jb25zdCBjbG9zZSA9ICggJGVsICkgPT4ge1xuICAgICRlbC5yZW1vdmVDbGFzcyggJ2lzLW9wZW4nIClcblxuICAgIHJldHVybiB0cnVlIC8vIHRydWUgdHJpZ2dlcnMgZS5wcmV2ZW50RGVmYXVsdCgpXG59XG5cbmNvbnN0IHRvZ2dsZSA9ICggJGVsICkgPT4ge1xuICAgIGxldCBmdW5jID0gKCAkZWwuaGFzQ2xhc3MoICdpcy1vcGVuJyApICkgPyBjbG9zZSA6IG9wZW5cbiAgICByZXR1cm4gZnVuYyggJGVsIClcbn1cblxuXG4vKlxuICAgIFRvZ2dsZSB0aGUgcmVzcG9uc2l2ZSBtZW51IHBvcHVwXG4gKi9cbiRkb2N1bWVudC5vbiggJ2NsaWNrJywgJy5zaXRlLW1lbnUtdG9nZ2xlJywgZnVuY3Rpb24gKCBlICkge1xuXG4gICAgbGV0ICRlbCAgICAgICA9ICQoIHRoaXMgKVxuICAgIGxldCAkZHJvcGRvd24gPSAkKCAnI3ByaW1hcnktbWVudScgKVxuXG5cbiAgICBpZiAoIHRvZ2dsZSggJGRyb3Bkb3duICkgKSB7XG4gICAgICAgIGUucHJldmVudERlZmF1bHQoKVxuICAgIH1cblxufSApXG5cbi8qXG4gICAgT3BlbiBEcm9wZG93bnNcbiAqL1xuJGRvY3VtZW50Lm9uKCAnY2xpY2snLCAnLm1lbnUtaXRlbS1oYXMtY2hpbGRyZW4gPiBhJywgZnVuY3Rpb24gKCBlICkge1xuICAgIGxldCAkZWwgICAgICAgPSAkKCB0aGlzIClcbiAgICBsZXQgJHBhcmVudCAgID0gJGVsLnBhcmVudCgpXG4gICAgbGV0ICRkcm9wZG93biA9ICRwYXJlbnQuZmluZCggJz4gLnN1Yi1tZW51JyApXG5cbiAgICBpZiAoICEkZHJvcGRvd24ubGVuZ3RoICkge1xuICAgICAgICByZXR1cm4gLy8gbm8gY2hpbGRyZW4sIG5vIGRyb3Bkb3duIGFjdGlvblxuICAgIH1cblxuICAgIGlmICggdG9nZ2xlKCAkcGFyZW50ICkgKSB7XG4gICAgICAgIGUucHJldmVudERlZmF1bHQoKVxuICAgIH1cblxuXG59IClcblxuLypcbiAgICBMaXN0ZW4gZm9yIHRoZSBFU0MgS2V5IGFuZCBjbG9zZSB0aGUgbWVudVxuICovXG4kZG9jdW1lbnQub24oICdrZXl1cCcsIGZ1bmN0aW9uICggZSApIHtcbiAgICBpZiAoIGUua2V5ID09PSAnRXNjYXBlJyAmJiAkKCAnI3NpdGUtbWVudSAuaXMtb3BlbicgKS5sZW5ndGggPiAwICkge1xuICAgICAgICBjbG9zZSggJCgnI3NpdGUtbWVudSAuaXMtb3BlbicpIClcbiAgICB9XG59IClcblxuLypcbiAgICBDbG9zZSB3aGVuIGNsaWNrZWQgb3V0c2lkZSB0aGUgbWVudVxuICovXG4kZG9jdW1lbnQub24oICdjbGljaycsIGZ1bmN0aW9uICggZSApIHtcbiAgICBpZiAoICEgJCggZS50YXJnZXQgKS5jbG9zZXN0KCAnI3NpdGUtbWVudScgKS5sZW5ndGggKSB7XG4gICAgICAgIGNsb3NlKCAkKCcjc2l0ZS1tZW51JykuZmluZCgnLmlzLW9wZW4nKSApXG4gICAgfVxufSApIiwiLyoqXG4gKiBGaWxlIHNraXAtbGluay1mb2N1cy1maXguanMuXG4gKlxuICogSGVscHMgd2l0aCBhY2Nlc3NpYmlsaXR5IGZvciBrZXlib2FyZCBvbmx5IHVzZXJzLlxuICpcbiAqIExlYXJuIG1vcmU6IGh0dHBzOi8vZ2l0LmlvL3ZXZHIyXG4gKi9cbihmdW5jdGlvbigpIHtcbiAgICB2YXIgaXNJZSA9IC8odHJpZGVudHxtc2llKS9pLnRlc3QoIG5hdmlnYXRvci51c2VyQWdlbnQgKTtcblxuICAgIGlmICggaXNJZSAmJiBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCAmJiB3aW5kb3cuYWRkRXZlbnRMaXN0ZW5lciApIHtcbiAgICAgICAgd2luZG93LmFkZEV2ZW50TGlzdGVuZXIoICdoYXNoY2hhbmdlJywgZnVuY3Rpb24oKSB7XG4gICAgICAgICAgICB2YXIgaWQgPSBsb2NhdGlvbi5oYXNoLnN1YnN0cmluZyggMSApLFxuICAgICAgICAgICAgICAgIGVsZW1lbnQ7XG5cbiAgICAgICAgICAgIGlmICggISAoIC9eW0EtejAtOV8tXSskLy50ZXN0KCBpZCApICkgKSB7XG4gICAgICAgICAgICAgICAgcmV0dXJuO1xuICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICBlbGVtZW50ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoIGlkICk7XG5cbiAgICAgICAgICAgIGlmICggZWxlbWVudCApIHtcbiAgICAgICAgICAgICAgICBpZiAoICEgKCAvXig/OmF8c2VsZWN0fGlucHV0fGJ1dHRvbnx0ZXh0YXJlYSkkL2kudGVzdCggZWxlbWVudC50YWdOYW1lICkgKSApIHtcbiAgICAgICAgICAgICAgICAgICAgZWxlbWVudC50YWJJbmRleCA9IC0xO1xuICAgICAgICAgICAgICAgIH1cblxuICAgICAgICAgICAgICAgIGVsZW1lbnQuZm9jdXMoKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgfSwgZmFsc2UgKTtcbiAgICB9XG59KSgpO1xuIiwiLy9cbi8vXG4vLyBIZWxsbyB0aGVyZSxcbi8vIEVTMjAxNSBpbXBvcnRzIHdvcmsgaGVyZVxuLy8gQnkgZGVmYXVsdCBJJ20gaW1wb3J0aW5nIGAvYXBwL2FwcC5qc2AgaGVyZSwgYnV0IHlvdSBjYW4gZG8gd2hhdGV2ZXIgeW91IHdhbnQgaGVyZS5cbmltcG9ydCAnLi9hcHAvYXBwJ1xuXG4iXX0=
