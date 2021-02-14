<div class="share-social-menu my-5 text-center">
    <h5 class="mainColor">{{__("نشر الحالة عبر السوشال ميديا")}}</h5>
    <ul class="justify-content-center pt-2" >
        <li><a href="{{\App\Http\Controllers\HelperController::build_share_link($show, $layout, 'whatsapp' , Request::url())}}" title="{{__("واتساب")}}" target="_blank"><i class="fa fa-whatsapp" style="color:inherit;"></i></a></li>
        <li><a href="{{\App\Http\Controllers\HelperController::build_share_link($show , $layout, 'twitter' , Request::url())}}" title="{{__("تويتر")}}" target="_blank"><i class="fa fa-twitter" style="color:inherit;"></i></a></li>
        <li><a href="https://www.facebook.com/sharer.php?u={{Request::url()}}" title="{{__("فيسبوك")}}"><i class="fa fa-facebook" style="color:inherit;" target="_blank"></i></a></li>
        <li><a href="{{\App\Http\Controllers\HelperController::build_share_link($show , $layout, 'telegram' , Request::url())}}" title="{{__("تيلجرام")}}" target="_blank"><i class="fab fa-telegram-plane" style="color:inherit;"></i></a></li>
        <!--li><div id="aaa"  onclick="copyTextToClipboard('{Request::url()}}')"  title="{__("نسخ الرابط")}}"><i class="fa fa-link" style="color:inherit;"></i></div></li-->

    </ul>
</div>

<script>
    function copyTextToClipboard(text) {
        if (!navigator.clipboard) {
            fallbackCopyTextToClipboard(text);
            return;
        }
        navigator.clipboard.writeText(text)
        alert("Copied the url: " + text);
    }

    function fallbackCopyTextToClipboard(text) {
        var textArea = document.createElement("textarea");
        textArea.value = text;

        // Avoid scrolling to bottom
        textArea.style.top = "0";
        textArea.style.left = "0";
        textArea.style.position = "fixed";

        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();

        try {
            var successful = document.execCommand('copy');
            var msg = successful ? 'successful' : 'unsuccessful';
            console.log('Fallback: Copying text command was ' + msg);
        } catch (err) {
            console.error('Fallback: Oops, unable to copy', err);
        }

        document.body.removeChild(textArea);
    }

</script>
