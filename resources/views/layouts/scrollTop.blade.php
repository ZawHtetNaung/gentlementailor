<!-- no longer use  -->
<button onclick="topFunction()" id="scrollBtn" title="Go to top" class="center-flex">
    <i class="fa-solid fa-arrow-up-long"></i>
</button>

@section('js')
    <script type="text/javascript">
        // scroll function
        let scrollBtn = document.getElementById("scrollBtn");
        window.onscroll = function () {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                scrollBtn.style.display = "block";
                scrollBtn.style.opacity = "1";
                // scrollBtn.style.transform = "scale(1)";
            } else {
                scrollBtn.style.display = "none";
                scrollBtn.style.opacity = "0";
                // scrollBtn.style.transform = "scale(1)";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }

        // end scroll function
    </script>
@endsection
