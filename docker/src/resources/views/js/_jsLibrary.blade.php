<script src="{{asset('js/jquery/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('js/jquery/jquery.datetimepicker.full.js')}}"></script>
<script src="{{asset('js/library/remodal.min.js')}}"></script>
<script src="{{asset('js/library/remodal.js')}}"></script>
<script src="{{asset('js/library/moment.min.js')}}"></script>
<script src="{{asset('js/library/select2.min.js')}}"></script>
<script src="{{asset('js/library/wow.min.js')}}"></script>
<script src="{{asset('js/library/smooth-scroll.min.js')}}"></script>
<script src="{{asset('js/library/smooth-scroll.polyfills.min.js')}}"></script>
<script src="{{asset('js/library/ja.js')}}"></script>
<script src="{{asset('js/library/wickedpicker.min.js')}}"></script>
<script src="{{asset('js/library/dataTables.min.js')}}"></script>
<script src="{{asset('js/jquery/calendar.js')}}"></script>
<script src="{{asset('js/jquery/fullcalendar.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
<!-- chart.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/protonet-jquery.inview/1.1.2/jquery.inview.min.js"></script>
<script text="javascript">
    /**
     * index.js
     * - All our useful JS goes here, awesome!
     */
    const _toggleFullScreen = function _toggleFullScreen() {
        if (document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement) {
            if (document.cancelFullScreen) {
                document.cancelFullScreen();
            } else {
                if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                } else {
                    if (document.webkitCancelFullScreen) {
                        document.webkitCancelFullScreen();
                    }
                }
            }
        } else {
            const _element = document.documentElement;
            if (_element.requestFullscreen) {
                _element.requestFullscreen();
            } else {
                if (_element.mozRequestFullScreen) {
                    _element.mozRequestFullScreen();
                } else {
                    if (_element.webkitRequestFullscreen) {
                        _element.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
                    }
                }
            }
        }
    };

    const userAgent = window.navigator.userAgent;

    const iPadSafari =
        !!userAgent.match(/iPad/i) &&     // Detect iPad first.
        !!userAgent.match(/WebKit/i) &&   // Filter browsers with webkit engine only
        !userAgent.match(/CriOS/i) &&   // Eliminate Chrome & Brave
        !userAgent.match(/OPiOS/i) &&   // Rule out Opera
        !userAgent.match(/FxiOS/i) &&   // Rule out Firefox
        !userAgent.match(/FocusiOS/i);    // Eliminate Firefox Focus as well!

    const element = document.getElementById('fullScreenButton');

    function iOS() {
        if (userAgent.match(/ipad|iphone|ipod/i)) {
            const iOS = {};
            iOS.majorReleaseNumber = +userAgent.match(/OS (\d)?\d_\d(_\d)?/i)[0].split('_')[0].replace('OS ', '');
            return iOS;
        }
    }

    if (element !== null) {
        if (userAgent.match(/iPhone/i) || userAgent.match(/iPod/i)) {
            element.className += ' hidden';
        } else if (userAgent.match(/iPad/i) && iOS().majorReleaseNumber < 12) {
            element.className += ' hidden';
        } else if (userAgent.match(/iPad/i) && !iPadSafari) {
            element.className += ' hidden';
        } else {
            element.addEventListener('click', _toggleFullScreen, false);
        }
    }

</script>

<!-- jQuery UI --><!-- jQuery UI のCSS -->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
