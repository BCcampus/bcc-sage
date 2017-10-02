<script type="text/javascript">
  $(document).ready(function () {
    // table of contents
    var tocPlaceholder = "<div class='flc-toc-tocContainer toc'> </div>";
    $('main').prepend(tocPlaceholder);

    fluid.uiOptions.prefsEditor(".flc-prefsEditor-separatedPanel", {
      tocTemplate: "/wp-content/themes/bcc-sage/lib/infusion/src/components/tableOfContents/html/TableOfContents.html",
      terms: {
        templatePrefix: "/wp-content/themes/bcc-sage/lib/infusion/src/framework/preferences/html",
        messagePrefix: "/wp-content/themes/bcc-sage/lib/infusion/src/framework/preferences/messages"
      }
    });
  })
</script>
