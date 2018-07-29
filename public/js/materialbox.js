@@ -18,6 +18,8 @@
      var placeholder = $('<div></div>').addClass('material-placeholder');
      var originalWidth = 0;
      var originalHeight = 0;
      var ancestorsChanged;
      var ancestor;
      origin.wrap(placeholder);
@@ -46,7 +48,6 @@
        overlayActive = true;
        // Set positioning for placeholder
        placeholder.css({
          width: placeholder[0].getBoundingClientRect().width,
          height: placeholder[0].getBoundingClientRect().height,
@@ -55,7 +56,23 @@
          left: 0
        });
        // Find ancestor with overflow: hidden; and remove it
        ancestorsChanged = undefined;
        ancestor = placeholder[0].parentNode;
        var count = 0;
        while (ancestor !== null && !$(ancestor).is(document)) {
          var curr = $(ancestor);
          if (curr.css('overflow') === 'hidden') {
            curr.css('overflow', 'visible');
            if (ancestorsChanged === undefined) {
              ancestorsChanged = curr;
            }
            else {
              ancestorsChanged = ancestorsChanged.add(curr);
            }
          }
          ancestor = ancestor.parentNode;
        }
        // Set css on origin
        origin.css({position: 'absolute', 'z-index': 1000})
@@ -235,6 +252,9 @@
              origin.removeClass('active');
              doneAnimating = true;
              $(this).remove();
              // Remove overflow overrides on ancestors
              ancestorsChanged.css('overflow', '');
            }
          });
