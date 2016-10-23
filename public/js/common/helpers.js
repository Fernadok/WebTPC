var App = App || {};

(function () {
    if (!Array.prototype.remove) {
        Array.prototype.remove = function (vals, all) {
            var i, removedItems = [];
            if (!Array.isArray(vals)) vals = [vals];
            for (var j = 0; j < vals.length; j++) {
                if (all) {
                    for (i = this.length; i--;) {
                        if (this[i] === vals[j]) removedItems.push(this.splice(i, 1));
                    }
                }
                else {
                    i = this.indexOf(vals[j]);
                    if (i > -1) removedItems.push(this.splice(i, 1));
                }
            }
            return removedItems;
        };
    }
})();

// -- Re-Write console for isDebug
(function () {
    // -- console.log
    if (window.console && console.log) {
        var oldlog = console.log;
        console.log = function () {
            if (typeof isDebug != "undefined") {
                Array.prototype.unshift.call(arguments, 'VIVIENDA | Mode Debug: ');
                oldlog.apply(this, arguments);
                this.trace();
            }
        }
    }

    // -- console.warn
    if (window.console && console.warn) {
        var oldwarn = console.warn;
        console.warn = function () {
            if (typeof isDebug != "undefined") {
                Array.prototype.unshift.call(arguments, 'VIVIENDA | Mode Debug: ');
                oldwarn.apply(this, arguments);
            }
        }
    }

    // -- console.error
    if (window.console && console.error) {
        var olderror = console.error;
        console.error = function () {
            if (typeof isDebug != "undefined") {
                Array.prototype.unshift.call(arguments, 'VIVIENDA | Mode Debug: ');
                olderror.apply(this, arguments);
                this.trace();
            }
        }
    }
})();

// -- Truncate
(function () {
    String.prototype.trunc =
     function (n, useWordBoundary) {
         var isTooLong = this.length > n,
             s_ = isTooLong ? this.substr(0, n - 1) : this;
         s_ = (useWordBoundary && isTooLong) ? s_.substr(0, s_.lastIndexOf(' ')) : s_;
         return isTooLong ? s_ + '...' : s_.replace('"', '');
     };
})();

// -- Generate Pages
(function () {
    App.updatePages = function (metaData) {
        var pages = [];
        if (metaData.pageNumber == 1) {
            pages.push(metaData.pageNumber);
            if ((metaData.pageNumber + 1) <= metaData.pageCount) {
                pages.push(metaData.pageNumber + 1);
            }
            if ((metaData.pageNumber + 2) <= metaData.pageCount) {
                pages.push(metaData.pageNumber + 2);
            }
        } else if (metaData.pageNumber == metaData.pageCount) {
            if ((metaData.pageNumber - 2) >= 1) {
                pages.push(metaData.pageNumber - 2);
            }
            if ((metaData.pageNumber - 1) >= 1) {
                pages.push(metaData.pageNumber - 1);
            }
            pages.push(metaData.pageNumber);
        } else {
            if ((metaData.pageNumber - 1) >= 1) {
                pages.push(metaData.pageNumber - 1);
            }

            pages.push(metaData.pageNumber);

            if ((metaData.pageNumber + 1) <= metaData.pageCount) {
                pages.push(metaData.pageNumber + 1);
            }
        }
        return pages;
    }

})(App);


// -- Function Scroll
(function () {

    App.initScroll = function () {
        $('.scrollup').fadeOut();
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('.scrollup').fadeIn();
            } else {
                $('.scrollup').fadeOut();
            }
        });

        $('.scrollup').click(function () {
            $("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        });
    }

})(App);


