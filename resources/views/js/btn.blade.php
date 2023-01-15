<script>
    $(document).ready(function() {

        const copyUrl = (url, elm) => {
            const copyTextInput = $("#myInput");
            copyTextInput.show();
            copyTextInput.val(url);
            copyTextInput.select();
            document.execCommand("copy");
            copyTextInput.hide();

            $("#url-show").html(url);

            $(elm).attr('data-original-title', 'Link is copied to clipboard').tooltip('show');

            $(elm).attr('data-original-title', 'Copy link to clipboard');
        }

        $('.copyToClipboard').click(function() {
            let text = '{{ route("noteWrite", $urlId) }}';
            copyUrl(text, this);
        });

        $('.copyViewLinkToClipboard').click(function() {
            let text = '{{ route("noteView", $urlId) }}';
            copyUrl(text, this);
        });

    });
</script>
