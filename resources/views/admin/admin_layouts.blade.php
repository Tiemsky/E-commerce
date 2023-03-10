b<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Twitter -->
<meta name="twitter:site" content="@themepixels">
<meta name="twitter:creator" content="@themepixels">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Starlight">
<meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
<meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

<!-- Facebook -->
<meta property="og:url" content="http://themepixels.me/starlight">
<meta property="og:title" content="Starlight">
<meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

<meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
<meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
<meta property="og:image:type" content="image/png">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="600">

<!-- Meta -->
<meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
<meta name="author" content="ThemePixels">

<title>Kaebor Boutique Administrateur</title>



<!-- vendor css -->
<script src="https://kit.fontawesome.com/3e1c5991fc.js" crossorigin="anonymous"></script>
<link href="{{ asset('frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css">
<link href=" {{asset('backend/lib/font-awesome/css/font-awesome.css')}} " rel="stylesheet">
<link href=" {{asset('backend/lib/Ionicons/css/ionicons.css')}} " rel="stylesheet">
<link href=" {{asset('backend/lib/perfect-scrollbar/css/perfect-scrollbar.css')}} " rel="stylesheet">
<link href=" {{asset('backend/lib/rickshaw/rickshaw.min.css')}} " rel="stylesheet">

<link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
{{-- Datatable CSS --}}
<link href="{{asset('backend/lib/highlightjs/github.css')}}" rel="stylesheet">
<link href="{{asset('backend/lib/datatables/jquery.dataTables.css')}}" rel="stylesheet">
<link href="{{asset('backend/lib/select2/css/select2.min.css')}}" rel="stylesheet">

<!-- Starlight CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
<link rel="stylesheet" href=" {{asset('backend/css/starlight.css')}} ">
<link href="{{asset('backend/lib/summernote/summernote-bs4.css')}}" rel="stylesheet">
</head>

<body>


    @guest


        @else

        <!-- ########## START: LEFT PANEL ########## -->
<div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i> Kaebor Boutique</a></div>
<div class="sl-sideleft">

    <div class="sl-sideleft-menu">
    <a href="{{ url('admin/home') }}" class="sl-menu-link active">
        <div class="sl-menu-item">
        <i class="fa fa-home fa-2x"></i>
        <span class="menu-item-label">Acceuil</span>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->


   
    <a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
        <i class="fas fa-th fa-lg"></i>
        <span class="menu-item-label">Cat??gorie</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('category.index') }}" class="nav-link">Cat??gorie</a></li>
        <li class="nav-item"><a href="{{route('sub.categories')}}" class="nav-link">Sous Cat??gorie</a></li>
        <li class="nav-item"><a href="{{route('brand.index')}}" class="nav-link">Marque</a></li>
    </ul>
    


    <a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
        <i class="fas fa-tags fa-lg"></i>
        <span class="menu-item-label">Coupons</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{route('admin.coupon')}}" class="nav-link">Coupon</a></li>
    </ul>
   



    <a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
        <i class="fa fa-product-hunt fa-lg"></i>
        <span class="menu-item-label">Produits</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('product.create') }}" class="nav-link">Ajouter un produit</a></li>
        <li class="nav-item"><a href="{{ route('product.index') }}" class="nav-link">Tous les produits</a></li>
    </ul>
 




    <a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
        <i class="fas fa-cart-plus fa-lg"></i>
        <span class="menu-item-label">Commandes</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('admin.neworder') }}" class="nav-link">Nouvelles commandes</a></li>
        <li class="nav-item"><a href="{{route('admin.accept.payment')}}" class="nav-link">Commandes accept??es</a></li>
        <li class="nav-item"><a href="{{route('admin.cancel.order')}}" class="nav-link">Commandes annul??es</a></li>
        <li class="nav-item"><a href="{{route('admin.process.payment')}}" class="nav-link">Processus de livraison</a></li>
        <li class="nav-item"><a href="{{route('admin.success.payment')}}" class="nav-link">Commandes livr??es</a></li>
    </ul>
  





    <a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
        <i class="fas fa-rss-square fa-lg"></i>
        <span class="menu-item-label">Blog</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('add.blog.categorylist') }}" class="nav-link">Cat??gorie Blog</a></li>
        <li class="nav-item"><a href=" {{ route('add.blogpost') }} " class="nav-link">Ajouter un Post</a></li>
        <li class="nav-item"><a href=" {{ route('all.blogpost') }} " class="nav-link">Liste des Post</a></li>
    </ul>
   





 
    <a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
            <i class="fas fa-user-plus fa-lg"></i>
        <span class="menu-item-label">Abonn??s</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{route('admin.newsletter')}}" class="nav-link">Bulletin d'informations</a></li>
        <li class="nav-item"><a href="{{route('admin.seo')}}" class="nav-link">Param??tres SEO</a></li>
    </ul>
   






    <a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
            <i class="fas fa-chart-bar fa-lg"></i>
        <span class="menu-item-label">Rapports</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href=" {{ route('today.order') }} " class="nav-link">Commande du jour</a></li>
        <li class="nav-item"><a href=" {{ route('today.delivery') }} " class="nav-link">Livraison du jour</a></li>
        <li class="nav-item"><a href=" {{ route('this.month') }} " class="nav-link">Livraisons Mensuelles</a></li>
        <li class="nav-item"><a href=" {{ route('search.report') }} " class="nav-link">Recherchez un Rapport</a></li>
    </ul>







    <a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
            <i class="fas fa-users-cog fa-lg"></i>
        <span class="menu-item-label">Utilisateur</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('create.admin') }}" class="nav-link">Cr??ez un utilisateur</a></li>
        <li class="nav-item"><a href="{{ route('admin.all.user') }}" class="nav-link">Liste des utilisateurs</a></li>
    </ul>
  




  
    <a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
        <i class="fa fa-truck fa-lg fa-flip-horizontal"></i>
        <span class="menu-item-label">Commandes retourn??es</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('admin.return.request') }}" class="nav-link">Demande de renvoi</a></li>
        <li class="nav-item"><a href="{{ route('admin.all.return') }}" class="nav-link">Liste des Requ??tes</a></li>
    </ul>
  


  
    <a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
        <i class="fa fa-archive fa-lg"></i>
        <span class="menu-item-label">Stock de produits</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('admin.product.stock') }}" class="nav-link">Stock</a></li>
    </ul>
 




    <a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
            <i class="fas fa-mail-bulk fa-lg"></i>
        <span class="menu-item-label">Messages</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('all.message') }}" class="nav-link">Liste des message</a></li>
    </ul>
 





    <a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
        <i class="fas fa-star-half-alt fa-lg"></i>
        <span class="menu-item-label">Avis sur les produits</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="#" class="nav-link">Nouveau commentaire</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Liste des commentaires</a></li>
    </ul>
  





    <a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
        <i class="fa fa-cogs fa-lg"></i>
        <span class="menu-item-label">Param??tres du site</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('admin.site.setting') }}" class="nav-link">Param??tres du site</a></li>
    </ul>
  


    </div><!-- sl-sideleft-menu -->

    <br>
</div><!-- sl-sideleft -->
<!-- ########## END: LEFT PANEL ########## -->

<!-- ########## START: HEAD PANEL ########## -->
<div class="sl-header">
    <div class="sl-header-left">
    <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
    <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
    </div><!-- sl-header-left -->
    <div class="sl-header-right">
    <nav class="nav">
        <div class="dropdown">
        <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
            <span class="logged-name">{{ Auth::user()->name }}</span>
            <img src=" {{asset('backend/img/black_man.jpg')}} " class="wd-32 rounded-circle" alt="">
        </a>
        <div class="dropdown-menu dropdown-menu-header wd-200">
            <ul class="list-unstyled user-profile-nav">
                <li><a href=""><i class="icon ion-ios-person-outline"></i> Modifier le profil</a></li>
                <li><a href="{{ route('admin.password.change') }}"><i class="icon ion-ios-gear-outline"></i> Param??tres</a></li>
                <li><button type="button" onclick="document.getElementById('logOutForm').submit();"><i class="icon ion-power"></i> Se d??connecter</button></li>
            </ul
        </div><!-- dropdown-menu -->
        </div><!-- dropdown -->
    </nav> 
    <form id="logOutForm" class="d-none" action="{{ route('logout') }} " method="post">@csrf</form>



    <div class="navicon-right">
        <a id="btnRightMenu" href="" class="pos-relative">
        <i class="icon ion-ios-bell-outline"></i>
        <!-- start: if statement -->
        <span class="square-8 bg-danger"></span>
        <!-- end: if statement -->
        </a>
    </div><!-- navicon-right -->
    </div><!-- sl-header-right -->
</div><!-- sl-header -->
<!-- ########## END: HEAD PANEL ########## -->

<!-- ########## START: RIGHT PANEL ########## -->
<div class="sl-sideright">
    <ul class="nav nav-tabs nav-fill sidebar-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" role="tab" href="#messages">Messages (2)</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" role="tab" href="#notifications">Notifications (8)</a>
    </li>
    </ul><!-- sidebar-tabs -->

    <!-- Tab panes -->
    <div class="tab-content">
    <div class="tab-pane pos-absolute a-0 mg-t-60 active" id="messages" role="tabpanel">
        <div class="media-list">
        <!-- loop starts here -->
        <a href="" class="media-list-link">
            <div class="media">
            <img src="../img/img3.jpg" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
                <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
                <span class="d-block tx-11 tx-gray-500">2 minutes ago</span>
                <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
            </div>
            </div><!-- media -->
        </a>
        <!-- loop ends here -->
        <a href="" class="media-list-link">
            <div class="media">
            <img src="../img/img4.jpg" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
                <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Samantha Francis</p>
                <span class="d-block tx-11 tx-gray-500">3 hours ago</span>
                <p class="tx-13 mg-t-10 mg-b-0">My entire soul, like these sweet mornings of spring.</p>
            </div>
            </div><!-- media -->
        </a>
        <a href="" class="media-list-link">
            <div class="media">
            <img src="../img/img7.jpg" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
                <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Robert Walker</p>
                <span class="d-block tx-11 tx-gray-500">5 hours ago</span>
                <p class="tx-13 mg-t-10 mg-b-0">I should be incapable of drawing a single stroke at the present moment...</p>
            </div>
            </div><!-- media -->
        </a>
        <a href="" class="media-list-link">
            <div class="media">
            <img src="../img/img5.jpg" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
                <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Larry Smith</p>
                <span class="d-block tx-11 tx-gray-500">Yesterday, 8:34pm</span>

                <p class="tx-13 mg-t-10 mg-b-0">When, while the lovely valley teems with vapour around me, and the meridian sun strikes...</p>
            </div>
            </div><!-- media -->
        </a>
        <a href="" class="media-list-link">
            <div class="media">
            <img src="../img/img3.jpg" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
                <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
                <span class="d-block tx-11 tx-gray-500">Jan 23, 2:32am</span>
                <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
            </div>
            </div><!-- media -->
        </a>
        </div><!-- media-list -->
        <div class="pd-15">
        <a href="" class="btn btn-secondary btn-block bd-0 rounded-0 tx-10 tx-uppercase tx-mont tx-medium tx-spacing-2">View More Messages</a>
        </div>
    </div><!-- #messages -->

    <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="notifications" role="tabpanel">
        <div class="media-list">
        <!-- loop starts here -->
        <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
            <img src="../img/img8.jpg" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                <span class="tx-12">October 03, 2017 8:45am</span>
            </div>
            </div><!-- media -->
        </a>
        <!-- loop ends here -->
        <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
            <img src="../img/img9.jpg" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Social Network</strong></p>
                <span class="tx-12">October 02, 2017 12:44am</span>
            </div>
            </div><!-- media -->
        </a>
        <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
            <img src="../img/img10.jpg" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
                <p class="tx-13 mg-b-0 tx-gray-700">20+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
                <span class="tx-12">October 01, 2017 10:20pm</span>
            </div>
            </div><!-- media -->
        </a>
        <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
            <img src="../img/img5.jpg" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                <span class="tx-12">October 01, 2017 6:08pm</span>
            </div>
            </div><!-- media -->
        </a>
        <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
            <img src="../img/img8.jpg" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 12 others in a post.</p>
                <span class="tx-12">September 27, 2017 6:45am</span>
            </div>
            </div><!-- media -->
        </a>
        <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
            <img src="../img/img10.jpg" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
                <p class="tx-13 mg-b-0 tx-gray-700">10+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
                <span class="tx-12">September 28, 2017 11:30pm</span>
            </div>
            </div><!-- media -->
        </a>
        <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
            <img src="../img/img9.jpg" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Great Pyramid</strong></p>
                <span class="tx-12">September 26, 2017 11:01am</span>
            </div>
            </div><!-- media -->
        </a>
        <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
            <img src="../img/img5.jpg" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                <span class="tx-12">September 23, 2017 9:19pm</span>
            </div>
            </div><!-- media -->
        </a>
        </div><!-- media-list -->
    </div><!-- #notifications -->

    </div><!-- tab-content -->
</div><!-- sl-sideright -->
<!-- ########## END: RIGHT PANEL ########## --->

    @endguest

    @yield('admin_content')


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
<script src=" {{asset('backend/lib/jquery/jquery.js')}} "></script>
<script src=" {{asset('backend/lib/popper.js/popper.js')}} "></script>
<script src=" {{asset('backend/lib/bootstrap/bootstrap.js')}} "></script>
<script src=" {{asset('backend/lib/jquery-ui/jquery-ui.js')}} "></script>
<script src=" {{asset('backend/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}} "></script>

<script src="{{asset('backend/lib/highlightjs/highlight.pack.js')}}"></script>
<script src="{{asset('backend/lib/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('backend/lib/datatables-responsive/dataTables.responsive.js')}}"></script>
<script src="{{asset('backend/lib/select2/js/select2.min.js')}}"></script>


<script>
$(function(){
    'use strict';

    $('#datatable1').DataTable({
    responsive: true,
    language: {
        searchPlaceholder: 'Recherchez...',
        sSearch: '',
        lengthMenu: '_MENU_ articles/page',
    }
    });

    $('#datatable2').DataTable({
    bLengthChange: false,
    searching: false,
    responsive: true
    });

    // Select2
    $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

});
</script>

<script src=" {{asset('backend/lib/jquery.sparkline.bower/jquery.sparkline.min.js')}} "></script>
<script src=" {{asset('backend/lib/d3/d3.js')}} "></script>
<script src=" {{asset('backend/lib/rickshaw/rickshaw.min.js')}} "></script>
<script src=" {{asset('backend/lib/chart.js/Chart.js')}} "></script>
<script src=" {{asset('backend/lib/Flot/jquery.flot.js')}} "></script>
<script src=" {{asset('backend/lib/Flot/jquery.flot.pie.js')}} "></script>
<script src=" {{asset('backend/lib/Flot/jquery.flot.resize.js')}} "></script>
<script src=" {{asset('backend/lib/flot-spline/jquery.flot.spline.js')}} "></script>

    <script src="{{asset('backend/lib/medium-editor/medium-editor.js')}}"></script>
    <script src="{{asset('backend/lib/summernote/summernote-bs4.min.js')}}"></script>

    <script>
        $(function(){
        'use strict';

        // Inline editor
        var editor = new MediumEditor('.editable');

        // Summernote editor
        $('#summernote').summernote({
            height: 150,
            tooltip: false
        })
        });
    </script>

<script>
    $(function(){
    'use strict';

    // Inline editor
    var editor = new MediumEditor('.editable');

    // Summernote editor
    $('#summernote1').summernote({
        height: 150,
        tooltip: false
    })
    });
</script>

<script src=" {{asset('backend/js/starlight.js')}} "></script>
<script src=" {{asset('backend/js/ResizeSensor.js')}} "></script>
<script src=" {{asset('backend/js/dashboard.js')}} "></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
<script>
@if(Session::has('messege'))
    var type="{{Session::get('alert-type','info')}}"
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('messege') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('messege') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('messege') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('messege') }}");
            break;
    }
@endif
</script>  

<script>  
    $(document).on("click", "#delete", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        swal({
            title: "Etes-vous s??r ?",
            text: "Une fois effac??, vous ne pourrez pas r??cup??rer les donn??es",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location.href = link;
            } else {
            swal("Donn??e s??curis??e!");
            }
        });
    });
</script>

<script>  
    $(document).on("click", "#dlte", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        swal({
            title: "Etes-vous s??r ?",
            text: "Une fois effac??, vous ne pourrez pas r??cup??rer les donn??es",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location.href = link;
            } else {
            swal("Donn??e s??curis??e!");
            }
        });
    });
</script>

</body>
</html>
