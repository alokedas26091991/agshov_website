angular.module('ui.bootstrap.modal', [])
.constant('modalConfig', {
  backdrop: true,
  escape: true
})
.directive('modal', ['$parse', 'modalConfig', function($parse, modalConfig) {
  var backdropEl;
  var body = $('.main-panel');
  return {
    restrict: 'EA',
    link: function(scope, elm, attrs) {
      var opts = angular.extend({}, modalConfig, scope.$eval(attrs.uiOptions || attrs.bsOptions || attrs.options));
      var shownExpr = attrs.modal || attrs.show;
      var setClosed;

      if (attrs.close) {
        setClosed = function() {
          scope.$apply(attrs.close);
        };
      } else {
        setClosed = function() {
          scope.$apply(function() {
            $parse(shownExpr).assign(scope, false);
          });
        };
      }
      elm.addClass('modal');

      if (opts.backdrop && !backdropEl) {
        backdropEl = angular.element('<div class="modal-backdrop fade show"></div>');
        backdropEl.css('display','none');
        $('.main-content').append(backdropEl);
      }

      function setShown(shown) {
        scope.$apply(function() {
          model.assign(scope, shown);
        });
      }

      function escapeClose(evt) {
        if (evt.which === 27) { setClosed(); }
      }
      function clickClose() {
        setClosed();
      }

      function close() {
        if (opts.escape) { body.unbind('keyup', escapeClose); }
        if (opts.backdrop) {
          backdropEl.css('display', 'none').removeClass('show');
          backdropEl.unbind('click', clickClose);
        }
        elm.css('display', 'none').removeClass('show');
        body.removeClass('modal-open');
      }
      function open() {
        if (opts.escape) { body.bind('keyup', escapeClose); }
        if (opts.backdrop) {
          backdropEl.css('display', 'block').addClass('show');
          if(opts.backdrop != "static") {
            backdropEl.bind('click', clickClose);
          }
        }
        elm.css('display', 'block').addClass('show');
        body.addClass('modal-open');
      }

      scope.$watch(shownExpr, function(isShown, oldShown) {
        if (isShown) {
          open();
        } else {
          close();
        }
      });
    }
  };
}]);