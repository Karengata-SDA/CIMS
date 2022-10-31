<?php
include 'header.php';
?>

<body>
    <!--Preloader-->
    <!--div class="preloader-it">
            <div class="la-anim-1"></div>
    </div-->
    <!--/Preloader-->
    <div class="wrapper  theme-5-active pimary-color-green">
        <!-- Top Menu Items -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="mobile-only-brand pull-left">
                <div class="nav-header pull-left">
                    <div class="logo-wrap">
                        <a href="index.html">
                            <img class="brand-img" src="img/logo.png" alt="brand"/>
                            <span class="brand-text">CIMS</span>
                        </a>
                    </div>
                </div>	
                <a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
                <a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
                <a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
                <form id="search_form" role="search" class="top-nav-search collapse pull-left">
                    <div class="input-group">
                        <input type="text" name="example-input1-group2" class="form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button type="button" class="btn  btn-default"  data-target="#search_form" data-toggle="collapse" aria-label="Close" aria-expanded="true"><i class="zmdi zmdi-search"></i></button>
                        </span>
                    </div>
                </form>
            </div>
            <div id="mobile_only_nav" class="mobile-only-nav pull-right">
                <ul class="nav navbar-right top-nav pull-right">
                    <li>
                        <a id="open_right_sidebar" href="#"><i class="zmdi zmdi-settings top-nav-icon"></i></a>
                    </li>
                    <li class="dropdown app-drp">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="zmdi zmdi-apps top-nav-icon"></i></a>
                        <ul class="dropdown-menu app-dropdown" data-dropdown-in="slideInRight" data-dropdown-out="flipOutX">
                            <li>
                                <div class="app-nicescroll-bar">
                                    <ul class="app-icon-wrap pa-10">
                                        <li>
                                            <a href="weather.html" class="connection-item">
                                                <i class="zmdi zmdi-cloud-outline txt-info"></i>
                                                <span class="block">weather</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="inbox.html" class="connection-item">
                                                <i class="zmdi zmdi-email-open txt-success"></i>
                                                <span class="block">e-mail</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="calendar.html" class="connection-item">
                                                <i class="zmdi zmdi-calendar-check txt-primary"></i>
                                                <span class="block">calendar</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="vector-map.html" class="connection-item">
                                                <i class="zmdi zmdi-map txt-danger"></i>
                                                <span class="block">map</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="chats.html" class="connection-item">
                                                <i class="zmdi zmdi-comment-outline txt-warning"></i>
                                                <span class="block">chat</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="contact-card.html" class="connection-item">
                                                <i class="zmdi zmdi-assignment-account"></i>
                                                <span class="block">contact</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>	
                            </li>
                            <li>
                                <div class="app-box-bottom-wrap">
                                    <hr class="light-grey-hr ma-0"/>
                                    <a class="block text-center read-all" href="javascript:void(0)"> more </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown full-width-drp">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="zmdi zmdi-more-vert top-nav-icon"></i></a>
                        <ul class="dropdown-menu mega-menu pa-0" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <li class="product-nicescroll-bar row">
                                <ul class="pa-20">
                                    <li class="col-md-3 col-xs-6 col-menu-list">
                                        <a href="javascript:void(0);"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                                        <hr class="light-grey-hr ma-0"/>
                                        <ul>
                                            <li>
                                                <a href="index.html">Analytical</a>
                                            </li>
                                            <li>
                                                <a href="index2.html">Demographic</a>
                                            </li>
                                            <li>
                                                <a href="index3.html">Project</a>
                                            </li>
                                            <li>
                                                <a href="index4.html">Hospital</a>
                                            </li>
                                            <li>
                                                <a href="index5.html">HRM</a>
                                            </li>
                                            <li>
                                                <a href="index6.html">Real Estate</a>
                                            </li>
                                            <li>
                                                <a href="profile.html">profile</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="col-md-3 col-xs-6 col-menu-list">
                                        <a href="javascript:void(0);">
                                            <div class="pull-left">
                                                <i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">E-Commerce</span>
                                            </div>	
                                            <div class="pull-right"><span class="label label-success">hot</span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </a>
                                        <hr class="light-grey-hr ma-0"/>
                                        <ul>
                                            <li>
                                                <a href="e-commerce.html">Dashboard</a>
                                            </li>
                                            <li>
                                                <a href="product.html">Products</a>
                                            </li>
                                            <li>
                                                <a href="product-detail.html">Product Detail</a>
                                            </li>
                                            <li>
                                                <a href="add-products.html">Add Product</a>
                                            </li>
                                            <li>
                                                <a href="product-orders.html">Orders</a>
                                            </li>
                                            <li>
                                                <a href="product-cart.html">Cart</a>
                                            </li>
                                            <li>
                                                <a href="product-checkout.html">Checkout</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="col-md-6 col-xs-12 preview-carousel">
                                        <a href="javascript:void(0);"><div class="pull-left"><span class="right-nav-text">latest products</span></div><div class="clearfix"></div></a>
                                        <hr class="light-grey-hr ma-0"/>
                                        <div class="product-carousel owl-carousel owl-theme text-center">
                                            <a href="#">
                                                <img src="img/chair.jpg" alt="chair">
                                                <span>Circle chair</span>
                                            </a>
                                            <a href="#">
                                                <img src="img/chair2.jpg" alt="chair">
                                                <span>square chair</span>
                                            </a>
                                            <a href="#">
                                                <img src="img/chair3.jpg" alt="chair">
                                                <span>semi circle chair</span>
                                            </a>
                                            <a href="#">
                                                <img src="img/chair4.jpg" alt="chair">
                                                <span>wooden chair</span>
                                            </a>
                                            <a href="#">
                                                <img src="img/chair2.jpg" alt="chair">
                                                <span>square chair</span>
                                            </a>								
                                        </div>
                                    </li>
                                </ul>
                            </li>	
                        </ul>
                    </li>
                    <li class="dropdown alert-drp">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="zmdi zmdi-notifications top-nav-icon"></i><span class="top-nav-icon-badge">5</span></a>
                        <ul  class="dropdown-menu alert-dropdown" data-dropdown-in="bounceIn" data-dropdown-out="bounceOut">
                            <li>
                                <div class="notification-box-head-wrap">
                                    <span class="notification-box-head pull-left inline-block">notifications</span>
                                    <a class="txt-danger pull-right clear-notifications inline-block" href="javascript:void(0)"> clear all </a>
                                    <div class="clearfix"></div>
                                    <hr class="light-grey-hr ma-0"/>
                                </div>
                            </li>
                            <li>
                                <div class="streamline message-nicescroll-bar">
                                    <div class="sl-item">
                                        <a href="javascript:void(0)">
                                            <div class="icon bg-green">
                                                <i class="zmdi zmdi-flag"></i>
                                            </div>
                                            <div class="sl-content">
                                                <span class="inline-block capitalize-font  pull-left truncate head-notifications">
                                                    New subscription created</span>
                                                <span class="inline-block font-11  pull-right notifications-time">2pm</span>
                                                <div class="clearfix"></div>
                                                <p class="truncate">Your customer subscribed for the basic plan. The customer will pay $25 per month.</p>
                                            </div>
                                        </a>	
                                    </div>
                                    <hr class="light-grey-hr ma-0"/>
                                    <div class="sl-item">
                                        <a href="javascript:void(0)">
                                            <div class="icon bg-yellow">
                                                <i class="zmdi zmdi-trending-down"></i>
                                            </div>
                                            <div class="sl-content">
                                                <span class="inline-block capitalize-font  pull-left truncate head-notifications txt-warning">Server #2 not responding</span>
                                                <span class="inline-block font-11 pull-right notifications-time">1pm</span>
                                                <div class="clearfix"></div>
                                                <p class="truncate">Some technical error occurred needs to be resolved.</p>
                                            </div>
                                        </a>	
                                    </div>
                                    <hr class="light-grey-hr ma-0"/>
                                    <div class="sl-item">
                                        <a href="javascript:void(0)">
                                            <div class="icon bg-blue">
                                                <i class="zmdi zmdi-email"></i>
                                            </div>
                                            <div class="sl-content">
                                                <span class="inline-block capitalize-font  pull-left truncate head-notifications">2 new messages</span>
                                                <span class="inline-block font-11  pull-right notifications-time">4pm</span>
                                                <div class="clearfix"></div>
                                                <p class="truncate"> The last payment for your G Suite Basic subscription failed.</p>
                                            </div>
                                        </a>	
                                    </div>
                                    <hr class="light-grey-hr ma-0"/>
                                    <div class="sl-item">
                                        <a href="javascript:void(0)">
                                            <div class="sl-avatar">
                                                <img class="img-responsive" src="img/avatar.jpg" alt="avatar"/>
                                            </div>
                                            <div class="sl-content">
                                                <span class="inline-block capitalize-font  pull-left truncate head-notifications">Sandy Doe</span>
                                                <span class="inline-block font-11  pull-right notifications-time">1pm</span>
                                                <div class="clearfix"></div>
                                                <p class="truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
                                            </div>
                                        </a>	
                                    </div>
                                    <hr class="light-grey-hr ma-0"/>
                                    <div class="sl-item">
                                        <a href="javascript:void(0)">
                                            <div class="icon bg-red">
                                                <i class="zmdi zmdi-storage"></i>
                                            </div>
                                            <div class="sl-content">
                                                <span class="inline-block capitalize-font  pull-left truncate head-notifications txt-danger">99% server space occupied.</span>
                                                <span class="inline-block font-11  pull-right notifications-time">1pm</span>
                                                <div class="clearfix"></div>
                                                <p class="truncate">consectetur, adipisci velit.</p>
                                            </div>
                                        </a>	
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="notification-box-bottom-wrap">
                                    <hr class="light-grey-hr ma-0"/>
                                    <a class="block text-center read-all" href="javascript:void(0)"> read all </a>
                                    <div class="clearfix"></div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown auth-drp">
                        <a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="img/user1.png" alt="user_auth" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
                        <ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                            <li>
                                <a href="profile.html"><i class="zmdi zmdi-account"></i><span>Profile</span></a>
                            </li>
                            <li>
                                <a href="#"><i class="zmdi zmdi-card"></i><span>my balance</span></a>
                            </li>
                            <li>
                                <a href="inbox.html"><i class="zmdi zmdi-email"></i><span>Inbox</span></a>
                            </li>
                            <li>
                                <a href="#"><i class="zmdi zmdi-settings"></i><span>Settings</span></a>
                            </li>
                            <li class="divider"></li>
                            <li class="sub-menu show-on-hover">
                                <a href="#" class="dropdown-toggle pr-0 level-2-drp"><i class="zmdi zmdi-check text-success"></i> available</a>
                                <ul class="dropdown-menu open-left-side">
                                    <li>
                                        <a href="#"><i class="zmdi zmdi-check text-success"></i><span>available</span></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="zmdi zmdi-circle-o text-warning"></i><span>busy</span></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="zmdi zmdi-minus-circle-outline text-danger"></i><span>offline</span></a>
                                    </li>
                                </ul>	
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>	
        </nav>
        <!-- /Top Menu Items -->


        <?php include 'leftsidebarmenu.php'; ?>

        <!-- Right Sidebar Menu -->
        <div class="fixed-sidebar-right">
            <ul class="right-sidebar">
                <li>
                    <div  class="tab-struct custom-tab-1">
                        <ul role="tablist" class="nav nav-tabs" id="right_sidebar_tab">
                            <li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="chat_tab_btn" href="#chat_tab">chat</a></li>
                            <li role="presentation" class=""><a  data-toggle="tab" id="messages_tab_btn" role="tab" href="#messages_tab" aria-expanded="false">messages</a></li>
                            <li role="presentation" class=""><a  data-toggle="tab" id="todo_tab_btn" role="tab" href="#todo_tab" aria-expanded="false">todo</a></li>
                        </ul>
                        <div class="tab-content" id="right_sidebar_content">
                            <div  id="chat_tab" class="tab-pane fade active in" role="tabpanel">
                                <div class="chat-cmplt-wrap">
                                    <div class="chat-box-wrap">
                                        <div class="add-friend">
                                            <a href="javascript:void(0)" class="inline-block txt-grey">
                                                <i class="zmdi zmdi-more"></i>
                                            </a>	
                                            <span class="inline-block txt-dark">users</span>
                                            <a href="javascript:void(0)" class="inline-block text-right txt-grey"><i class="zmdi zmdi-plus"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                        <form role="search" class="chat-search pl-15 pr-15 pb-15">
                                            <div class="input-group">
                                                <input type="text" id="example-input1-group2" name="example-input1-group2" class="form-control" placeholder="Search">
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn  btn-default"><i class="zmdi zmdi-search"></i></button>
                                                </span>
                                            </div>
                                        </form>
                                        <div id="chat_list_scroll">
                                            <div class="nicescroll-bar">
                                                <ul class="chat-list-wrap">
                                                    <li class="chat-list">
                                                        <div class="chat-body">
                                                            <a href="javascript:void(0)">
                                                                <div class="chat-data">
                                                                    <img class="user-img img-circle"  src="img/user.png" alt="user"/>
                                                                    <div class="user-data">
                                                                        <span class="name block capitalize-font">Clay Masse</span>
                                                                        <span class="time block truncate txt-grey">No one saves us but ourselves.</span>
                                                                    </div>
                                                                    <div class="status away"></div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </a>
                                                            <a href="javascript:void(0)">
                                                                <div class="chat-data">
                                                                    <img class="user-img img-circle"  src="img/user1.png" alt="user"/>
                                                                    <div class="user-data">
                                                                        <span class="name block capitalize-font">Evie Ono</span>
                                                                        <span class="time block truncate txt-grey">Unity is strength</span>
                                                                    </div>
                                                                    <div class="status offline"></div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </a>
                                                            <a href="javascript:void(0)">
                                                                <div class="chat-data">
                                                                    <img class="user-img img-circle"  src="img/user2.png" alt="user"/>
                                                                    <div class="user-data">
                                                                        <span class="name block capitalize-font">Madalyn Rascon</span>
                                                                        <span class="time block truncate txt-grey">Respect yourself if you would have others respect you.</span>
                                                                    </div>
                                                                    <div class="status online"></div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </a>
                                                            <a href="javascript:void(0)">
                                                                <div class="chat-data">
                                                                    <img class="user-img img-circle"  src="img/user3.png" alt="user"/>
                                                                    <div class="user-data">
                                                                        <span class="name block capitalize-font">Mitsuko Heid</span>
                                                                        <span class="time block truncate txt-grey">I’m thankful.</span>
                                                                    </div>
                                                                    <div class="status online"></div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </a>
                                                            <a href="javascript:void(0)">
                                                                <div class="chat-data">
                                                                    <img class="user-img img-circle"  src="img/user.png" alt="user"/>
                                                                    <div class="user-data">
                                                                        <span class="name block capitalize-font">Ezequiel Merideth</span>
                                                                        <span class="time block truncate txt-grey">Patience is bitter.</span>
                                                                    </div>
                                                                    <div class="status offline"></div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </a>
                                                            <a href="javascript:void(0)">
                                                                <div class="chat-data">
                                                                    <img class="user-img img-circle"  src="img/user1.png" alt="user"/>
                                                                    <div class="user-data">
                                                                        <span class="name block capitalize-font">Jonnie Metoyer</span>
                                                                        <span class="time block truncate txt-grey">Genius is eternal patience.</span>
                                                                    </div>
                                                                    <div class="status online"></div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </a>
                                                            <a href="javascript:void(0)">
                                                                <div class="chat-data">
                                                                    <img class="user-img img-circle"  src="img/user2.png" alt="user"/>
                                                                    <div class="user-data">
                                                                        <span class="name block capitalize-font">Angelic Lauver</span>
                                                                        <span class="time block truncate txt-grey">Every burden is a blessing.</span>
                                                                    </div>
                                                                    <div class="status away"></div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </a>
                                                            <a href="javascript:void(0)">
                                                                <div class="chat-data">
                                                                    <img class="user-img img-circle"  src="img/user3.png" alt="user"/>
                                                                    <div class="user-data">
                                                                        <span class="name block capitalize-font">Priscila Shy</span>
                                                                        <span class="time block truncate txt-grey">Wise to resolve, and patient to perform.</span>
                                                                    </div>
                                                                    <div class="status online"></div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </a>
                                                            <a href="javascript:void(0)">
                                                                <div class="chat-data">
                                                                    <img class="user-img img-circle"  src="img/user4.png" alt="user"/>
                                                                    <div class="user-data">
                                                                        <span class="name block capitalize-font">Linda Stack</span>
                                                                        <span class="time block truncate txt-grey">Our patience will achieve more than our force.</span>
                                                                    </div>
                                                                    <div class="status away"></div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="recent-chat-box-wrap">
                                        <div class="recent-chat-wrap">
                                            <div class="panel-heading ma-0">
                                                <div class="goto-back">
                                                    <a  id="goto_back" href="javascript:void(0)" class="inline-block txt-grey">
                                                        <i class="zmdi zmdi-chevron-left"></i>
                                                    </a>	
                                                    <span class="inline-block txt-dark">ryan</span>
                                                    <a href="javascript:void(0)" class="inline-block text-right txt-grey"><i class="zmdi zmdi-more"></i></a>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                            <div class="panel-wrapper collapse in">
                                                <div class="panel-body pa-0">
                                                    <div class="chat-content">
                                                        <ul class="nicescroll-bar pt-20">
                                                            <li class="friend">
                                                                <div class="friend-msg-wrap">
                                                                    <img class="user-img img-circle block pull-left"  src="img/user.png" alt="user"/>
                                                                    <div class="msg pull-left">
                                                                        <p>Hello Jason, how are you, it's been a long time since we last met?</p>
                                                                        <div class="msg-per-detail text-right">
                                                                            <span class="msg-time txt-grey">2:30 PM</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>	
                                                            </li>
                                                            <li class="self mb-10">
                                                                <div class="self-msg-wrap">
                                                                    <div class="msg block pull-right"> Oh, hi Sarah I'm have got a new job now and is going great.
                                                                        <div class="msg-per-detail text-right">
                                                                            <span class="msg-time txt-grey">2:31 pm</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>	
                                                            </li>
                                                            <li class="self">
                                                                <div class="self-msg-wrap">
                                                                    <div class="msg block pull-right">  How about you?
                                                                        <div class="msg-per-detail text-right">
                                                                            <span class="msg-time txt-grey">2:31 pm</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>	
                                                            </li>
                                                            <li class="friend">
                                                                <div class="friend-msg-wrap">
                                                                    <img class="user-img img-circle block pull-left"  src="img/user.png" alt="user"/>
                                                                    <div class="msg pull-left"> 
                                                                        <p>Not too bad.</p>
                                                                        <div class="msg-per-detail  text-right">
                                                                            <span class="msg-time txt-grey">2:35 pm</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>	
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="input-group">
                                                        <input type="text" id="input_msg_send" name="send-msg" class="input-msg-send form-control" placeholder="Type something">
                                                        <div class="input-group-btn emojis">
                                                            <div class="dropup">
                                                                <button type="button" class="btn  btn-default  dropdown-toggle" data-toggle="dropdown" ><i class="zmdi zmdi-mood"></i></button>
                                                                <ul class="dropdown-menu dropdown-menu-right">
                                                                    <li><a href="javascript:void(0)">Action</a></li>
                                                                    <li><a href="javascript:void(0)">Another action</a></li>
                                                                    <li class="divider"></li>
                                                                    <li><a href="javascript:void(0)">Separated link</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="input-group-btn attachment">
                                                            <div class="fileupload btn  btn-default"><i class="zmdi zmdi-attachment-alt"></i>
                                                                <input type="file" class="upload">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="messages_tab" class="tab-pane fade" role="tabpanel">
                                <div class="message-box-wrap">
                                    <div class="msg-search">
                                        <a href="javascript:void(0)" class="inline-block txt-grey">
                                            <i class="zmdi zmdi-more"></i>
                                        </a>	
                                        <span class="inline-block txt-dark">messages</span>
                                        <a href="javascript:void(0)" class="inline-block text-right txt-grey"><i class="zmdi zmdi-search"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="set-height-wrap">
                                        <div class="streamline message-box nicescroll-bar">
                                            <a href="javascript:void(0)">
                                                <div class="sl-item unread-message">
                                                    <div class="sl-avatar avatar avatar-sm avatar-circle">
                                                        <img class="img-responsive img-circle" src="img/user.png" alt="avatar"/>
                                                    </div>
                                                    <div class="sl-content">
                                                        <span class="inline-block capitalize-font   pull-left message-per">Clay Masse</span>
                                                        <span class="inline-block font-11  pull-right message-time">12:28 AM</span>
                                                        <div class="clearfix"></div>
                                                        <span class=" truncate message-subject"> message sent via your monster market profile</span>
                                                        <p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsu messm quia dolor sit amet, consectetur, adipisci velit</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="javascript:void(0)">
                                                <div class="sl-item">
                                                    <div class="sl-avatar avatar avatar-sm avatar-circle">
                                                        <img class="img-responsive img-circle" src="img/user1.png" alt="avatar"/>
                                                    </div>
                                                    <div class="sl-content">
                                                        <span class="inline-block capitalize-font   pull-left message-per">Evie Ono</span>
                                                        <span class="inline-block font-11  pull-right message-time">1 Feb</span>
                                                        <div class="clearfix"></div>
                                                        <span class=" truncate message-subject">Pogody theme support</span>
                                                        <p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="javascript:void(0)">
                                                <div class="sl-item">
                                                    <div class="sl-avatar avatar avatar-sm avatar-circle">
                                                        <img class="img-responsive img-circle" src="img/user2.png" alt="avatar"/>
                                                    </div>
                                                    <div class="sl-content">
                                                        <span class="inline-block capitalize-font   pull-left message-per">Madalyn Rascon</span>
                                                        <span class="inline-block font-11  pull-right message-time">31 Jan</span>
                                                        <div class="clearfix"></div>
                                                        <span class=" truncate message-subject">Congratulations from design nominees</span>
                                                        <p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="javascript:void(0)">
                                                <div class="sl-item unread-message">
                                                    <div class="sl-avatar avatar avatar-sm avatar-circle">
                                                        <img class="img-responsive img-circle" src="img/user3.png" alt="avatar"/>
                                                    </div>
                                                    <div class="sl-content">
                                                        <span class="inline-block capitalize-font   pull-left message-per">Ezequiel Merideth</span>
                                                        <span class="inline-block font-11  pull-right message-time">29 Jan</span>
                                                        <div class="clearfix"></div>
                                                        <span class=" truncate message-subject"> item support message</span>
                                                        <p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="javascript:void(0)">
                                                <div class="sl-item unread-message">
                                                    <div class="sl-avatar avatar avatar-sm avatar-circle">
                                                        <img class="img-responsive img-circle" src="img/user4.png" alt="avatar"/>
                                                    </div>
                                                    <div class="sl-content">
                                                        <span class="inline-block capitalize-font   pull-left message-per">Jonnie Metoyer</span>
                                                        <span class="inline-block font-11  pull-right message-time">27 Jan</span>
                                                        <div class="clearfix"></div>
                                                        <span class=" truncate message-subject">Help with beavis contact form</span>
                                                        <p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="javascript:void(0)">
                                                <div class="sl-item">
                                                    <div class="sl-avatar avatar avatar-sm avatar-circle">
                                                        <img class="img-responsive img-circle" src="img/user.png" alt="avatar"/>
                                                    </div>
                                                    <div class="sl-content">
                                                        <span class="inline-block capitalize-font   pull-left message-per">Priscila Shy</span>
                                                        <span class="inline-block font-11  pull-right message-time">19 Jan</span>
                                                        <div class="clearfix"></div>
                                                        <span class=" truncate message-subject">Your uploaded theme is been selected</span>
                                                        <p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="javascript:void(0)">
                                                <div class="sl-item">
                                                    <div class="sl-avatar avatar avatar-sm avatar-circle">
                                                        <img class="img-responsive img-circle" src="img/user1.png" alt="avatar"/>
                                                    </div>
                                                    <div class="sl-content">
                                                        <span class="inline-block capitalize-font   pull-left message-per">Linda Stack</span>
                                                        <span class="inline-block font-11  pull-right message-time">13 Jan</span>
                                                        <div class="clearfix"></div>
                                                        <span class=" truncate message-subject"> A new rating has been received</span>
                                                        <p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div  id="todo_tab" class="tab-pane fade" role="tabpanel">
                                <div class="todo-box-wrap">
                                    <div class="add-todo">
                                        <a href="javascript:void(0)" class="inline-block txt-grey">
                                            <i class="zmdi zmdi-more"></i>
                                        </a>	
                                        <span class="inline-block txt-dark">todo list</span>
                                        <a href="javascript:void(0)" class="inline-block text-right txt-grey"><i class="zmdi zmdi-plus"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="set-height-wrap">
                                        <!-- Todo-List -->
                                        <ul class="todo-list nicescroll-bar">
                                            <li class="todo-item">
                                                <div class="checkbox checkbox-default">
                                                    <input type="checkbox" id="checkbox01"/>
                                                    <label for="checkbox01">Record The First Episode</label>
                                                </div>
                                            </li>
                                            <li>
                                                <hr class="light-grey-hr"/>
                                            </li>
                                            <li class="todo-item">
                                                <div class="checkbox checkbox-pink">
                                                    <input type="checkbox" id="checkbox02"/>
                                                    <label for="checkbox02">Prepare The Conference Schedule</label>
                                                </div>
                                            </li>
                                            <li>
                                                <hr class="light-grey-hr"/>
                                            </li>
                                            <li class="todo-item">
                                                <div class="checkbox checkbox-warning">
                                                    <input type="checkbox" id="checkbox03" checked/>
                                                    <label for="checkbox03">Decide The Live Discussion Time</label>
                                                </div>
                                            </li>
                                            <li>
                                                <hr class="light-grey-hr"/>
                                            </li>
                                            <li class="todo-item">
                                                <div class="checkbox checkbox-success">
                                                    <input type="checkbox" id="checkbox04" checked/>
                                                    <label for="checkbox04">Prepare For The Next Project</label>
                                                </div>
                                            </li>
                                            <li>
                                                <hr class="light-grey-hr"/>
                                            </li>
                                            <li class="todo-item">
                                                <div class="checkbox checkbox-danger">
                                                    <input type="checkbox" id="checkbox05" checked/>
                                                    <label for="checkbox05">Finish Up AngularJs Tutorial</label>
                                                </div>
                                            </li>
                                            <li>
                                                <hr class="light-grey-hr"/>
                                            </li>
                                            <li class="todo-item">
                                                <div class="checkbox checkbox-purple">
                                                    <input type="checkbox" id="checkbox06" checked/>
                                                    <label for="checkbox06">Finish Infinity Project</label>
                                                </div>
                                            </li>
                                            <li>
                                                <hr class="light-grey-hr"/>
                                            </li>
                                        </ul>
                                        <!-- /Todo-List -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <!-- /Right Sidebar Menu -->



        <!-- Right Sidebar Backdrop -->
        <div class="right-sidebar-backdrop"></div>
        <!-- /Right Sidebar Backdrop -->

        <!-- Main Content -->
        <div class="page-wrapper">
            <div class="container-fluid pt-25">

                <!-- Row -->
                <div class="row">
                    <div class="col-lg-3 col-xs-12">
                        <div class="panel panel-default card-view  pa-0">
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body  pa-0">
                                    <div class="profile-box">
                                        <div class="profile-cover-pic">
                                            <div class="fileupload btn btn-default">
                                                <span class="btn-text">edit</span>
                                                <input class="upload" type="file">
                                            </div>
                                            <div class="profile-image-overlay"></div>
                                        </div>
                                        <div class="profile-info text-center">
                                            <div class="profile-img-wrap">
                                                <img class="inline-block mb-10" src="img/mock1.jpg" alt="user"/>
                                                <div class="fileupload btn btn-default">
                                                    <span class="btn-text">edit</span>
                                                    <input class="upload" type="file">
                                                </div>
                                            </div>	
                                            <h5 class="block mt-10 mb-5 weight-500 capitalize-font txt-success">Madalyn Rascon</h5>
                                            <h6 class="block capitalize-font pb-20">Developer Geek</h6>
                                        </div>	
                                        <div class="social-info">
                                            <div class="row">
                                                <div class="col-xs-4 text-center">
                                                    <span class="counts block head-font"><span class="counter-anim">345</span></span>
                                                    <span class="counts-text block">post</span>
                                                </div>
                                                <div class="col-xs-4 text-center">
                                                    <span class="counts block head-font"><span class="counter-anim">246</span></span>
                                                    <span class="counts-text block">followers</span>
                                                </div>
                                                <div class="col-xs-4 text-center">
                                                    <span class="counts block head-font"><span class="counter-anim">898</span></span>
                                                    <span class="counts-text block">tweets</span>
                                                </div>
                                            </div>
                                            <button class="btn btn-success btn-block  btn-anim mt-30" data-toggle="modal" href="#addnew"><i class="fa fa-pencil"></i><span class="btn-text">Add User </span></button>

                                                                                        <!--span class="pull-left"><a href="#addnew" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a></span-->


                                            <!-- Add New -->
                                            <!--div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <center><h4 class="modal-title" id="myModalLabel">Add New</h4></center>
                                                        </div>
                                                        <div class="modal-body">
                                                                        <div class="container-fluid">
                                                                        <form method="POST" id="add_user" action="addpers.php">
                                                                                <div class="row">
                                                                                        <div class="col-lg-2">
                                                                                                <label class="control-label" style="position:relative; top:7px;">Firstname:</label>
                                                                                        </div>
                                                                                        <div class="col-lg-10">
                                                                                                <input type="text" class="form-control" name="firstname">
                                                                                        </div>
                                                                                </div>
                                                                                <div style="height:10px;"></div>
                                                                                <div class="row">
                                                                                        <div class="col-lg-2">
                                                                                                <label class="control-label" style="position:relative; top:7px;">Lastname:</label>
                                                                                        </div>
                                                                                        <div class="col-lg-10">
                                                                                                <input type="text" class="form-control" name="lastname">
                                                                                        </div>
                                                                                </div>
                                                                                <div style="height:10px;"></div>
                                                                                <div class="row">
                                                                                        <div class="col-lg-2">
                                                                                                <label class="control-label" style="position:relative; top:7px;">Address:</label>
                                                                                        </div>
                                                                                        <div class="col-lg-10">
                                                                                                <input type="text" class="form-control" name="address">
                                                                                        </div>
                                                                                </div>
                                                        </div> 
                                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                                            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk" id="sa-success"></span> Save</a>
                                                                        </form>
                                                        </div>
                                                                        
                                                    </div>
                                                </div>
                                            </div-->


                                            <div id="myModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            <h5 class="modal-title" id="myModalLabel">Edit Profile</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Row -->
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="">
                                                                        <div class="panel-wrapper collapse in">
                                                                            <div class="panel-body pa-0">
                                                                                <div class="col-sm-12 col-xs-12">
                                                                                    <div class="form-wrap">
                                                                                        <form action="#">
                                                                                            <div class="form-body overflow-hide">
                                                                                                <div class="form-group">
                                                                                                    <label class="control-label mb-10" for="exampleInputuname_1">Name</label>
                                                                                                    <div class="input-group">
                                                                                                        <div class="input-group-addon"><i class="icon-user"></i></div>
                                                                                                        <input type="text" class="form-control" id="exampleInputuname_1" placeholder="willard bryant">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group">
                                                                                                    <label class="control-label mb-10" for="exampleInputEmail_1">Email address</label>
                                                                                                    <div class="input-group">
                                                                                                        <div class="input-group-addon"><i class="icon-envelope-open"></i></div>
                                                                                                        <input type="email" class="form-control" id="exampleInputEmail_1" placeholder="xyz@gmail.com">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group">
                                                                                                    <label class="control-label mb-10" for="exampleInputContact_1">Contact number</label>
                                                                                                    <div class="input-group">
                                                                                                        <div class="input-group-addon"><i class="icon-phone"></i></div>
                                                                                                        <input type="email" class="form-control" id="exampleInputContact_1" placeholder="+102 9388333">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group">
                                                                                                    <label class="control-label mb-10" for="exampleInputpwd_1">Password</label>
                                                                                                    <div class="input-group">
                                                                                                        <div class="input-group-addon"><i class="icon-lock"></i></div>
                                                                                                        <input type="text" class="form-control" id="exampleInputpwd_1" placeholder="Enter pwd" value="password">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group">
                                                                                                    <label class="control-label mb-10">Gender</label>
                                                                                                    <div>
                                                                                                        <div class="radio">
                                                                                                            <input type="radio" name="radio1" id="radio_1" value="option1" checked="">
                                                                                                            <label for="radio_1">
                                                                                                                M
                                                                                                            </label>
                                                                                                        </div>
                                                                                                        <div class="radio">
                                                                                                            <input type="radio" name="radio1" id="radio_2" value="option2">
                                                                                                            <label for="radio_2">
                                                                                                                F
                                                                                                            </label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group">
                                                                                                    <label class="control-label mb-10">Country</label>
                                                                                                    <select class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                                                                        <option value="Category 1">USA</option>
                                                                                                        <option value="Category 2">Austrailia</option>
                                                                                                        <option value="Category 3">India</option>
                                                                                                        <option value="Category 4">UK</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-actions mt-10">			
                                                                                                <button type="submit" class="btn btn-success mr-10 mb-30">Update profile</button>
                                                                                            </div>				
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button alt="alert" class="img-responsive model_img" id="sa-success">Add</button>
                                                            <button type="button" class="btn btn-success waves-effect" data-dismiss="modal">Save</button>
                                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-xs-12">
                        <div class="panel panel-default card-view pa-0">
                            <div class="panel-wrapper collapse in">
                                <div  class="panel-body pb-0">
                                    <div  class="tab-struct custom-tab-1">
                                        <ul role="tablist" class="nav nav-tabs nav-tabs-responsive" id="myTabs_8">
                                            <li class="active" role="presentation"><a  data-toggle="tab" id="profile_tab_8" role="tab" href="#profile_8" aria-expanded="false"><span>All</span></a></li>
                                            <li  role="presentation" class="next"><a aria-expanded="true"  data-toggle="tab" role="tab" id="follo_tab_8" href="#follo_8"><span>AMO<span class="inline-block"></span></span></a></li>
                                            <li role="presentation" class=""><a  data-toggle="tab" id="photos_tab_8" role="tab" href="#photos_8" aria-expanded="false"><span>AWM</span></a></li>
                                            <li role="presentation" class=""><a  data-toggle="tab" id="earning_tab_8" role="tab" href="#earnings_8" aria-expanded="false"><span>AYM</span></a></li>
                                            <li role="presentation" class=""><a  data-toggle="tab" id="settings_tab_8" role="tab" href="#settings_8" aria-expanded="false"><span>Ambassadors</span></a></li>
                                            <li class="dropdown" role="presentation">
                                                <a  data-toggle="dropdown" class="dropdown-toggle" id="myTabDrop_7" href="#" aria-expanded="false"><span>Children</span> <span class="caret"></span></a>
                                                <ul id="myTabDrop_7_contents"  class="dropdown-menu">
                                                    <li class=""><a  data-toggle="tab" id="dropdown_13_tab" role="tab" href="#dropdown_13" aria-expanded="true">Pathfinders</a></li>
                                                    <li class=""><a  data-toggle="tab" id="dropdown_14_tab" role="tab" href="#dropdown_14" aria-expanded="false">Adventurers</a></li>

                                                </ul>
                                            </li>
                                            <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                <span>January 1, 2020 - January 28, 2020</span> 
                                                <b class="caret"></b>
                                            </div>
                                        </ul>
                                        <div class="tab-content" id="myTabContent_8">
                                            <div  id="profile_8" class="tab-pane fade active in" role="tabpanel">
                                                <div class="col-md-12">
                                                    <div class="pt-20">

                                                        <div class="table-wrap">

                                                            <div class="table-responsive">

                                                                <table id="example"  data-toggle="table" data-sortable="true" data-buttons-class='default btn-sm btn-outline' data-pagination="true" data-search="true" class="table table-hover table-bordered display  pb-30" data-tablesaw-mode="columntoggle"  cellspacing="0" >

                                                                    <thead>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>First Name</th>
                                                                            <th>Last Name</th>
                                                                            <th >Mem#</th>
                                                                            <th>Gender</th>
                                                                            <th>Phone</th>
                                                                            <th>Minute#</th>
                                                                            <th>Entry Mode</th>
                                                                            <th>Status</th>
                                                                            <th>Action </th>


                                                                        </tr>
                                                                    </thead>
                                                                    <tfoot>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>First Name</th>
                                                                            <th>Last Name</th>
                                                                            <th>Member No.</th>
                                                                            <th>Gender</th>
                                                                            <th>Phone</th>
                                                                            <th>Minute#</th>
                                                                            <th>Entry Mode</th>
                                                                            <th>Status</th>
                                                                            <th>Action </th>


                                                                        </tr>
                                                                    </tfoot>

                                                                    <?php
                                                                    include('conn.php');

                                                                    $query = mysqli_query($conn, "select * from `people` ");
                                                                    while ($row = mysqli_fetch_array($query)) {
                                                                        ?> 
                                                                        <tr> 
                                                                            <td><?php echo $row["id"]; ?></td> 
                                                                            <td><?php echo $row["firstname"]; ?></td>
                                                                            <td><?php echo $row["lastname"]; ?></td>
                                                                            <td><?php echo $row["member_no"]; ?></td>
                                                                            <td><?php echo $row["gender"]; ?></td>
                                                                            <td><?php echo $row["phone"]; ?></td>
                                                                            <td><?php echo $row["minutedin_on"]; ?></td> 
                                                                            <td><?php echo $row["entry_mode"]; ?></td>
                                                                            <td><?php echo $row["comments_remarks"]; ?></td> 
                                                                            <!--td><input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data" /></td-->  
                                                                            <!--td><input type="button" name="view" value="view" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data" /></td--> 

                                                                            <td>
                                                                                <a href="#edit<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="edit" ><i class="fa fa-pencil txt-warning"></i></a>

                                                                                <a href="#del<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="delete" ><i class="fa fa-trash-o txt-danger"></i></a>
                                                                                <!--&nbsp;&nbsp;-->
                                                                                <a href="#myModalview" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" ><i class="fa fa-eye txt-primary"></i></a>


                                                                            </td> 
                                                                            <?php include('button.php'); ?>
                                                                             <?php include('modal-view.php'); ?>


                                                                            <!--td>
                                                                 <a name="edit" value="Edit" href="#edit<?php echo $row['id']; ?>" class="pr-10 edit_data" data-toggle="tooltip" title="edit" >
                                                                         <i class="fa fa-pencil"></i>
                                                                 </a>
                                                                 <a  name="view" value="view" id="<?php echo $row["id"]; ?>" class="text-inverse view_data" title="view" data-toggle="tooltip">
                                                                         <i class="fa  fa-eye"></i>
                                                                 </a>
                                                                 &nbsp;&nbsp;
                                                                 <a  name="view" value="view" href="#del<?php echo $row['id']; ?>" class="text-inverse view_data" title="send SMS" data-toggle="tooltip">
                                                                         <i class="fa  fa-envelope"></i>
                                                                 </a>
                                                             </td-->
                                                                        </tr>  
                                                                        <?php
                                                                    }
                                                                    ?> 



                                                                </table>
                                                                

                                                                <!--Editor-->
                                                                <div class="modal fade" id="editor-modal" tabindex="-1" role="dialog" aria-labelledby="editor-title">

                                                                    <div class="modal-dialog" role="document">
                                                                        <form class="modal-content form-horizontal" id="editor">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                                <h5 class="modal-title" id="editor-title">Add Row</h5>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <input type="number" id="id" name="id" class="hidden"/>
                                                                                <div class="form-group required">
                                                                                    <label for="firstName" class="col-sm-3 control-label">First Name</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group required">
                                                                                    <label for="lastName" class="col-sm-3 control-label">Last Name</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="jobTitle" class="col-sm-3 control-label">Job Title</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" class="form-control" id="jobTitle" name="jobTitle" placeholder="Job Title">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group required">
                                                                                    <label for="startedOn" class="col-sm-3 control-label">Started On</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" class="form-control" id="startedOn" name="startedOn" placeholder="Started On" required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="dob" class="col-sm-3 control-label">Date of Birth</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" class="form-control" id="dob" name="dob" placeholder="Date of Birth">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <!--/Editor-->



                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div  id="follo_8" class="tab-pane fade" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="followers-wrap">
                                                            <ul class="followers-list-wrap">
                                                                <li class="follow-list">
                                                                    <div class="follo-body">
                                                                        <div class="follo-data">
                                                                            <img class="user-img img-circle"  src="img/user.png" alt="user"/>
                                                                            <div class="user-data">
                                                                                <span class="name block capitalize-font">Clay Masse</span>
                                                                                <span class="time block truncate txt-grey">No one saves us but ourselves.</span>
                                                                            </div>
                                                                            <button class="btn btn-success pull-right btn-xs fixed-btn">Follow</button>
                                                                            <div class="clearfix"></div>
                                                                        </div>
                                                                        <div class="follo-data">
                                                                            <img class="user-img img-circle"  src="img/user1.png" alt="user"/>
                                                                            <div class="user-data">
                                                                                <span class="name block capitalize-font">Evie Ono</span>
                                                                                <span class="time block truncate txt-grey">Unity is strength</span>
                                                                            </div>
                                                                            <button class="btn btn-success btn-outline pull-right btn-xs fixed-btn">following</button>
                                                                            <div class="clearfix"></div>
                                                                        </div>
                                                                        <div class="follo-data">
                                                                            <img class="user-img img-circle"  src="img/user2.png" alt="user"/>
                                                                            <div class="user-data">
                                                                                <span class="name block capitalize-font">Madalyn Rascon</span>
                                                                                <span class="time block truncate txt-grey">Respect yourself if you would have others respect you.</span>
                                                                            </div>
                                                                            <button class="btn btn-success btn-outline pull-right btn-xs fixed-btn">following</button>
                                                                            <div class="clearfix"></div>
                                                                        </div>
                                                                        <div class="follo-data">
                                                                            <img class="user-img img-circle"  src="img/user3.png" alt="user"/>
                                                                            <div class="user-data">
                                                                                <span class="name block capitalize-font">Mitsuko Heid</span>
                                                                                <span class="time block truncate txt-grey">I’m thankful.</span>
                                                                            </div>
                                                                            <button class="btn btn-success pull-right btn-xs fixed-btn">Follow</button>
                                                                            <div class="clearfix"></div>
                                                                        </div>
                                                                        <div class="follo-data">
                                                                            <img class="user-img img-circle"  src="img/user.png" alt="user"/>
                                                                            <div class="user-data">
                                                                                <span class="name block capitalize-font">Ezequiel Merideth</span>
                                                                                <span class="time block truncate txt-grey">Patience is bitter.</span>
                                                                            </div>
                                                                            <button class="btn btn-success pull-right btn-xs fixed-btn">Follow</button>
                                                                            <div class="clearfix"></div>
                                                                        </div>
                                                                        <div class="follo-data">
                                                                            <img class="user-img img-circle"  src="img/user1.png" alt="user"/>
                                                                            <div class="user-data">
                                                                                <span class="name block capitalize-font">Jonnie Metoyer</span>
                                                                                <span class="time block truncate txt-grey">Genius is eternal patience.</span>
                                                                            </div>
                                                                            <button class="btn btn-success btn-outline pull-right btn-xs fixed-btn">following</button>
                                                                            <div class="clearfix"></div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div  id="photos_8" class="tab-pane fade" role="tabpanel">
                                                <div class="col-md-12 pb-20">
                                                    <div class="gallery-wrap">
                                                        <div class="portfolio-wrap project-gallery">
                                                            <ul id="portfolio_1" class="portf auto-construct  project-gallery" data-col="4">
                                                                <li  class="item"   data-src="img/gallery/equal-size/mock1.jpg" data-sub-html="<h6>Bagwati</h6><p>Classic view from Rigwood Jetty on Coniston Water an old archive shot similar to an old post but a little later on.</p>" >
                                                                    <a href="">
                                                                        <img class="img-responsive" src="img/gallery/equal-size/mock1.jpg"  alt="Image description" />
                                                                        <span class="hover-cap">Bagwati</span>
                                                                    </a>
                                                                </li>
                                                                <li class="item" data-src="img/gallery/equal-size/mock2.jpg"   data-sub-html="<h6>Not a Keyboard</h6><p>Classic view from Rigwood Jetty on Coniston Water an old archive shot similar to an old post but a little later on.</p>">
                                                                    <a href="">
                                                                        <img class="img-responsive" src="img/gallery/equal-size/mock2.jpg"  alt="Image description" />
                                                                        <span class="hover-cap">Not a Keyboard</span>
                                                                    </a>
                                                                </li>
                                                                <li class="item" data-src="img/gallery/equal-size/mock3.jpg" data-sub-html="<h6>Into the Woods</h6><p>Classic view from Rigwood Jetty on Coniston Water an old archive shot similar to an old post but a little later on.</p>">
                                                                    <a href="">
                                                                        <img class="img-responsive" src="img/gallery/equal-size/mock3.jpg"  alt="Image description" />
                                                                        <span class="hover-cap">Into the Woods</span>
                                                                    </a>
                                                                </li>
                                                                <li class="item" data-src="img/gallery/equal-size/mock4.jpg"  data-sub-html="<h6>Ultra Saffire</h6><p>Classic view from Rigwood Jetty on Coniston Water an old archive shot similar to an old post but a little later on.</p>">
                                                                    <a href="">
                                                                        <img class="img-responsive" src="img/gallery/equal-size/mock4.jpg"  alt="Image description" />
                                                                        <span class="hover-cap"> Ultra Saffire</span>
                                                                    </a>
                                                                </li>

                                                                <li class="item" data-src="img/gallery/equal-size/mock5.jpg" data-sub-html="<h6>Happy Puppy</h6><p>Classic view from Rigwood Jetty on Coniston Water an old archive shot similar to an old post but a little later on.</p>">
                                                                    <a href="">
                                                                        <img class="img-responsive" src="img/gallery/equal-size/mock5.jpg"  alt="Image description" />	
                                                                        <span class="hover-cap">Happy Puppy</span>
                                                                    </a>
                                                                </li>
                                                                <li class="item" data-src="img/gallery/equal-size/mock6.jpg"  data-sub-html="<h6>Wooden Closet</h6><p>Classic view from Rigwood Jetty on Coniston Water an old archive shot similar to an old post but a little later on.</p>">
                                                                    <a href="">
                                                                        <img class="img-responsive" src="img/gallery/equal-size/mock6.jpg"  alt="Image description" />
                                                                        <span class="hover-cap">Wooden Closet</span>
                                                                    </a>
                                                                </li>
                                                                <li class="item" data-src="img/gallery/equal-size/mock7.jpg" data-sub-html="<h6>Happy Puppy</h6><p>Classic view from Rigwood Jetty on Coniston Water an old archive shot similar to an old post but a little later on.</p>">
                                                                    <a href="">
                                                                        <img class="img-responsive" src="img/gallery/equal-size/mock7.jpg"  alt="Image description" />	
                                                                        <span class="hover-cap">Happy Puppy</span>
                                                                    </a>
                                                                </li>
                                                                <li class="item" data-src="img/gallery/equal-size/mock8.jpg"  data-sub-html="<h6>Wooden Closet</h6><p>Classic view from Rigwood Jetty on Coniston Water an old archive shot similar to an old post but a little later on.</p>">
                                                                    <a href="">
                                                                        <img class="img-responsive" src="img/gallery/equal-size/mock8.jpg"  alt="Image description" />
                                                                        <span class="hover-cap">Wooden Closet</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>	
                                            </div>
                                            
                                            <div  id="earnings_8" class="tab-pane fade" role="tabpanel">
                                                <!-- Row -->
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <form id="example-advanced-form" action="#">
                                                            <div class="table-wrap">
                                                                <div class="table-responsive">
                                                                    <table class="table table-striped display product-overview" id="datable_1">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Date</th>
                                                                                <th>Item Sales Colunt</th>
                                                                                <th>Earnings</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tfoot>
                                                                            <tr>
                                                                                <th colspan="2">total:</th>
                                                                                <th></th>
                                                                            </tr>
                                                                        </tfoot>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>monday, 12</td>
                                                                                <td>
                                                                                    3
                                                                                </td>
                                                                                <td>$400</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>tuesday, 13</td>
                                                                                <td>
                                                                                    2
                                                                                </td>
                                                                                <td>$400</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>wednesday, 14</td>
                                                                                <td>
                                                                                    3
                                                                                </td>
                                                                                <td>$420</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>thursday, 15</td>
                                                                                <td>
                                                                                    5
                                                                                </td>
                                                                                <td>$500</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>friday, 15</td>
                                                                                <td>
                                                                                    3
                                                                                </td>
                                                                                <td>$400</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>saturday, 16</td>
                                                                                <td>
                                                                                    3
                                                                                </td>
                                                                                <td>$400</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>sunday, 17</td>
                                                                                <td>
                                                                                    3
                                                                                </td>
                                                                                <td>$400</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>monday, 18</td>
                                                                                <td>
                                                                                    3
                                                                                </td>
                                                                                <td>$500</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>tuesday, 19</td>
                                                                                <td>
                                                                                    3
                                                                                </td>
                                                                                <td>$400</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div  id="settings_8" class="tab-pane fade" role="tabpanel">
                                                <!-- Row -->
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="">
                                                            <div class="panel-wrapper collapse in">
                                                                <div class="panel-body pa-0">
                                                                    <div class="col-sm-12 col-xs-12">
                                                                        <div class="form-wrap">
                                                                            <form action="#">
                                                                                <div class="form-body overflow-hide">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label mb-10" for="exampleInputuname_01">Name</label>
                                                                                        <div class="input-group">
                                                                                            <div class="input-group-addon"><i class="icon-user"></i></div>
                                                                                            <input type="text" class="form-control" id="exampleInputuname_01" placeholder="willard bryant">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label class="control-label mb-10" for="exampleInputEmail_01">Email address</label>
                                                                                        <div class="input-group">
                                                                                            <div class="input-group-addon"><i class="icon-envelope-open"></i></div>
                                                                                            <input type="email" class="form-control" id="exampleInputEmail_01" placeholder="xyz@gmail.com">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label class="control-label mb-10" for="exampleInputContact_01">Contact number</label>
                                                                                        <div class="input-group">
                                                                                            <div class="input-group-addon"><i class="icon-phone"></i></div>
                                                                                            <input type="email" class="form-control" id="exampleInputContact_01" placeholder="+102 9388333">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label class="control-label mb-10" for="exampleInputpwd_01">Password</label>
                                                                                        <div class="input-group">
                                                                                            <div class="input-group-addon"><i class="icon-lock"></i></div>
                                                                                            <input type="password" class="form-control" id="exampleInputpwd_01" placeholder="Enter pwd" value="password">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label class="control-label mb-10">Gender</label>
                                                                                        <div>
                                                                                            <div class="radio">
                                                                                                <input type="radio" name="radio1" id="radio_01" value="option1" checked="">
                                                                                                <label for="radio_01">
                                                                                                    M
                                                                                                </label>
                                                                                            </div>
                                                                                            <div class="radio">
                                                                                                <input type="radio" name="radio1" id="radio_02" value="option2">
                                                                                                <label for="radio_02">
                                                                                                    F
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label class="control-label mb-10">Country</label>
                                                                                        <select class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                                                            <option value="Category 1">USA</option>
                                                                                            <option value="Category 2">Austrailia</option>
                                                                                            <option value="Category 3">India</option>
                                                                                            <option value="Category 4">UK</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-actions mt-10">			
                                                                                    <button type="submit" class="btn btn-success mr-10 mb-30">Update profile</button>
                                                                                    <button alt="alert" class="img-responsive model_img" id="sa-success">Add</button>
                                                                                </div>				
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- /Row -->

                <!-- Row -->

                <!-- /Row -->

            </div>
            <!-- Footer -->
            <!--footer class="footer container-fluid pl-30 pr-30">
                    <div class="row">
                            <div class="col-sm-12">
                                    <p>2018 &copy; Droopy. Pampered by Hencework</p>
                            </div>
                    </div>
            </footer-->
            <!-- /Footer -->

        </div>
        <!-- /Main Content -->
        <?php include('add_modal.php'); ?>

    </div>
    <!-- /#wrapper -->

    <?php
    include 'footer.php';
    ?>