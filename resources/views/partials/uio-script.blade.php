<script type="text/javascript">
  $(document).ready(function () {
    // table of contents
    var tocPlaceholder = "<div class='flc-toc-tocContainer toc'> </div>";
    $('main').prepend(tocPlaceholder);

    fluid.uiOptions.prefsEditor(".flc-prefsEditor-separatedPanel", {
      tocTemplate: phpData.pluginUrl + "/lib/infusion/src/components/tableOfContents/html/TableOfContents.html",
      terms: {
        templatePrefix: phpData.pluginUrl + "/lib/infusion/src/framework/preferences/html",
        messagePrefix: phpData.pluginUrl + "/lib/infusion/src/framework/preferences/messages"
      }
    });
  })
</script>
