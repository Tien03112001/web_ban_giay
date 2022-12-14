<footer class="ftco-footer">
    <div class="container">
        <div class="row mb-5">
            <div class="col-sm-12 col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2 logo"><a href="#">39Tominay <span>Store</span></a></h2>
                    <p>Far far away, behind the word mountains, far from the countries.</p>
                    <ul class="ftco-footer-social list-unstyled mt-2">
                        <li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md">
                <div class="ftco-footer-widget mb-4 ml-md-4">
                    <h2 class="ftco-heading-2">My Accounts</h2>
                    <ul class="list-unstyled">
                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>My Account</a></li>
                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Register</a></li>
                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Log In</a></li>
                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>My Order</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md">
                <div class="ftco-footer-widget mb-4 ml-md-4">
                    <h2 class="ftco-heading-2">Information</h2>
                    <ul class="list-unstyled">
                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>About us</a></li>
                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Catalog</a></li>
                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Contact us</a></li>
                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Term &amp; Conditions</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Quick Link</h2>
                    <ul class="list-unstyled">
                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>New User</a></li>
                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Help Center</a></li>
                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Report Spam</a></li>
                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Faq's</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon fa fa-map marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                            <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                            <li><a href="#"><span class="icon fa fa-paper-plane pr-4"></span><span class="text">info@yourdomain.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid px-0 py-5 bg-black">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <p class="mb-0" style="color: rgba(255,255,255,.5);">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="fa fa-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg></div>


<script src="/bootstrapUser/js/jquery.min.js"></script>
<script src="/bootstrapUser/js/jquery-migrate-3.0.1.min.js"></script>
<script src="/bootstrapUser/js/popper.min.js"></script>
<script src="/bootstrapUser/js/bootstrap.min.js"></script>
<script src="/bootstrapUser/js/jquery.easing.1.3.js"></script>
<script src="/bootstrapUser/js/jquery.waypoints.min.js"></script>
<script src="/bootstrapUser/js/jquery.stellar.min.js"></script>
<script src="/bootstrapUser/js/owl.carousel.min.js"></script>
<script src="/bootstrapUser/js/jquery.magnific-popup.min.js"></script>
<script src="/bootstrapUser/js/jquery.animateNumber.min.js"></script>
<script src="/bootstrapUser/js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="/bootstrapUser/js/google-map.js"></script>
<script src="/bootstrapUser/js/main.js"></script>
<script src="/public/js/main.js"></script>


<script>
    $(document).ready(function() {

        var quantitiy = 0;
        $('.quantity-right-plus').click(function(e) {

            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined

            $('#quantity').val(quantity + 1);


            // Increment

        });

        $('.quantity-left-minus').click(function(e) {
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined

            // Increment
            if (quantity > 0) {
                $('#quantity').val(quantity - 1);
            }
        });

    });
</script>

<script>
    $('#btn-comment').click(
        function(ev) {
            let content = $('#comment').val();
            let product_id = $('#product_id').val();
            $.ajax({
                url: '/comment',
                type: "POST",
                data: {
                    content: content,
                    _token: '{{csrf_token()}}',
                    product_id: product_id,
                },
                success: function(data) {
                    var comment = data.res;
                    var divComment = document.getElementById('comment-child');
                    divComment.innerHTML = `
        <div class="vcard bio">
            <img width="20%" src="/bootstrapUser/images/person_1.jpg" alt="Image placeholder">
        </div>
        <div class="comment-body">
            <h3>${comment.name}</h3>
            <div class="meta">${comment.content}</div>
            <p>${comment.updated}</p>
        </div>`;
                    document.getElementById('comment').value = '';
                }
            })
        })
</script>
<script type="text/javascript">
    $('.price_sidebar').click(
        function() {

            var href = $(this).attr('href');
            let menu_id = $('#menu_id').val();
            if (href == '#op1') {
                value = 1;
            } else if (href == '#op2') {
                value = 2;
            } else if (href == '#op3') {
                value = 3;
            } else
                value = 4;
            $.ajax({

                url: "{{url('/filter_price_product')}}",
                method: 'POST',
                data: {
                    value: value,
                    menu_id: menu_id,
                    _token: '{{csrf_token()}}',

                },
                success: function(data) {
                    var html = '';
                    for (var i = 0; i < data.res.length; i++) {

                        value = `<div class="col-md-4 d-flex">
                        <div class="product ftco-animate" style="opacity:1 !important;visibility: visible !important;">
                            <div class="img d-flex align-items-center justify-content-center" style="background-image: url(/storage/${data.res[i].photograph});">
                                <div class="desc">
                                    <p class="meta-prod d-flex">
                                        <a href="/product/${data.res[i].id}" class="d-flex align-items-center justify-content-center"><span class="flaticon-shopping-bag"></span></a>

                                        <a href="/product/${data.res[i].id}" class="d-flex align-items-center justify-content-center"><span class="flaticon-visibility"></span></a>
                                    </p>
                                </div>
                            </div>
                            <div class="text text-center">
                                <span class="sale">Sale</span>
                                <span class="category">${data.res[i].name}</span>
                                <h2>${data.res[i].name}</h2>
                                <p class="mb-0"><span class="price">${data.res[i].price}</span></p>
                            </div>
                        </div>
                    </div>`;
                        html = html + value;
                    }
                    document.getElementById("product_list").classList.add("display-fl");
                    $('#product-filter').html(html);

                }
            });
        })
</script>